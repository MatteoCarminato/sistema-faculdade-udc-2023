@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Países') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">{{ __('Países') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $country->name }}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW OPEN -->
    <div class="row row-cards">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Detalhes do País') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" value="{{ $country->id }}" readonly />
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label>{{ __('Nome') }}</label>
                                    <input type="text" class="form-control" value="{{ $country->name }}" readonly>
                                </div>
                                <div class="col-xl-2 mb-3">
                                    <label>{{ __('Sigla') }}</label>
                                    <input type="text" class="form-control" value="{{ $country->acronym }}" readonly>
                                </div>
                                <div class="col-xl-2 mb-3">
                                    <label>{{ __('Slug') }}</label>
                                    <input type="text" class="form-control" value="{{ $country->slug }}" readonly>
                                </div>
                                <div class="col-xl-2 mb-3">
                                    <label>{{ __('DDD') }}</label>
                                    <input type="text" class="form-control" value="{{ $country->phone_code }}" readonly>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label>{{ __('Logo') }}</label>
                                    @if ($country->flag)
                                    <img src="{{ Storage::url($country->flag) }}" alt="{{ $country->name }}" width="200px">
                                    @else
                                        <p>{{ __('Não há logo cadastrada') }}</p>
                                    @endif
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