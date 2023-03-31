@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Professor') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Professor') }}</li>
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
                    <h3 class="card-title">{{ __('Cadastrar Professor') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <form method="POST" action="{{ route('teachers.store') }}" class="needs-validation @if($errors->all())('forma_pagamento') was-validated @endif" novalidate>
                                @csrf
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" readonly />
                                    </div>
                                    <div class="col-xl-5 mb-3">
                                        <label>{{ __('Nome') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-5 mb-3">
                                        <label>{{ __('Celular') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required autofocus >
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <label>{{ __('Email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" required autofocus >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <label>{{ __('CREF') }}</label>
                                        <input type="text" class="form-control" id="cref" name="cref" value="{{old('cref')}}" required autofocus >
                                        @error('cref')
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