<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use Illuminate\Validation\Rule;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $states = State::search($searchTerm)->orderBy('name')->paginate(10);

        return view('private.states.index', compact('states'));
    }

    public function create()
    {
        return view('private.states.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique|max:255',
            'acronym' => 'nullable|max:10',
            'slug' => 'nullable|unique|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        State::create($validatedData);

        return redirect()->route('states.index')->with('success', 'Estado criado com sucesso.');
    }

    public function show(State $state)
    {
        return view('private.states.show', compact('state'));
    }

    public function edit(State $state)
    {
        return view('private.states.edit', compact('state'));
    }

    public function update(Request $request, State $state)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('states')->ignore($state)],
            'slug' => ['required', Rule::unique('states')->ignore($state)],
            'acronym' => 'nullable|string|max:10',
            'country_id' => 'required|exists:countries,id',
        ]);

        $state->update($data);

        return redirect()->route('states.index')->with('success', 'Estado atualizado com sucesso.');
    }

    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index')->with('success', 'Estado deletado com sucesso.');
    }
}