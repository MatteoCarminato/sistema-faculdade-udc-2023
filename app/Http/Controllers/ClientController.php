<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ParentChild;
use App\Rules\CheckArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index(Request $request)
    {

        $searchTerm = $request->input('search') ?? '';
        $clients = Client::search($searchTerm)->where('type', 'aluno')->orderBy('name')->paginate(10);

        return view('private.clients.index', compact('clients'));
    }

    public function indexParent(Request $request)
    {

        $searchTerm = $request->input('search') ?? '';
        $clients = Client::search($searchTerm)
            ->where('type', 'responsavel')
            ->where('deleted_at', null)
            ->orderBy('name')
            ->paginate(10);

        return view('private.clients.indexParent', compact('clients'));
    }

    public function create()
    {
        return view('private.clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'type' => 'required|in:aluno,responsavel',
            'email' => 'nullable|email|unique:clients,email',
            'phone' => 'nullable|string|max:20',
            'phone_home' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'rg' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:14',
            'sex' => 'nullable|string|max:10',
            'blood_types' => 'nullable|in:a+,b+,o+,ab+,a-,b-,o-,ab-',
            'height' => 'nullable|numeric|min:0|max:999.99',
            'weight' => 'nullable|numeric|min:0|max:999.99',
            'school' => 'nullable|string|max:255',
            'shift' => 'nullable|in:manha,tarde,noite',
            'address' => 'nullable|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'zip_code' => 'nullable|string|max:10',
            'number' => 'nullable|string|max:20',
            'complements' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
            'responsaveis' => $request->input('type') === 'aluno' ? new CheckArray : '',
        ]);

        $decodeInstallments = $validatedData['responsaveis'];
        $guardians = json_decode($decodeInstallments, true);

        $client = new Client([
            'name' => $validatedData['name'],
            'nickname' => $validatedData['nickname'],
            'type' => $validatedData['type'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'phone_home' => $validatedData['phone_home'],
            'birth_date' => $validatedData['birth_date'],
            'rg' => $validatedData['rg'],
            'cpf' => $validatedData['cpf'],
            'sex' => $validatedData['sex'],
            'blood_types' => $validatedData['blood_types'],
            'height' => $validatedData['height'],
            'weight' => $validatedData['weight'],
            'school' => $validatedData['school'],
            'shift' => $validatedData['shift'],
            'address' => $validatedData['address'],
            'city_id' => $validatedData['city_id'],
            'zip_code' => $validatedData['zip_code'],
            'number' => $validatedData['number'],
            'complements' => $validatedData['complements'],
            'district' => $validatedData['district'],
        ]);

        DB::beginTransaction();
        try {
            $client->save();

            foreach ($guardians as $index => $parents) {
                $parent = new Client([
                    'name' => $parents['name'],
                    'phone' => $parents['phone'],
                    'family' => $parents['family'],
                    'type' => 'responsavel'
                ]);
                $parent->save();

                $parentChild = new ParentChild([
                    'client_id' => $client->id,
                    'parent_id' => $parent->id,
                    'type' => $parents['family'],
                    'financial_guardian' => $parents['financial_guardian']
                ]);

                $parentChild->save();
            }

            DB::commit();

            if ($client->type === 'responsavel') {
                return redirect()->route('parents.index')->with('success', 'Responsável atualizado com sucesso.');
            } else {
                return redirect()->route('clients.index')->with('success', 'Aluno atualizado com sucesso.');
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollBack();
            Log::debug('Warning - Não cadastrar o Client: ' . $exception);

            return redirect()->route('clients.index')->with('failed', 'Informações não cadastrada.');
        }
    }

    public function show(Client $client)
    {
        return view('private.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('private.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'type' => 'required|in:aluno,responsavel',
            'email' => 'nullable|email|unique:clients,email',
            'phone' => 'nullable|string|max:20',
            'phone_home' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'rg' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:14',
            'sex' => 'nullable|string|max:10',
            'blood_types' => 'nullable|in:a+,b+,o+,ab+,a-,b-,o-,ab-',
            'height' => 'nullable|numeric|min:0|max:999.99',
            'weight' => 'nullable|numeric|min:0|max:999.99',
            'school' => 'nullable|string|max:255',
            'shift' => 'nullable|in:manha,tarde,noite',
            'address' => 'nullable|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'zip_code' => 'nullable|string|max:10',
            'number' => 'nullable|string|max:20',
            'complements' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
            'responsaveis' => $request->input('type') === 'aluno' ? new CheckArray : '',
        ]);

        $existingParentIds = $client->parent()->pluck('parent_id')->toArray();
        $newParentIds = [];

        $decodeInstallments = $validatedData['responsaveis'];
        $guardians = json_decode($decodeInstallments, true);

        $instanciado = [
            'name' => $validatedData['name'],
            'nickname' => $validatedData['nickname'],
            'type' => $validatedData['type'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'phone_home' => $validatedData['phone_home'],
            'birth_date' => $validatedData['birth_date'],
            'rg' => $validatedData['rg'],
            'cpf' => $validatedData['cpf'],
            'sex' => $validatedData['sex'],
            'blood_types' => $validatedData['blood_types'],
            'height' => $validatedData['height'],
            'weight' => $validatedData['weight'],
            'school' => $validatedData['school'],
            'shift' => $validatedData['shift'],
            'address' => $validatedData['address'],
            'city_id' => $validatedData['city_id'],
            'zip_code' => $validatedData['zip_code'],
            'number' => $validatedData['number'],
            'complements' => $validatedData['complements'],
            'district' => $validatedData['district'],
        ];
        DB::beginTransaction();
        try {
            $client->update($instanciado);

            foreach ($guardians as $guardianData) {
                $guardian = Client::updateOrCreate(['id' => $guardianData['id'] ?? null], [
                    'name' => $guardianData['name'],
                    'phone' => $guardianData['phone'],
                    'type' => 'responsavel',
                ]);

                ParentChild::updateOrCreate(
                    ['client_id' => $client->id, 'parent_id' => $guardian->id],
                    ['type' => $guardianData['family'], 'financial_guardian' => $guardianData['financial_guardian']]
                );

                $newParentIds[] = $guardian->id;
            }

            $deletedParentIds = array_diff($existingParentIds, $newParentIds);

            if (!empty($deletedParentIds)) {
                ParentChild::where('client_id', $client->id)
                    ->whereIn('parent_id', $deletedParentIds)
                    ->delete();

                Client::whereIn('id', $deletedParentIds)
                    ->delete();
            }

            DB::commit();
            if ($client->type === 'responsavel') {
                return redirect()->route('parents.index')->with('success', 'Responsável atualizado com sucesso.');
            } else {
                return redirect()->route('clients.index')->with('success', 'Aluno atualizado com sucesso.');
            }

        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollBack();
            Log::debug('Warning - Não cadastrar o Client: ' . $exception);

            return redirect()->route('clients.index')->with('failed', 'Informações não atualizada.');
        }

    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('parents.index')->with('success', 'Cliente removido com sucesso.');
    }

    public function buscarAluno(Request $request)
    {
        $clients = $request->input('search') ?? '';
        $clients = Client::search($clients)->where('type', 'aluno')->paginate(10);

        return response()->json($clients);
    }

    public function buscarReponsavel(Request $request)
    {
        $clients = $request->input('search') ?? '';
        $clients = Client::search($clients)->where('type', 'responsavel')->paginate(10);

        return response()->json($clients);
    }
}