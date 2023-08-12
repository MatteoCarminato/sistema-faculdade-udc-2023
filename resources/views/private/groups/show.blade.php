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
                    <h3 class="card-title">{{ __('Detalhes da Turma') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" value="{{$group->id}}" readonly />
                                    </div>
                                    <div class="col-xl-7 mb-3">
                                        <label>{{ __('Nome') }}</label>
                                        <input type="text" class="form-control" value="{{$group->name}}" readonly>
                                    </div>
                                    <div class="col-xl-3 mb-2">
                                        <label>{{ __('Ano') }}</label>
                                        <input type="text" class="form-control" value="{{ old('year') }}" readonly>
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Professor') }}</label>
                                        <input class="form-control" value="{{ $group->teacher->id }}" readonly>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Professor') }}</label>
                                        <input class="form-control" value="{{ $group->teacher->name }}" readonly>
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Categoria') }}</label>
                                        <input class="form-control" value="{{ $group->category->id }}" readonly>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Categoria') }}</label>
                                        <input class="form-control" value="{{ $group->category->name }}" readonly>
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Local') }}</label>
                                        <input class="form-control" value="{{ $group->local->id }}" readonly>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Local') }}</label>
                                        <input class="form-control" value="{{ $group->local->name }}" readonly>
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Código Modalidade') }}</label>
                                        <input class="form-control" value="{{ $group->modality->id }}" readonly>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Modalidade') }}</label>
                                        <input class="form-control" value="{{ $group->modality->id }}" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                    <h3 class="card-title">Horarios</h3>
                                </div>
                                <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                    <div class="table-responsive">
                                        <table class="table border text-nowrap text-md-nowrap table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Dia da Semana</th>
                                                    <th>Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($groupHours as $hour)
                                                <tr>
                                                    <td>{{ $hour['weekday'] }}</td>
                                                    <td>{{ $hour['hour'] }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-xl-11"></div>
                                        <div class="col-xl-1">
                                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary">{{ __('Editar') }}</a>
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

<script>
    // JavaScript code for showing/hiding modals, saving data, and handling table items
    // ...
    // (Your existing JavaScript code goes here)
    // ...
</script>

@endsection