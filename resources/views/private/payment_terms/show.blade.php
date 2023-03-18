@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">{{ __('Condição de Pagamento') }}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Condição de Pagamento') }}</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW OPEN -->
<div class="row row-cards">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('Listagem Condição de Pagamento') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                        <div class="card-body">  
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" value="{{ $payment_term->id }}" readonly />
                                </div>
                                <div class="col-xl-7 mb-3">
                                    <label>{{ __('Condição de Pagamento') }}</label>
                                    <input type="text" class="form-control" value="{{ $payment_term->condicao_pagamento }}" readonly>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label>{{ __('Multa (sob. valor)') }}</label>
                                    <input  type="number" value="{{ $payment_term->multa }}" class="form-control" readonly>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label>{{ __('Juros (a.m.)') }}</label>
                                    <input type="number" class="form-control" value="{{ $payment_term->juro }}" readonly>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label>{{ __('Desconto (sob. valor)') }}</label>
                                    <input type="number" class="form-control" value="{{ $payment_term->desconto }}" readonly>
                                </div>
                            </div> 
                            <hr>         
                            <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                <h3 class="card-title">Listagem Parcelas</h3>
                            </div>
                            <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="table-responsive">
                                        <table class="table border text-nowrap text-md-nowrap table-bordered mb-0" id="tblDados">
                                            <thead>
                                                <tr>
                                                    <th>Qnt</th>
                                                    <th>Numero de Dias</th>
                                                    <th>Porcentual %</th>
                                                    <th>Forma de Pagamento</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($payment_term->installments as $installment)
                                                <tr>
                                                    <td>{{ $installment->parcela }}</td>
                                                    <td>{{ $installment->dias }}</td>
                                                    <td>{{ $installment->porcentual }}</td>
                                                    <td>{{ $installment->paymentForm->forma_pagamento }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary float-right">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection