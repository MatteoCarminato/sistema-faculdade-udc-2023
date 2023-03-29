@extends('layouts.app')

@section('content')

<!-- MODAL - LISTAR CIDADES -->
@include('private.clients.modal.modal_city_form')
<!-- MODAL - LISTAR CIDADES -->

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
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" value="{{ $client->id }}" readonly />
                                </div>
                                <div class="col-xl-5 mb-3">
                                    <label>{{ __('Nome') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}" disabled >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-5 mb-3">
                                    <label>{{ __('Apelido') }}</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname" value="{{ old('nickname', $client->nickname) }}" disabled >
                                    @error('nickname')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('Data de Nascimento') }}</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $client->birth_date) }}" disabled >
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label for="sex">Sexo:</label>
                                        <select class="form-select form-control" name="sex" id="sex" disabled>
                                            <option value="masculino"{{ old('sex', $client->sex) === 'masculino' ? ' selected' : '' }}>Masculino</option>
                                            <option value="feminino"{{ old('sex', $client->sex) === 'feminino' ? ' selected' : '' }}>Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('RG') }}</label>
                                    <input type="tel" class="form-control" id="rg" name="rg" value="{{ old('rg', $client->rg) }}" disabled >
                                    @error('rg')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('CPF') }}</label>
                                    <input type="tel" class="form-control" id="cpf" name="cpf" value="{{ old('cpf', $client->cpf) }}" disabled >
                                    @error('cpf')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label>{{ __('Telefone') }}</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" disabled >
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                    </div>
                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Telefone Residencial') }}</label>
                                        <input type="tel" class="form-control" id="phone_home" name="phone_home" value="{{ old('phone_home', $client->phone_home) }}" disabled >
                                        @error('phone_home')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Email') }}</label>
                                        <input type="tel" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}" disabled >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label for="type">Tipo:</label>
                                            <select class="form-select form-control" name="type" id="type" disabled>
                                                <option value="aluno" @if(old('type', $client->type) === 'aluno') selected @endif>Aluno</option>
                                                <option value="responsavel"  @if(old('type', $client->type) === 'responsavel') selected @endif>Responsável</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <div class="form-group">
                                            <label for="blood_types">Tipo Sanguíneo:</label>
                                            <select class="form-select form-control" name="blood_types" id="blood_types" disabled>
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
                                        <input type="text" class="form-control" name="height" id="height" value="{{ old('height', $client->height) }}" placeholder="Ex: 175" disabled>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <div class="form-group">
                                        <label for="weight">Peso (kg):</label>
                                        <input type="text" class="form-control" name="weight" id="weight" value="{{ old('weight', $client->weight) }}" placeholder="Ex: 70" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <label for="school">Escola:</label>
                                        <input type="text" name="school" id="school" class="form-control" value="{{ old('school', $client->school) }}" disabled>
                                    </div>
                                    <div class="col-xl-3 mb-3 @if ($client->type === 'responsavel') d-none @endif">
                                        <label for="shift">Turno:</label>
                                        <select name="shift" id="shift" class="form-control" disabled>
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
                                        <input type="text" name="zip_code" id="zip_code" class="form-control" value="{{ old('zip_code', $client->zip_code) }}" disabled>
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Código Cidade') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="cod_city-input" name="city_id"  value="{{ old('city_id', $client->city_id) }}" disabled>  
                                        </div>
                                    </div>
                                    <div class="col-xl-3 mb-3">
                                        <label>{{ __('Cidade') }}</label>
                                        <input class="form-control" id="name-city-input" value="{{$client->city->name}}" disabled>
                                    </div>
                                </div>
                                <div class="form-row @if ($client->type === 'responsavel') d-none @endif">
                                    <div class="col-xl-4 mb-3">
                                        <label for="address">Endereço:</label>
                                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $client->address) }}" disabled>
                                    </div>
                                    
                                    <div class="col-xl-2 mb-3">
                                        <label for="number">Número:</label>
                                        <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $client->number) }}" disabled>
                                    </div>

                                    <div class="col-xl-3 mb-3">
                                        <label for="district">Bairro:</label>
                                        <input type="text" name="district" id="district" class="form-control" value="{{ old('district', $client->district) }}" disabled>
                                    </div>
                                    
                                    <div class="col-xl-3 mb-3">
                                        <label for="complements">Complemento:</label>
                                        <input type="text" name="complements" id="complements" class="form-control" value="{{ old('complements', $client->complements) }}" disabled>
                                    </div>
                                    
                                </div>
                                <hr>
                                
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
                                            @foreach($client->parent as $parent)
                                            @if ($parent->parent == null)
                                                @break
                                            @else
                                            <tr>
                                                <td class="d-none">{{ $parent->parent->id }}</td>
                                                <td>{{ $parent->parent->name }}</td>
                                                <td>{{ $parent->parent->phone }}</td>
                                                <td>{{ $parent->type }}</td>
                                                <td>{{ $parent->parent->financial_guardian == 1 ? 'Sim' : 'Não' }} </td>
                                            </tr>
                                            @endif
                                            @endforeach
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection