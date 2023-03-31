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
                <h3 class="card-title">{{ __('Ver Professor') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" readonly value="{{$teacher->id}}" />
                                </div>
                                <div class="col-xl-5 mb-3">
                                    <label>{{ __('Nome') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $teacher->name }}" readonly >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-5 mb-3">
                                    <label>{{ __('Celular') }}</label>
                                    <input type="text" class="form-control" id="phone" value="{{ $teacher->phone }}" readonly >
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label>{{ __('Email') }}</label>
                                    <input type="text" class="form-control" id="email" value="{{ $teacher->email }}" readonly >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label>{{ __('CREF') }}</label>
                                    <input type="text" class="form-control" id="cref" value="{{ $teacher->cref }}" readonly >
                                    @error('cref')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div
@endsection