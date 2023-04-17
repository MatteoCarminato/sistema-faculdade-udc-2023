@extends('layouts.app')

@section('content')

{{-- Modal --}}
@include('private.groups.modal.modal_teacher_form')
@include('private.groups.modal.modal_create_teacher')

@include('private.groups.modal.modal_category_form')
@include('private.groups.modal.modal_create_category')

{{-- Modal --}}


<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Turma') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Turma') }}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW OPEN -->
    <div class="row row-cards">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Cadastrar Turma') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <form method="POST" action="{{ route('locals.store') }}" enctype="multipart/form-data" class="needs-validation @if($errors->all()) was-validated @endif" novalidate>
                                @csrf
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" readonly />
                                    </div>
                                    <div class="col-xl-10 mb-3">
                                        <label>{{ __('Nome') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>

                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Professor') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_teacher-input" name="teacher_id" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_teacher_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Professor') }}</label>
                                        <input class="form-control" id="name-teacher-input" readonly>
                                    </div>

                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Categoria') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_categories-input" name="category_id" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_categories_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Categoria') }}</label>
                                        <input class="form-control" id="name-categories-input" readonly>
                                    </div>

                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Local') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_locals-input" name="local_id" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_locals_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Local') }}</label>
                                        <input class="form-control" id="name-locals-input" readonly>
                                    </div>

                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Modalidade') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_modality-input" name="modality_id" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_modality_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Modalidade') }}</label>
                                        <input class="form-control" id="name-modality-input" readonly>
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