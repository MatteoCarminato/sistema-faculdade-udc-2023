@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Estados') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">{{ __('Estados') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $state->name }}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW OPEN -->
    <div class="row row-cards">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Detalhes do Estado') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" value="{{ $state->id }}" readonly />
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label>{{ __('Nome') }}</label>
                                    <input type="text" class="form-control" value="{{ $state->name }}" readonly>
                                </div>
                                <div class="col-xl-2 mb-3">
                                    <label>{{ __('Sigla') }}</label>
                                    <input type="text" class="form-control" value="{{ $state->acronym }}" readonly>
                                </div>
                                <div class="col-xl-2 mb-3">
                                    <label>{{ __('Slug') }}</label>
                                    <input type="text" class="form-control" value="{{ $state->slug }}" readonly>
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <label>{{ __('Código País') }}</label>
                                    <div class="input-group"> 
                                        <input class="form-control" value="{{ $state->country->id }}" readonly>  
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <label>{{ __('País') }}</label>
                                    <input class="form-control" value="{{ $state->country->name }}" readonly>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-xl-11">
                                        </div>
                                    <div class="col-xl-1">
                                    <a href="{{ route('countries.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection