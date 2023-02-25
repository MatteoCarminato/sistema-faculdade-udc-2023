@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">{{ __('Forma de Pagamento') }}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Forma de Pagamento') }}</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW OPEN -->
<div class="row row-cards">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('Listagem Forma de Pagamento') }}</h3>
                <a href="{{ route('payment_forms.create') }}" class="btn btn-primary">{{ __('Cadastrar') }}</a>
            </div>
            <div class="card-body">
            @if (session('success'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success mb-2" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i>{{ session('success') }}
                        </div>
                    </div>
                </div>
                @elseif (session('warning'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger mb-2" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-frown-o me-2" aria-hidden="true"></i>{{ session('warning') }}
                        </div>
                    </div>
                </div>
            @endif

                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0" id="tableFormaPagamento">
                        <thead>
                            <th>{{ __('Forma de Pagamento') }}</th>
                            <th>{{ __('Data de Criação') }}</th>
                            <th>{{ __('Data de Alteração') }}</th>
                            <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                        </thead>
                        <tbody>
                            @foreach($payment_form as $paymentForm)
                            <tr>
                                <td>{{ $paymentForm->forma_pagamento }}</td>
                                <td>{{ $paymentForm->created_at }}</td>
                                <td>{{ $paymentForm->updated_at }}</td>
                                <td class="td-actions text-right">
                                    <form action="{{ route('payment_forms.destroy', $paymentForm->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-warning" href="{{ route('payment_forms.edit', $paymentForm->id) }}" data-original-title="" title="">
                                            <i class="material-icons">Editar</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Voce tem certeza que deseja excluir?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">Apagar</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection