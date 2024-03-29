@extends('layouts.app')

@section('content')
    <!-- MODAL - LISTAR CIDADES -->
    @include('private.clients.modal.modal_city_form')


    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Alunos') }}</h1>
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
                        <h3 class="card-title">{{ __('Cadastrar Alunos') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body">
                                <form method="POST" action="{{ route('clients.store') }}" id="form-clients">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-xl-2 mb-2">
                                            <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                            <input class="form-control" readonly />
                                        </div>
                                        <div class="col-xl-5 mb-3">
                                            <label>{{ __('Nome') }} <font color="red">*</font></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-5 mb-3">
                                            <label>{{ __('Apelido') }} <font color="red">*</font></label>
                                            <input type="text" class="form-control" id="nickname" name="nickname"
                                                value="{{ old('nickname') }}" required autofocus>
                                            @error('nickname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('Data de Nascimento') }}</label>
                                            <input type="date" class="form-control" id="birth_date" name="birth_date"
                                                value="{{ old('birth_date') }}" autofocus>
                                            @error('birth_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label for="sex">Sexo:</label>
                                                <select class="form-select form-control" name="sex" id="sex">
                                                    <option
                                                        value="masculino"{{ old('sex') === 'masculino' ? ' selected' : '' }}>
                                                        Masculino</option>
                                                    <option
                                                        value="feminino"{{ old('sex') === 'feminino' ? ' selected' : '' }}>
                                                        Feminino</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('RG') }}</label>
                                            <input type="text" class="form-control" id="rg" name="rg"
                                                value="{{ old('rg') }}" data-inputmask="'mask': '99.999.999-9'">
                                            @error('rg')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('CPF') }}</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" onblur="validarCPF(this.value)"
                                                value="{{ old('cpf') }}"  data-inputmask="'mask': '999.999.999-99'" autofocus>
                                            <span id="cpf-validation-message"></span>
                                                @error('cpf')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('Telefone') }}</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ old('phone') }}" autofocus data-inputmask="'mask': '(99) 9 9999-9999'">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('Telefone Residencial') }}</label>
                                            <input type="text" class="form-control" id="phone_home" name="phone_home"
                                                value="{{ old('phone_home') }}" autofocus data-inputmask="'mask': '(99) 9999-9999'">
                                            @error('phone_home')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('Email') }}</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}" autofocus>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label for="type">Tipo:</label>
                                                <select class="form-select form-control" name="type" id="type">
                                                    <option value="aluno"{{ old('type') === 'aluno' ? ' selected' : '' }}>
                                                        Aluno</option>
                                                    <option
                                                        value="responsavel"{{ old('type') === 'responsavel' ? ' selected' : '' }}>
                                                        Responsável</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label for="blood_types">Tipo Sanguíneo:</label>
                                                <select class="form-select form-control" name="blood_types"
                                                    id="blood_types">
                                                    <option value="">Selecione</option>
                                                    <option
                                                        value="a+"{{ old('blood_types') === 'a+' ? ' selected' : '' }}>
                                                        A+</option>
                                                    <option
                                                        value="b+"{{ old('blood_types') === 'b+' ? ' selected' : '' }}>
                                                        B+</option>
                                                    <option
                                                        value="o+"{{ old('blood_types') === 'o+' ? ' selected' : '' }}>
                                                        O+</option>
                                                    <option
                                                        value="ab+"{{ old('blood_types') === 'ab+' ? ' selected' : '' }}>
                                                        AB+</option>
                                                    <option
                                                        value="a-"{{ old('blood_types') === 'a-' ? ' selected' : '' }}>
                                                        A-</option>
                                                    <option
                                                        value="b-"{{ old('blood_types') === 'b-' ? ' selected' : '' }}>
                                                        B-</option>
                                                    <option
                                                        value="o-"{{ old('blood_types') === 'o-' ? ' selected' : '' }}>
                                                        O-</option>
                                                    <option
                                                        value="ab-"{{ old('blood_types') === 'ab-' ? ' selected' : '' }}>
                                                        AB-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label for="height">Altura (cm):</label>
                                                <input type="text" class="form-control" name="height" id="height"
                                                    value="{{ old('height') }}" placeholder="Ex: 175">
                                            </div>
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label for="weight">Peso (kg):</label>
                                                <input type="text" class="form-control" name="weight" id="weight"
                                                    value="{{ old('weight') }}" placeholder="Ex: 70">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 mb-3">
                                            <label for="school">Escola:</label>
                                            <input type="text" name="school" id="school" class="form-control"
                                                value="{{ old('school') }}">
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="shift">Turno:</label>
                                            <select name="shift" id="shift" class="form-control">
                                                <option value="">Selecione um turno</option>
                                                <option value="manha" {{ old('shift') == 'manha' ? 'selected' : '' }}>
                                                    Manhã</option>
                                                <option value="tarde" {{ old('shift') == 'tarde' ? 'selected' : '' }}>
                                                    Tarde</option>
                                                <option value="noite" {{ old('shift') == 'noite' ? 'selected' : '' }}>
                                                    Noite</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 mb-3">
                                            <label for="zip_code">CEP:</label>
                                            <input type="text" name="zip_code" id="zip_code" class="form-control"
                                                value="{{ old('zip_code') }}" data-inputmask="'mask': '99999-999'">
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('Código Cidade') }}</label>
                                            <div class="input-group">
                                                <input class="form-control" id="cod_city-input" name="city_id" readonly>
                                                <button class="modal-effect input-group-text"
                                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                    href="#modal_city_form"> <i class="fa fa-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label>{{ __('Cidade') }}</label>
                                            <input class="form-control" id="name-city-input" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-4 mb-3">
                                            <label for="address">Endereço:</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ old('address') }}">
                                        </div>

                                        <div class="col-xl-2 mb-3">
                                            <label for="number">Número:</label>
                                            <input type="text" name="number" id="number" class="form-control"
                                                value="{{ old('number') }}">
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label for="district">Bairro:</label>
                                            <input type="text" name="district" id="district" class="form-control"
                                                value="{{ old('district') }}">
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label for="complements">Complemento:</label>
                                            <input type="text" name="complements" id="complements"
                                                class="form-control" value="{{ old('complements') }}">
                                        </div>

                                    </div>
                                    <hr>
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
                                                <label for="type">{{ __('CPF') }}</label>
                                                <input type="text" id="id_cpf" class="form-control">
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
                                                        <th>Documento</th>
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
            // Array que irá guardar as informações da tabela
            var tabelaItens = [];

            // Quando clicar no botão "Add"
            $('#btnSalvar').on('click', function() {
                console.log("clickei")
                // Obter os valores dos inputs
                var name = $('#id_name').val();
                var phone = $('#id_phone').val();
                var family = $('#id_family').val();
                var cpf = $('#id_cpf').val();

                // Verificar se todos os campos estão preenchidos
                if (name && phone && family && cpf) {
                    // Adicionar um objeto com as informações na tabela
                    var rowCount = tabelaItens.length + 1;

                    tabelaItens.push({
                        name: name,
                        phone: phone,
                        family: family,
                        cpf: cpf
                    });

                    // Limpar os valores dos inputs
                    $('#id_name').val('');
                    $('#id_phone').val('');
                    $('#id_family').val('');
                    $('#id_cpf').val('');

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
                                        <td>${item.cpf}</td>
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
                    var cpf = $(tr).find('td:eq(4)').text();
                    data.push({
                        qnt: qnt,
                        name: name,
                        phone: phone,
                        cpf: cpf,
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function() {
        Inputmask().mask(document.querySelectorAll("[data-inputmask]"));
    });
</script>

<script>
    function validarCPF(cpf) {
        // Remover caracteres especiais do CPF
        cpf = cpf.replace(/[^\d]+/g, '');
        
        // Verificar se o CPF possui 11 dígitos
        if (cpf.length !== 11) {
            document.getElementById('cpf-validation-message').textContent = 'CPF inválido';
            alert('CPF inválido');
            return;
        }
        
        // Validar o CPF usando o algoritmo de validação
        let sum = 0;
        let remainder;
        
        for (let i = 1; i <= 9; i++) {
            sum += parseInt(cpf.substring(i-1, i)) * (11 - i);
        }
        
        remainder = (sum * 10) % 11;
        
        if ((remainder === 10) || (remainder === 11)) {
            remainder = 0;
        }
        
        if (remainder !== parseInt(cpf.substring(9, 10))) {
            document.getElementById('cpf-validation-message').textContent = 'CPF inválido';
            alert('CPF inválido');
            return;
        }
        
        sum = 0;
        for (let i = 1; i <= 10; i++) {
            sum += parseInt(cpf.substring(i-1, i)) * (12 - i);
        }
        
        remainder = (sum * 10) % 11;
        
        if ((remainder === 10) || (remainder === 11)) {
            remainder = 0;
        }
        
        if (remainder !== parseInt(cpf.substring(10, 11))) {
            document.getElementById('cpf-validation-message').textContent = 'CPF inválido';
            alert('CPF inválido');
            return;
        }
        
        // CPF válido
        document.getElementById('cpf-validation-message').textContent = 'CPF válido';
    }
</script>


<script>
    // Função para buscar o CEP e preencher os campos
    function buscarCep() {
        var cep = $('#zip_code').val().replace(/\D/g, '');

        if (cep.length !== 8) {
            alert('CEP inválido');
            return;
        }

        // Requisição ao ViaCEP
        $.ajax({
            url: 'https://api.postmon.com.br/v1/cep/' + cep,
            type: 'GET',
            success: function(endereco) {
                console.log(endereco)
                // Preenchimento dos campos
                $('#cidade').val(endereco.localidade);
                $('#estado').val(endereco.uf);
                $('#address').val(endereco.logradouro);
                $('#district').val(endereco.bairro);
            },
            error: function() {
                alert('Erro ao buscar o CEP');
            }
        });
    }

    $('#zip_code').blur(function() {
        buscarCep();
    });
</script>


@endsection
