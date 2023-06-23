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
                <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">{{ __('Estados') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Detalhes do Estado') }}</li>
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
                                    <input class="form-control" readonly value="{{ $city->id }}" />
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label>{{ __('Nome') }}</label>
                                    <input type="text" class="form-control" readonly value="{{ $city->name }}" />
                                </div>
                                <div class="col-xl-2 mb-3">
                                    <label>{{ __('Slug') }}</label>
                                    <input type="text" class="form-control" readonly value="{{ $city->slug }}" />
                                </div>
                                <div class="col-xl-2 mb-3">
                                    <label>{{ __('DDD') }}</label>
                                    <input type="text" class="form-control" readonly value="{{ $city->phone_code }}" />
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <label>{{ __('Código Estado') }}</label>
                                    <input class="form-control" readonly value="{{ $city->state_id }}" />
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <label>{{ __('Estado') }}</label>
                                    <input class="form-control" readonly value="{{ $city->state->name }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('cities.index') }}" class="btn btn-primary">{{ __('Voltar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection