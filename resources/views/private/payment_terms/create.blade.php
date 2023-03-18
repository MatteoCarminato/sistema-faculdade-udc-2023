@extends('layouts.app')

@section('content')

    {{-- Modal --}}
    @include('components.modal.modal_payment_form')
    {{-- Modal --}}

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Condição de Pagamento') }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Condição de Pagamento') }}</li>
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
                        <h3 class="card-title">{{ __('Cadastrar Condição de Pagamento') }}</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="row">
                                <div class="col-sm-12">
                                    @foreach ($errors->all() as $message)
                                        <div class="alert alert-danger mb-2" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <i class="fa fa-frown-o me-2" aria-hidden="true"></i>{{ $message }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="card-body">
                                <form method="POST" action="{{ route('payment_terms.store') }}"
                                    id="form-condicao-pagamento">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-xl-2 mb-2">
                                            <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                            <input class="form-control" readonly />
                                        </div>
                                        <div class="col-xl-7 mb-3">
                                            <label>{{ __('Condição de Pagamento') }}</label>
                                            <input type="text" class="form-control" name="condicao_pagamento"
                                                value="{{ old('condicao_pagamento') }}">
                                            @error('condicao_pagamento')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label>{{ __('Multa (sob. valor)') }}</label>
                                            <input type="number" name="multa" value="{{ old('multa') }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label>{{ __('Juros (a.m.)') }}</label>
                                            <input type="number" name="juro" class="form-control"
                                                value="{{ old('juro') }}">
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label>{{ __('Desconto (sob. valor)') }}</label>
                                            <input type="number" class="form-control" name="desconto"
                                                value="{{ old('desconto') }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                        <h3 class="card-title">Parcelas</h3>
                                    </div>
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="col-xl-2 col-md-3">
                                            <label>{{ __('Numero de Dias') }}</label>
                                            <input type="numeric" id="id_dias" class="form-control-novalidate">
                                        </div>
                                        <div class="col-xl-2 col-md-3">
                                            <label>{{ __('Porcentual') }}</label>
                                            <div class="input-group">
                                                <input type="numeric" id="id_porcentual" class="form-control">
                                                <p class="input-group-text"> % </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3">
                                            <label>{{ __('Código Forma de Pagamento') }}</label>
                                            <div class="input-group">
                                                <input class="form-control" id="cod_forma_pagamento-input" readonly>
                                                <button class="modal-effect input-group-text"
                                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                    href="#modal_payment_form"> <i class="fa fa-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3">
                                            <label>{{ __('Forma de Pagamento') }}</label>
                                            <input class="form-control" id="forma_pagamento-input" readonly>
                                        </div>
                                        <div class="col-xl-1">
                                            <button class="btn btn-primary col-sm-12 col-md-12" type="button"
                                                value="Salvar" id="btnSalvar" style="margin-top: 28px;">Add</button>
                                        </div>
                                    </div>
                                    <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                        <h3 class="card-title">Listagem Parcelas</h3>
                                    </div>
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="table-responsive">
                                            <table class="table border text-nowrap text-md-nowrap table-bordered mb-0"
                                                id="tblDados">
                                                <thead>
                                                    <tr>
                                                        <th>Qnt</th>
                                                        <th>Numero de Dias</th>
                                                        <th>Porcentual %</th>
                                                        <th>Forma de Pagamento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-xl-11"></div>
                                            <div class="col-xl-1">
                                                <button class="btn btn-primary" id="btnSalvarForm" disabled
                                                    type="submit">{{ __('Salvar') }}</button>
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

        <script>
            $(document).ready(function() {
                // Array que irá guardar as informações da tabela
                var tabelaItens = [];

                // Quando clicar no botão "Add"
                $('#btnSalvar').on('click', function() {
                    console.log("clickei")
                    // Obter os valores dos inputs
                    var dias = $('#id_dias').val();
                    var porcentual = $('#id_porcentual').val();
                    var codFormaPagamento = $('#cod_forma_pagamento-input').val();
                    var formaPagamento = $('#forma_pagamento-input').val();

                    // Verificar se todos os campos estão preenchidos
                    if (dias && porcentual && codFormaPagamento && formaPagamento) {
                        // Adicionar um objeto com as informações na tabela
                        var rowCount = tabelaItens.length + 1;

                        tabelaItens.push({
                            dias: dias,
                            porcentual: porcentual,
                            codFormaPagamento: codFormaPagamento,
                            formaPagamento: formaPagamento
                        });

                        // Limpar os valores dos inputs
                        $('#id_dias').val('');
                        $('#id_porcentual').val('');
                        $('#cod_forma_pagamento-input').val('');
                        $('#forma_pagamento-input').val('');

                        $('#btnSalvarForm').prop("disabled", false);

                        // Atualizar a tabela
                        atualizarTabelaItens();
                    } else {
                        alert('Por favor, preencha todos os campos');
                    }
                });

                // Função para atualizar a tabela de itens
                function atualizarTabelaItens() {
                    var tbody = $('#tblDados tbody');
                    tbody.empty();
                    tabelaItens.forEach(function(item, index) {
                        tbody.append(`
                                        <tr>
                                        <td>${index + 1}</td>
                                        <td>${item.dias}</td>
                                        <td>${item.porcentual}</td>
                                        <td>${item.formaPagamento}</td>
                                        <td class="d-none">${item.codFormaPagamento}</td>
                                        <td><button class="btn btn-danger" data-index="${index}">Remover</button></td>
                                        </tr>
                                    `);
                    });

                    // Atualizar a quantidade de itens na tabela
                    $('#qntItens').text(tabelaItens.length);
                }

                // Quando clicar no botão "Remover"
                $('#tblDados').on('click', '.btn-danger', function() {
                    console.log("botao")
                    // Obter o índice do item a ser removido
                    var index = $(this).data('index');

                    // Remover o item do array de itens
                    tabelaItens.splice(index, 1);

                    // Atualizar a tabela de itens
                    atualizarTabelaItens();
                });

                $('#btnSalvarForm').on('click', function() {
                    var data = [];
                    $('#tblDados tbody tr').each(function(row, tr) {
                        var qnt = $(tr).find('td:eq(0)').text();
                        var dias = $(tr).find('td:eq(1)').text();
                        var porcentual = $(tr).find('td:eq(2)').text();
                        var forma_pagamento = $(tr).find('td:eq(3)').text();
                        var codFormaPagamento = $(tr).find('td:eq(4)').text();
                        data.push({
                            qnt: qnt,
                            dias: dias,
                            porcentual: porcentual,
                            forma_pagamento: forma_pagamento,
                            codFormaPagamento: codFormaPagamento
                        });
                    });

                    const inputParcelas = document.createElement('input');
                    inputParcelas.type = 'hidden';
                    inputParcelas.name = 'parcelas';
                    inputParcelas.value = JSON.stringify(data);
                    document.querySelector('#form-condicao-pagamento').appendChild(inputParcelas);
                });
            });
        </script>

        <style>
            .form-control-novalidate {
                display: block;
                width: 100%;
                padding: 0.475rem 0.75rem;
                font-size: 0.875rem;
                font-weight: 400;
                line-height: 1.5;
                color: #4d5875;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #e9edf4;
                border-radius: 7px;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
        </style>
    @endsection
