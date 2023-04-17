<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
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
        $validatedData = $request->validate([
            'name' => 'required|unique:groups|max:255'
        ]);
        Group::create($validatedData);

        return redirect()->route('groups.index')->with('success', 'Group criada com sucesso.');
    }

    public function show(Group $local)
    {
        return view('private.groups.show', compact('local'));
    }

    public function edit(Group $local)
    {
        return view('private.groups.edit', compact('local'));
    }

    public function update(Request $request, Group $local)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('groups')->ignore($local)]
        ]);

        $local->update($data);

        return redirect()->route('groups.index')->with('success', 'Group atualizada com sucesso.');
    }

    public function destroy(Group $local)
    {
        $local->delete();

        return redirect()->route('groups.index')->with('success', 'Group deletada com sucesso.');
    }

    public function buscar(Request $request)
    {
        $states = $request->input('search') ?? '';
        $states = Group::search($states)->paginate(10);

        return response()->json($states);
    }
}
