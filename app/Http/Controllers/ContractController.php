<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search') ?? '';
        $contracts = Contract::search($searchTerm)->orderBy('id')->paginate(10);

        return view('private.contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('private.contracts.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'monthly_fee' => 'nullable',
            'clients_id' => 'nullable',
            'responsavel_id' => 'nullable',
            'groups_id' => 'nullable',
            'payment_terms_id' => 'nullable',
        ]);

        $mensalidade = str_replace(['R$', '.'], '', $data['monthly_fee']);
        $mensalidade = (float) $mensalidade;
        $valor_mensalidade = number_format($mensalidade, 2, '.', '');

        $contract = new Contract([
            'monthly_fee' => $valor_mensalidade,
            'client_id' => $data['clients_id'],
            'resp_id' => $data['responsavel_id'],
            'group_id' => $data['groups_id'],
            'payment_term_id' => $data['payment_terms_id'],
        ]);

        $contract->save();

        return redirect()->route('contracts.show', $contract);
    }

    public function show(Contract $contract)
    {
        return view('private.contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        return view('private.contracts.edit', compact('contract'));
    }

    public function update(Request $request, Contract $contract)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique('contracts')->ignore($contract)],
            'slug' => ['required', Rule::unique('contracts')->ignore($contract)],
            'phone_code' => 'nullable|integer',
            'flag' => 'nullable',
            'acronym' => 'nullable|string|max:10',
        ]);

        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('public/flags');
        }

        $contract->update($data);

        return redirect()->route('contracts.show', $contract);
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index');
    }

    public function buscar(Request $request)
    {
        $contracts = $request->input('search') ?? '';
        $contracts = Contract::search($contracts)->paginate(10);

        return response()->json($contracts);
    }
}