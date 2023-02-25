<div class="card-body">
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
                <th>{{ __('Forma de Pagamento') }}</th>
                <th>{{ __('Data de Criação') }}</th>
                <th>{{ __('Data de Alteração') }}</th>
                <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <div class="card-footer">
    </div>
</div>