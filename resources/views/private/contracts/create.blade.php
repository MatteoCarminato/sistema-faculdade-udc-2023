@extends('layouts.app')

@section('content')
    {{-- Modal --}}
    @include('private.groups.modal.modal_teacher_form')
    @include('private.groups.modal.modal_create_teacher')

    @include('private.groups.modal.modal_category_form')
    @include('private.groups.modal.modal_create_category')

    @include('private.groups.modal.modal_locals_form')
    @include('private.groups.modal.modal_create_locals')

    @include('private.groups.modal.modal_modality_form')
    @include('private.groups.modal.modal_create_modality')

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
                                <form method="POST" action="{{ route('groups.store') }}" enctype="multipart/form-data"
                                    id="form-group">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-xl-2 mb-2">
                                            <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                            <input class="form-control" readonly />
                                        </div>
                                        <div class="col-xl-2 mb-2">
                                            <label for="monthly_fee">{{ __('Valor') }}:</label>
                                            <input type="text" name="monthly_fee" id="monthly_fee"
                                                value="{{ old('monthly_fee') }}" required class="form-control">
                                        </div>
                                        <div class="col-xl-2 mb-2">
                                            <label>{{ __('Data') }}</label>
                                            <input type="text" class="form-control" value="{{ \Carbon\Carbon::now() }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-2 mb-3">
                                            <label>{{ __('Código Aluno') }}</label>
                                            <div class="input-group">
                                                <input class="form-control" id="cod_teacher-input" name="teacher_id"
                                                    readonly>
                                                <button class="modal-effect input-group-text"
                                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                    href="#modal_teacher_form"> <i class="fa fa-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label>{{ __('Aluno') }}</label>
                                            <input class="form-control" id="name-teacher-input" readonly>
                                        </div>

                                        <div class="col-xl-3 mb-2">
                                            <label>{{ __('Responsaveis') }}</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="create_resource">
                                                <option value="res"> res</option>
                                                <option value="resss"> ress </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-2 mb-3">
                                            <label>{{ __('Código Turma') }}</label>
                                            <div class="input-group">
                                                <input class="form-control" id="cod_teacher-input" name="teacher_id"
                                                    readonly>
                                                <button class="modal-effect input-group-text"
                                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                    href="#modal_teacher_form"> <i class="fa fa-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label>{{ __('Turma') }}</label>
                                            <input class="form-control" id="name-teacher-input" readonly>
                                        </div>


                                        
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-xl-11"></div>
                                            <div class="col-xl-1">
                                                <button type="submit" id="btnSalvarForm"
                                                    class="btn btn-primary">{{ __('Salvar') }}</button>
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
