<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $cities = City::search($searchTerm)->orderBy('name')->paginate(10);

        return view('private.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('private.cities.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:cities|max:255',
            'slug' => 'required|unique:cities,slug',
            'phone_code' => 'required|nullable|integer',
            'state_id' => 'required|exists:cities,id',
        ]);
        City::create($validatedData);

        return redirect()->route('cities.index')->with('success', 'Cidade criada com sucesso.');
    }

    public function show(City $city)
    {
        return view('private.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        return view('private.cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('cities')->ignore($city)],
            'slug' => ['required', Rule::unique('cities')->ignore($city)],
            'phone_code' => 'required|nullable|integer',
            'state_id' => 'required|exists:cities,id',
        ]);

        $city->update($data);

        return redirect()->route('cities.index')->with('success', 'Cidade atualizada com sucesso.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'Cidade deletada com sucesso.');
    }
}
