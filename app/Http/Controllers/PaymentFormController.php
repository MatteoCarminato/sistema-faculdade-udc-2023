<?php

namespace App\Http\Controllers;

use App\Models\PaymentForm;
use Illuminate\Http\Request;

class PaymentFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $payment_form = PaymentForm::all();

        return view('private.payment_forms.index', compact('payment_form'));
    }

   /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.payment_forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'forma_pagamento' => 'required|unique:payment_forms|max:255',
        ]);

        $paymentForm = PaymentForm::create($request->all());

        return redirect()->route('payment_forms.index')->with('success', 'Forma de Pagamento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentForm $payment_form)
    {
        return view('private.payment_forms.show', compact('payment_form'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentForm $payment_form)
    {
        return view('private.payment_forms.edit', compact('payment_form'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentForm $payment_form)
    {
        $request->validate([
            'forma_pagamento' => 'required|unique:payment_forms|max:255',
        ]);

        $payment_form->update($request->all());

        return redirect()->route('payment_forms.index')->with('success', 'Forma de Pagamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentForm $payment_form)
    {
        $payment_form->delete();

        return redirect()->route('payment_forms.index')->with('success', 'Forma de Pagamento excluído com sucesso.');
    }
}


