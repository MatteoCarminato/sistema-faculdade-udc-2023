@extends('layouts.app')

@section('content')

{{-- Modal --}}
@include('components.modal.modal_country_form')

@include('components.modal.modal_create_country_form')
{{-- Modal --}}

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Estados') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Estados') }}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    {{-- Alert Messages --}}
        @include('components.alert.error-input')
    {{-- Alert Messages --}}

    <!-- ROW OPEN -->
    <div class="row row-cards">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Editar Estado') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <form method="POST" action="{{ route('states.update', $state->id) }}" enctype="multipart/form-data" class="needs-validation @if($errors->all()) was-validated @endif" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" readonly value="{{ $state->id }}" />
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Nome') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $state->name }}" required autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Sigla') }}</label>
                                        <input type="text" class="form-control" id="acronym" name="acronym" value="{{ old('acronym') ?: $state->acronym }}" required >
                                        @error('acronym')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Slug') }}</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') ?: $state->slug }}" required >
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <label>{{ __('Código País') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_country-input" name="country_id" value="{{ old('country_id') ?: $state->country_id }}" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_country_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <label>{{ __('País') }}</label>
                                        <input class="form-control" id="name-country-input" value="{{ $state->country->name }}" readonly>
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