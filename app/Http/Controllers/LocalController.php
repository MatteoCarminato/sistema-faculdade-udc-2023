<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocalController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $locals = Local::search($searchTerm)->orderBy('name')->paginate(10);

        return view('private.locals.index', compact('locals'));
    }

    public function create()
    {
        return view('private.locals.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:locals|max:255'
        ]);
        Local::create($validatedData);

        return redirect()->route('locals.index')->with('success', 'Local criada com sucesso.');
    }

    public function show(Local $local)
    {
        return view('private.locals.show', compact('local'));
    }

    public function edit(Local $local)
    {
        return view('private.locals.edit', compact('local'));
    }

    public function update(Request $request, Local $local)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('locals')->ignore($local)]
        ]);

        $local->update($data);

        return redirect()->route('locals.index')->with('success', 'Local atualizada com sucesso.');
    }

    public function destroy(Local $local)
    {
        $local->delete();

        return redirect()->route('locals.index')->with('success', 'Local deletada com sucesso.');
    }

    public function buscar(Request $request)
    {
        $states = $request->input('search') ?? '';
        $states = Local::search($states)->paginate(10);

        return response()->json($states);
    }
}
