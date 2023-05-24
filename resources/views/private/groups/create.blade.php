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
                            <form method="POST" action="{{ route('groups.store') }}" enctype="multipart/form-data"  id="form-group">
                                @csrf
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" readonly />
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <label>{{ __('Nome') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>

                                    <div class="col-xl-2 mb-2">
                                        <label>{{ __('Ano') }}</label>
                                        <select name="year" class="form-select form-control">
                                            @php
                                                $currentYear = \Carbon\Carbon::now()->year;
                                                $nextYear = $currentYear + 1;
                                            @endphp
                                            <option value="{{ $currentYear }}">{{ $currentYear }}</option>
                                            <option value="{{ $nextYear }}">{{ $nextYear }}</option>
                                        </select>
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
                                            <input class="form-control" id="cod_locals-input" name="locals_id" readonly>  
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
                                            <input class="form-control" id="cod_modalities-input" name="modality_id" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_modalities_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Modalidade') }}</label>
                                        <input class="form-control" id="name-modalities-input" readonly>
                                    </div>
                                </div>
                                <hr>
                                    <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                        <h3 class="card-title">Data e Hora </h3>
                                    </div>
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="col-xl-5 col-md-5">
                                            <label>{{ __('Dia da semana') }}</label>
                                            <select name="id_weekday" id="id_weekday" class="form-select form-control">
                                                <option value="Segunda-feira">Segunda-feira</option>
                                                <option value="Terça-feira">Terça-feira</option>
                                                <option value="Quarta-feira">Quarta-feira</option>
                                                <option value="Quinta-feira">Quinta-feira</option>
                                                <option value="Sexta-feira">Sexta-feira</option>
                                                <option value="Sábado">Sábado</option>
                                                <option value="Domingo">Domingo</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-5 col-md-5">
                                            <label>{{ __('Hora do dia') }}</label>
                                            <select name="id_hour" id="id_hour"  class="form-select form-control">
                                                <option value="00:00">00:00</option>
                                                <option value="01:00">01:00</option>
                                                <option value="02:00">02:00</option>
                                                <option value="03:00">03:00</option>
                                                <option value="04:00">04:00</option>
                                                <option value="05:00">05:00</option>
                                                <option value="06:00">06:00</option>
                                                <option value="07:00">07:00</option>
                                                <option value="08:00">08:00</option>
                                                <option value="09:00">09:00</option>
                                                <option value="10:00">10:00</option>
                                                <option value="11:00">11:00</option>
                                                <option value="12:00">12:00</option>
                                                <option value="13:00">13:00</option>
                                                <option value="14:00">14:00</option>
                                                <option value="15:00">15:00</option>
                                                <option value="16:00">16:00</option>
                                                <option value="17:00">17:00</option>
                                                <option value="18:00">18:00</option>
                                                <option value="19:00">19:00</option>
                                                <option value="20:00">20:00</option>
                                                <option value="21:00">21:00</option>
                                                <option value="22:00">22:00</option>
                                                <option value="23:00">23:00</option>
                                            </select>
                                    </div>

                                        <div class="col-xl-1">
                                            <button class="btn btn-primary col-sm-12 col-md-12" type="button"
                                                value="Salvar" id="btnSalvar" style="margin-top: 28px;">Add</button>
                                        </div>
                                    </div>
                                    <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                        <h3 class="card-title">Horarios</h3>
                                    </div>
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="table-responsive">
                                            <table class="table border text-nowrap text-md-nowrap table-bordered mb-0"
                                                id="tblDados">
                                                <thead>
                                                    <tr>
                                                        <th>Dia da Semana</th>
                                                        <th>Hora</th>
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
                                            <button type="submit" id="btnSalvarForm" class="btn btn-primary">{{ __('Salvar') }}</button>
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
                // Array que irá guardar as informações da tabela
                var tabelaItens = [];

                // Quando clicar no botão "Add"
                $('#btnSalvar').on('click', function() {
                    console.log("clickei")
                    // Obter os valores dos inputs
                    var weekday = $('#id_weekday').val();
                    var hour = $('#id_hour').val();

                    // Verificar se todos os campos estão preenchidos
                    if (weekday && hour) {

                        var index = tabelaItens.findIndex(function(item) {
                            return item.weekday === weekday && item.hour === hour;
                        });
                        if (index !== -1) {
                            alert('Essa combinação já existe');
                            return;
                        }

                        // Adicionar um objeto com as informações na tabela
                        var rowCount = tabelaItens.length + 1;

                        tabelaItens.push({
                            weekday: weekday,
                            hour: hour,
                        });

                        // Limpar os valores dos inputs
                        $('#id_weekday').val('');
                        $('#id_hour').val('');

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
                                        <td class="d-none">${index + 1}</td>
                                        <td>${item.weekday}</td>
                                        <td>${item.hour}</td>
                                        <td><button class="btn btn-danger" data-index="${index}">Remover</button></td>
                                        </tr>
                                    `);
                    });

                    // Atualizar a quantidade de itens na tabela
                    $('#qntItens').text(tabelaItens.length);
                }

                // Quando clicar no botão "Remover"
                $('#tblDados').on('click', '.btn-danger', function() {
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
                        var weekday = $(tr).find('td:eq(1)').text();
                        var hour = $(tr).find('td:eq(2)').text();
                        data.push({
                            qnt: qnt,
                            weekday: weekday,
                            hour: hour
                        });
                    });
                    console.log('data', data)
                    const groupHours = document.createElement('input');
                    groupHours.type = 'hidden';
                    groupHours.name = 'groupHours';
                    groupHours.value = JSON.stringify(data);
                    document.querySelector('#form-group').appendChild(groupHours);
                });
            });
        </script>

@endsection