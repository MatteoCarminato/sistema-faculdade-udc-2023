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
                <h3 class="card-title">{{ __('Cadastrar Forma de Pagamento') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card-body">
                        <form method="POST" action="{{ route('payment_forms.store') }}" class="needs-validation @if($errors->all())('forma_pagamento') was-validated @endif" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" readonly />
                                </div>
                                <div class="col-xl-7 mb-3">
                                    <label>{{ __('Forma de Pagamento') }}</label>
                                    <input type="text" class="form-control" id="forma_pagamento" name="forma_pagamento" value="{{old('forma_pagamento')}}" required autofocus >
                                    @error('forma_pagamento')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                            </div> 
                        
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection