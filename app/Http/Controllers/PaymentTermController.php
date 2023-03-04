<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\PaymentTerm;
use App\Rules\CheckArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $searchTerm = $request->input('search') ?? '';
        $paymentTerms = PaymentTerm::search($searchTerm)->paginate(10);
        
        return view('private.payment_terms.index', compact('paymentTerms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.payment_terms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'condicao_pagamento' => 'required|string',
            'multa' => 'required|numeric|min:0',
            'juro' => 'required|numeric|min:0',
            'desconto' => 'required|numeric|min:0|max:100',

            'parcelas' => new CheckArray,
        ]);

        //Descobrir qnts de parcelas
        $decodeInstallments = $validatedData['parcelas'];
        $installments = json_decode($decodeInstallments, true);
        $qntInstallments = count($installments);


        $paymentTerm = new PaymentTerm([
            'condicao_pagamento' => $validatedData['condicao_pagamento'],
            'multa' => $validatedData['multa'],
            'juro' => $validatedData['juro'],
            'desconto' => $validatedData['desconto'],
            'qtd_parcelas' => $qntInstallments
        ]);

        DB::beginTransaction();
        try {
            $paymentTerm->save();

            foreach ($installments as $index => $installment) {
                $installment = new Installment([
                    'payment_term_id' => $paymentTerm->id,
                    'payment_form_id' => $installment['codFormaPagamento'],
                    'parcela' => $installment['qnt'],
                    'dias' => $installment['dias'],
                    'porcentual' => $installment['porcentual'],
                ]);

                $installment->save();
            };

            DB::commit();

            return redirect()->route('payment_terms.index')->with('success', 'Condição de Pagamento criado com sucesso.');

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar condição de pagamento: ' . $th);

            return redirect()->route('payment_terms.index')->with('failed', 'Condição de Pagamento não foi criada.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentTerm $payment_term)
    {
        return view('private.payment_terms.show', compact('payment_term'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentTerm $payment_term)
    {
        return view('private.payment_terms.edit', compact('payment_term'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentTerm $payment_term)
    {
        $payment_term->condicao_pagamento = $request->get('condicao_pagamento');
        $payment_term->multa = $request->get('multa');
        $payment_term->juro = $request->get('juro');
        $payment_term->desconto = $request->get('desconto');
        $payment_term->qtd_parcelas = $request->get('qtd_parcelas');

        $payment_term->save();

        return redirect('/payment_terms')->with('success', 'Condição de Pagamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentTerm $payment_term)
    {
        $payment_term->delete();

        return redirect('/payment_terms')->with('success', 'Condição de Pagamento excluído com sucesso.');

    }
}