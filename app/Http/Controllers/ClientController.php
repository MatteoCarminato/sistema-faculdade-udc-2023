<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
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
        ]);

        $client = Client::create($request->all());

        return redirect()->route('clients.show', $client);
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|in:aluno,responsavel',
        'email' => 'nullable|email|unique:clients,email,' . $client->id,
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
    ]);

    $client->update($request->all());

    return redirect()->route('clients.show', $client);
}

public function destroy(Client $client)
{
    $client->delete();

    return redirect()->route('clients.index')->with('success', 'Cliente removido com sucesso.');
}
}
