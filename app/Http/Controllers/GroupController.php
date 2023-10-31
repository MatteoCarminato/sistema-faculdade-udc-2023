<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $groups = Group::search($searchTerm)->orderBy('name')->paginate(10);

        return view('private.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('private.groups.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário para "groups"
        $validatedGroupData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'modality_id' => 'required|numeric',
            'locals_id' => 'required|numeric',
            'year' => 'required',
            'teacher_id' => 'required',
            'groupHours' => ''
        ]);
        
        $decodeGroupHours = $validatedGroupData['groupHours'];
        $validatedGroupHourData = json_decode($decodeGroupHours, true);

        // Criação de um novo grupo com os dados fornecidos
        $group = Group::create([
            'name' => $validatedGroupData['name'],
            'year' => $validatedGroupData['year'],
            'category_id' => $validatedGroupData['category_id'],
            'modality_id' => $validatedGroupData['modality_id'],
            'teacher_id' => $validatedGroupData['teacher_id'],
            'locals_id' => $validatedGroupData['locals_id'],
        ]);

        // Criação de um novo registro em "group_hours" associado ao grupo criado
        foreach ($validatedGroupHourData as $validatedGroupHourDatas => $index) {

            $groupHour = GroupHour::create([
                'weekday' => $index['weekday'],
                'hour' => $index['hour'],
                'year' => $validatedGroupData['year'],
                'teacher_id' => $validatedGroupData['teacher_id'],
                'groups_id' => $group->id,
                'locals_id' => $validatedGroupData['locals_id']
            ]);
            $groupHour->save();

        }

        return redirect()->route('groups.index')->with('success', 'Group criada com sucesso.');
    }

    public function show(Group $group)
    {
        $groupHours = GroupHour::where('groups_id', $group->id)->get();
        return view('private.groups.show', compact('group','groupHours'));
    }

    public function edit(Group $group)
    {
        return view('private.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'modality_id' => 'required|numeric',
            'teacher_id' => 'required|numeric',
            'locals_id' => 'required|numeric',
        ]);

        $instanciadoGrup = [
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            'modality_id' => $validatedData['modality_id'],
            'teacher_id' => $validatedData['teacher_id'],
            'locals_id' => $validatedData['locals_id'],
        ];

        $existingGroupHourIds = $group->groupHours->pluck('groups_id')->toArray();
        $newGroupHourIds = [];

        $decodeGroupHour = $validatedData['groupHours'];
        $groupHours = json_decode($decodeGroupHour, true);

        DB::beginTransaction();
        try {
            $group->update($instanciadoGrup);

            foreach ($groupHours as $groupHour) {
                $groupData = GroupHour::updateOrCreate(['id' => $groupHour['id'] ?? null], [
                    'weekday' => $groupHour['weekday'],
                    'hour' => $groupHour['hour'],
                    'year' => $groupHour['year'],
                    'teacher_id' => $validatedData['teacher_id'],
                    'locals_id' => $validatedData['locals_id'],
                    'groups_id' => $group->id,
                ]);

                $newGroupHourIds[] = $groupData->id;
            }

            $deletedGroupHourIds = array_diff($existingGroupHourIds, $newGroupHourIds);

            if (!empty($deletedParentIds)) {
                GroupHour::whereIn('groups_id', $deletedGroupHourIds)
                    ->delete();
            }


        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollBack();
            Log::debug('Warning - Não atualizou a Turma: ' . $exception);

            return redirect()->route('groups.index')->with('failed', 'Informações não atualizada.');
        }



        return redirect()->route('groups.index')->with('success', 'Group atualizada com sucesso.');
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deletada com sucesso.');
    }

    public function buscar(Request $request)
    {
        $groups = $request->input('search') ?? '';
        $groups = Group::search($groups)->paginate(10);

        return response()->json($groups);
    }
}