<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ModalityController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $modalities = Modality::search($searchTerm)->orderBy('name')->paginate(10);

        return view('private.modalities.index', compact('modalities'));
    }

    public function create()
    {
        return view('private.modalities.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);
        Modality::create($validatedData);

        return redirect()->route('modalities.index')->with('success', 'Modalidade criada com sucesso.');
    }

    public function show(Modality $modality)
    {
        return view('private.modalities.show', compact('modality'));
    }

    public function edit(Modality $modality)
    {
        return view('private.modalities.edit', compact('modality'));
    }

    public function update(Request $request, Modality $modality)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('modalities')->ignore($modality)]
        ]);

        $modality->update($data);

        return redirect()->route('modalities.index')->with('success', 'Modalidade atualizada com sucesso.');
    }

    public function destroy(Modality $modality)
    {
        $modality->delete();

        return redirect()->route('modalities.index')->with('success', 'Modalidade deletada com sucesso.');
    }

    public function buscar(Request $request)
    {
        $states = $request->input('search') ?? '';
        $states = Modality::search($states)->paginate(10);

        return response()->json($states);
    }
}
