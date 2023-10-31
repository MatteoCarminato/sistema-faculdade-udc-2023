@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Contratos') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Contratos') }}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW OPEN -->
    <div class="row row-cards">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Editar Contratos') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" readonly value="{{ $contract->id }}" />
                                    </div>
                                    <div class="col-xl-5 mb-3">
                                        <label>{{ __('Nome Aluno') }}</label>
                                        <input type="text" class="form-control" id="name" value="{{ old('name') ?: $contract->client->name }}" disabled >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-5 mb-3">
                                        <label>{{ __('Nome Aluno') }}</label>
                                        <input type="text" class="form-control" id="name" value="{{ old('name') ?: $contract->responsible->name }}" disabled >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="col-xl-10 mb-3">
                                        <label>{{ __('Status do Contrato') }}</label>
                                        <select name="status" class="form-select form-control" disabled>
                                            <option value="pendente"{{ old('status', 'pendente') === 'pendente' ? ' selected' : '' }}>Pendente</option>
                                            <option value="confirmado"{{ old('status') === 'confirmado' ? ' selected' : '' }}>Confirmado</option>
                                            <option value="cancelado"{{ old('status') === 'cancelado' ? ' selected' : '' }}>Cancelado</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label for="example-tel-input"
                                               class="col-sm-2 form-label align-self-center mb-lg-0 hidden-sm"
                                               value="{{ $contract->doc_resp }}"> Contrato </label>
                                        <a href="{{ url("storage/{$contract->contrato}") }}"
                                           class="btn {{ $contract->contrato == null ? "btn btn-secondary" : "btn-warning" }} hidden-sm"
                                           type="button" target="_blank"
                                           style="{{ $contract->contrato == null ? " pointer-events: none;" : "" }}">{{ $contract->contrato == null ? "Sem arquivo" : "Download Arquivo" }}
                                        </a>
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