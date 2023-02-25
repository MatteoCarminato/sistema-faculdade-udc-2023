<?php

namespace App\Http\Controllers;

use App\Models\PaymentTerm;
use Illuminate\Http\Request;

class PaymentTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentTerms = PaymentTerm::all();
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
        $paymentTerm = new PaymentTerm([
            'condicao_pagamento' => $request->get('condicao_pagamento'),
            'multa' => $request->get('multa'),
            'juro' => $request->get('juro'),
            'desconto' => $request->get('desconto'),
            'qtd_parcelas' => $request->get('qtd_parcelas')
        ]);
    
        $paymentTerm->save();
    
        return redirect()->route('payment_terms.index')->with('success', 'Termo de pagamento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentTerm $paymentTerm)
    {
        $paymentTerm = PaymentTerm::find($paymentTerm);

        return view('private.payment_terms.show', compact('paymentTerm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentTerm $paymentTerm)
    {
        $paymentTerm = PaymentTerm::find($paymentTerm);

    return view('private.payment_terms.edit', compact('paymentTerm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentTerm $paymentTerm)
    {
        $paymentTerm = PaymentTerm::find($paymentTerm);
    $paymentTerm->condicao_pagamento = $request->get('condicao_pagamento');
    $paymentTerm->multa = $request->get('multa');
    $paymentTerm->juro = $request->get('juro');
    $paymentTerm->desconto = $request->get('desconto');
    $paymentTerm->qtd_parcelas = $request->get('qtd_parcelas');

    $paymentTerm->save();

    return redirect('/payment_terms')->with('success', 'Termo de pagamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentTerm $paymentTerm)
    {
        $paymentTerm = PaymentTerm::find($paymentTerm);
        $paymentTerm->delete();
    
        return redirect('/payment_terms')->with('success', 'Termo de pagamento excluído com sucesso.');
    
    }
}