@extends('layouts.app')

@section('content')

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

<!-- ROW OPEN -->
<div class="row row-cards">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Cadastrar Condição de Pagamento') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-xl-2 mb-2">
                                    <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                    <input class="form-control" readonly />
                                </div>
                                <div class="col-xl-7 mb-3">
                                    <label>{{ __('Condição de Pagamento') }}</label>
                                    <input type="text" class="form-control" id="condicao_pagamento" name="condicao_pagamento" value="{{old('condicao_pagamento')}}" required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label>{{ __('Multa (sob. valor)') }}</label>
                                    <input  type="number" name="multa" id="input-multa" value="{{old('multa')}}" class="form-control" id="input-multa" required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label>{{ __('Juros (a.m.)') }}</label>
                                    <input type="number" class="form-control" name="multa" id="input-multa" value="{{old('multa')}}"required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label>{{ __('Desconto (sob. valor)') }}</label>
                                    <input type="number" class="form-control" name="desconto" id="input-desconto" value="{{old('desconto')}}"  required>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div> 
                            <hr>
                            <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                <h3 class="card-title">Parcelas</h3>
                            </div>
                            <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                <form id="frmCadastro" class="form-horizontal">
                                    <div class="col-xl-2 col-md-3">
                                        <label>{{ __('Numero de Dias') }}</label>
                                        <input type="numeric" id="id_dias" class="form-control" required>
                                    </div>
                                    <div class="col-xl-2 col-md-3">
                                        <label>{{ __('Porcentual') }}</label>
                                        <div class="input-group"> 
                                            <input type="numeric" id="id_porcentual"  class="form-control" required>
                                            <button class="input-group-text"> % </button> 
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <label>{{ __('Código de Pagamento') }}</label>
                                        <div class="input-group"> 
                                            <input class="form-control" id="forma_pagamento-input"> 
                                            <button class="input-group-text"> 
                                                <i class="fa fa-search"></i> 
                                            </button> 
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <label>{{ __('Forma de Pagamento') }}</label>
                                        <input type="number" class="form-control" id="forma_pagamento-input" readonly>
                                    </div>
                                    <div class="col-xl-1 col-md-3">
                                        <button class="btn btn-primary" type="button" value="Salvar" onclick="changeBtnToCreate()" id="btnSalvar" style="margin-top: 42%;">Add</button>
                                    </div>
                                </form>
                                <table class="table table-bordered table-hover" id="condicao-table"></table>
                            </div>
                            <div class="card-header" style="padding: 1rem; margin-left: -27px;">
                                <h3 class="card-title">Listagem Parcelas</h3>
                            </div>
                            <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="table-responsive">
                                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Salary</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Joan Powell</td>
                                                        <td>Associate Developer</td>
                                                        <td>$450,870</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Gavin Gibson</td>
                                                        <td>Account manager</td>
                                                        <td>$230,540</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Julian Kerr</td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>$55,300</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Cedric Kelly</td>
                                                        <td>Accountant</td>
                                                        <td>$234,100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Samantha May</td>
                                                        <td>Junior Technical Author</td>
                                                        <td>$43,198</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
</div>  
                            <button class="btn btn-primary" type="submit">{{ __('Salvar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ROW CLOSED -->
</div>
@endsection