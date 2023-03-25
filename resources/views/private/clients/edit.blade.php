@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ $client->type === 'responsavel'? 'Responsável' : 'Alunos' }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Alunos') }}</li>
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
                    <h3 class="card-title">Editar {{ $client->type === 'responsavel'? 'Responsável' : 'Alunos' }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <form method="POST" action="{{ route('clients.update', $client->id) }}" id="form-clients">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" value="{{ $client->id }}" readonly />
                                </div>
                                <div class="col-xl-5 mb-3">
                                    <label>{{ __('Nome') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}" required autofocus >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-5 mb-3">
                                    <label>{{ __('Apelido') }}</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname" value="{{ old('nickname', $client->nickname) }}" autofocus >
                                    @error('nickname')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('Data de Nascimento') }}</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $client->birth_date) }}" autofocus >
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label for="sex">Sexo:</label>
                                        <select class="form-select form-control" name="sex" id="sex">
                                            <option value="masculino"{{ old('sex', $client->sex) === 'masculino' ? ' selected' : '' }}>Masculino</option>
                                            <option value="feminino"{{ old('sex', $client->sex) === 'feminino' ? ' selected' : '' }}>Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('RG') }}</label>
                                    <input type="tel" class="form-control" id="rg" name="rg" value="{{ old('rg', $client->rg) }}" autofocus >
                                    @error('rg')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('CPF') }}</label>
                                    <input type="tel" class="form-control" id="cpf" name="cpf" value="{{ old('cpf', $client->cpf) }}" autofocus >
                                    @error('cpf')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('Telefone') }}</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" autofocus >
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                    </div>
                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Telefone Residencial') }}</label>
                                        <input type="tel" class="form-control" id="phone_home" name="phone_home" value="{{ old('phone_home', $client->phone_home) }}" autofocus >
                                        @error('phone_home')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Email') }}</label>
                                        <input type="tel" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}" autofocus >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label for="type">Tipo:</label>
                                            <select class="form-select form-control" name="type" id="type">
                                                <option value="aluno" @if(old('type', $client->type) === 'aluno') selected @endif>Aluno</option>
                                                <option value="responsavel"  @if(old('type', $client->type) === 'responsavel') selected @endif>Responsável</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <div class="form-group">
                                            <label for="blood_types">Tipo Sanguíneo:</label>
                                            <select class="form-select form-control" name="blood_types" id="blood_types">
                                                <option value="">Selecione</option>
                                                <option value="a+" @if( old('blood_types', $client->blood_types) === 'a+' ) selected @endif>A+</option>
                                                <option value="b+" @if( old('blood_types', $client->blood_types) === 'b+' ) selected @endif>B+</option>
                                                <option value="o+" @if( old('blood_types', $client->blood_types) === 'o+' ) selected @endif>O+</option>
                                                <option value="ab+" @if( old('blood_types', $client->blood_types) === 'ab+')selected @endif>AB+</option>
                                                <option value="a-" @if( old('blood_types', $client->blood_types) === 'a-' ) selected @endif>A-</option>
                                                <option value="b-" @if( old('blood_types', $client->blood_types) === 'b-' ) selected @endif>B-</option>
                                                <option value="o-" @if( old('blood_types', $client->blood_types) === 'o-' ) selected @endif>O-</option>
                                                <option value="ab-" @if( old('blood_types', $client->blood_types) === 'ab-')' selected @endif>AB-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <div class="form-group">
                                        <label for="height">Altura (cm):</label>
                                        <input type="text" class="form-control" name="height" id="height" value="{{ old('height', $client->height) }}" placeholder="Ex: 175">
                                        </div>
                                    </div>

                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <div class="form-group">
                                        <label for="weight">Peso (kg):</label>
                                        <input type="text" class="form-control" name="weight" id="weight" value="{{ old('weight', $client->weight) }}" placeholder="Ex: 70">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <label for="school">Escola:</label>
                                        <input type="text" name="school" id="school" class="form-control" value="{{ old('school', $client->school) }}">
                                    </div>
                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <label for="shift">Turno:</label>
                                        <select name="shift" id="shift" class="form-control">
                                        <option value="">Selecione um turno</option>
                                        <option value="manha"  @if( old('shift', $client->shift) === 'manha' )selected @endif>Manhã</option>
                                        <option value="tarde"  @if( old('shift', $client->shift) === 'tarde' )selected @endif>Tarde</option>
                                        <option value="noite"  @if( old('shift', $client->shift) === 'noite' )selected @endif>Noite</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row @if ($client->type === 'responsavel') d-none @endif" >
                                    <div class="col-xl-3 mb-3">
                                        <label for="zip_code">CEP:</label>
                                        <input type="text" name="zip_code" id="zip_code" class="form-control" value="{{ old('zip_code', $client->zip_code) }}">
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Código Cidade') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_city-input" name="city_id" readonly>  
                                            <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_city_form"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Cidade') }}</label>
                                        <input class="form-control" id="name-city-input" readonly>
                                    </div>
                                </div>
                                <div class="form-row @if ($client->type === 'responsavel') d-none @endif">
                                    <div class="col-xl-4 mb-3">
                                        <label for="address">Endereço:</label>
                                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $client->address) }}">
                                    </div>
                                    
                                    <div class="col-xl-2 mb-3">
                                        <label for="number">Número:</label>
                                        <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $client->number) }}">
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <label for="district">Bairro:</label>
                                        <input type="text" name="district" id="district" class="form-control" value="{{ old('district', $client->district) }}">
                                    </div>
                                    
                                    <div class="col-xl-3 mb-3">
                                        <label for="complements">Complemento:</label>
                                        <input type="text" name="complements" id="complements" class="form-control" value="{{ old('complements', $client->complements) }}">
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="@if ($client->type === 'responsavel') d-none @endif">
                                    <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                        <h3 class="card-title">Responsavéis </h3>
                                    </div>
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="col-xl-3 col-md-3">
                                            <label>{{ __('Nome') }}</label>
                                            <input type="text" id="id_name" class="form-control">
                                        </div>
                                        <div class="col-xl-2 col-md-3">
                                            <label>{{ __('Celular') }}</label>
                                                <input type="text" id="id_phone" class="form-control">
                                        </div>
                                        <div class="col-xl-3 col-md-3">
                                            <label>{{ __('Grau de Parentesco') }}</label>
                                            <input type="text" id="id_family" class="form-control">
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label for="type">{{ __('Responsável Financeiro') }}</label>
                                            <select class="form-select form-control" name="financial_guardian" id="id_financial_guardian">
                                                <option value="0"{{ old('type') === '0' ? ' selected' : '' }}>Não</option>
                                                <option value="1"{{ old('type') === '1' ? ' selected' : '' }}>Sim</option>
                                            </select>
                                        </div>
                                    </div>

                                        <div class="col-xl-1">
                                            <button class="btn btn-primary col-sm-12 col-md-12" type="button"
                                                value="Salvar" id="btnSalvar" style="margin-top: 28px;">Add</button>
                                        </div>
                                    </div>
                                    <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                        <h3 class="card-title">Listagem Responsavéis</h3>
                                    </div>
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="table-responsive">
                                            <table class="table border text-nowrap text-md-nowrap table-bordered mb-0"
                                                id="tblDados">
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Celular</th>
                                                        <th>Parentesco</th>
                                                        <th>Res. Financeiro</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
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
                    var name = $('#id_name').val();
                    var phone = $('#id_phone').val();
                    var family = $('#id_family').val();
                    var financial_guardian = $('#id_financial_guardian').val();

                    // Verificar se todos os campos estão preenchidos
                    if (name && phone && family && financial_guardian) {
                        // Adicionar um objeto com as informações na tabela
                        var rowCount = tabelaItens.length + 1;

                        tabelaItens.push({
                            name: name,
                            phone: phone,
                            family: family,
                            financial_guardian: financial_guardian
                        });

                        // Limpar os valores dos inputs
                        $('#id_name').val('');
                        $('#id_phone').val('');
                        $('#id_family').val('');
                        $('#id_financial_guardian').val('');

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
                                        <td>${item.name}</td>
                                        <td>${item.phone}</td>
                                        <td>${item.family}</td>
                                        <td>${item.financial_guardian == 1 ? 'Sim' : 'Não'}</td>
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
                        var name = $(tr).find('td:eq(1)').text();
                        var phone = $(tr).find('td:eq(2)').text();
                        var family = $(tr).find('td:eq(3)').text();
                        var financial_guardian = $(tr).find('td:eq(4)').text() == 'Sim' ? '1': '0';
                        data.push({
                            qnt: qnt,
                            name: name,
                            phone: phone,
                            financial_guardian: financial_guardian,
                            family: family
                        });
                    });

                    const inputResponsaveis = document.createElement('input');
                    inputResponsaveis.type = 'hidden';
                    inputResponsaveis.name = 'responsaveis';
                    inputResponsaveis.value = JSON.stringify(data);
                    document.querySelector('#form-clients').appendChild(inputResponsaveis);
                });
            });
        </script>
@endsection