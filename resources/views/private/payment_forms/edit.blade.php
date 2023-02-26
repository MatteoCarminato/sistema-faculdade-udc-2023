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
                <div class="card-header">
                    <h3 class="card-title">{{ __('Editar Forma de Pagamento') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <form method="POST" action="{{ route('payment_forms.update', $payment_form->id) }}" class="needs-validation @if($errors->all())('forma_pagamento') was-validated @endif" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" name="id"  readonly value="{{ $payment_form->id }}" />
                                    </div>
                                    <div class="col-xl-10 mb-3">
                                        <label>{{ __('Forma de Pagamento') }}</label>
                                        <input type="text" class="form-control" id="forma_pagamento" name="forma_pagamento" value="{{ old('forma_pagamento', $payment_form->forma_pagamento) }}" required autofocus >
                                        @error('forma_pagamento')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-xl-11"></div>
                                        <div class="col-xl-1">
                                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection