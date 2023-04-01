@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">{{ __('Categoria') }}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Categoria') }}</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW OPEN -->
<div class="row row-cards">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('Listagem Categoria') }}</h3>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">{{ __('Cadastrar') }}</a>
            </div>
            <div class="card-body">
            {{-- Alert Messages --}}
                @include('components.alert.alert')
            {{-- Alert Messages --}}

            <form method="GET" class="mb-5">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                           placeholder="Procurar..." aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2">{{ __('Filtrar') }}</button>
                </div>
            </form>

                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0" id="tableFormaPagamento">
                        <thead>
                            <th>{{ __('Categoria') }}</th>
                            <th class="text-right sorting_asc_disabled sorting_desc_disabled" style="width: 120px;">{{ __('Ações') }}</th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="td-actions text-right">
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-primary" href="{{ route('categories.show', $category->id) }}" data-original-title="" title="">
                                            <i class="material-icons">Ver</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('categories.edit', $category->id) }}" data-original-title="" title="">
                                            <i class="material-icons">Editar</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Voce tem certeza que deseja excluir?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">Apagar</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection