@extends('layouts.app')


@section('content')

{{-- Modal --}}
@include('components.modal.modal_state_form')
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
                            <form method="POST" action="{{ route('cities.update', $city->id) }}" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" readonly value="{{ $city->id }}" />
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <label>{{ __('Nome') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $city->name }}" required autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Slug') }}</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') ?: $city->slug }}" required >
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('DDD') }}</label>
                                        <input type="text" class="form-control" id="phone_code" name="phone_code" value="{{ old('phone_code') ?: $city->phone_code }}" required >
                                        @error('phone_code')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <label>{{ __('Código Estado') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_state-input" name="state_id" value="{{ old('state_id') ?: $city->state_id }}" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_state_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <label>{{ __('Estado') }}</label>
                                        <input class="form-control" id="name-state-input" value="{{ $city->state->name }}" readonly>
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