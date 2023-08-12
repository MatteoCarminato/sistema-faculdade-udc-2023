@extends('layouts.app')

@section('content')
    {{-- Modal --}}

    @include('private.contracts.modal.modal_clients_form')
    @include('private.contracts.modal.modal_create_clients')

    @include('private.contracts.modal.modal_responsavel_form')
    @include('private.contracts.modal.modal_create_responsavel')


    @include('private.contracts.modal.modal_groups_form')



    @include('private.contracts.modal.modal_payment_terms_form')
    @include('private.contracts.modal.modal_create_payment_terms')
    
    {{-- Modal --}}


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
                        <h3 class="card-title">{{ __('Cadastrar Contratos') }}</h3>
                    </div>
                    <div class="card-body">


                        <div class="row">

                            <div class="row">
                                <div class="card-body">

                                    <div class="row">


                                        <form method="POST" action="{{ route('contracts.store') }}"
                                            enctype="multipart/form-data" id="form-group">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-xl-2 mb-2">
                                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                                    <input class="form-control" readonly />
                                                </div>
                                                <div class="col-xl-2 mb-2">
                                                    <label for="monthly_fee">{{ __('Valor') }}</label>
                                                    <input type="text" name="monthly_fee" id="monthly_fee"
                                                        value="{{ old('monthly_fee') }}" required
                                                        class="form-control money-mask">
                                                </div>
                                                <div class="col-xl-2 mb-2">
                                                    <label>{{ __('Data') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ \Carbon\Carbon::now() }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-xl-2 mb-3">
                                                    <label>{{ __('Código Aluno') }}</label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="cod_clients-input" name="clients_id"
                                                            readonly>
                                                        <button class="modal-effect input-group-text"
                                                            data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                            href="#modal_clients_form"> <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 mb-3">
                                                    <label>{{ __('Aluno') }}</label>
                                                    <input class="form-control" id="name-clients-input" readonly>
                                                </div>

                                                <div class="col-xl-2 mb-3">
                                                    <label>{{ __('Responsável Financeiro') }}</label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="cod_responsavel-input"
                                                            name="responsavel_id" readonly>
                                                        <button class="modal-effect input-group-text"
                                                            data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                            href="#modal_responsavel_form"> <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 mb-3">
                                                    <label>{{ __('Responsável Financeiro') }}</label>
                                                    <input class="form-control" id="name-responsavel-input" readonly>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="col-xl-2 mb-3">
                                                    <label>{{ __('Código Turma') }}</label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="cod_groups-input" name="groups_id"
                                                            readonly>
                                                        <button class="modal-effect input-group-text"
                                                            data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                            href="#modal_groups_form"> <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 mb-3">
                                                    <label>{{ __('Turma') }}</label>
                                                    <input class="form-control" id="name-groups-input" readonly>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                                <h3 class="card-title">Condição de Pagamento </h3>
                                            </div>

                                            <div class="row">
                                                <div class="form-row mt-4">
                                                    <div class="col-xl-2 mb-3">
                                                        <label>{{ __('Código Condição de Pagamento') }}</label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="cod_payment_terms-input"
                                                                name="payment_terms_id" readonly>
                                                            <button class="modal-effect input-group-text"
                                                                data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                                href="#modal_payment_terms_form">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 mb-3">
                                                        <label>{{ __('Condição de Pagamento') }}</label>
                                                        <input class="form-control" id="name-payment_terms-input" readonly>
                                                    </div>
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



            <script>
                $(document).ready(function() {
                    $('.money-mask').inputmask('currency', {
                        prefix: 'R$ ',
                        radixPoint: ',',
                        groupSeparator: '.',
                        allowMinus: false,
                        rightAlign: false,
                        digits: 2,
                        placeholder: '0',
                        clearMaskOnLostFocus: false
                    });
                });
            </script>
        @endsection
