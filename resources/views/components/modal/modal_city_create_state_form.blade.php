@include('components.modal.modal_city_country_form')
@include('components.modal.modal_create_country_form')


<div class="modal fade" id="modal_city_create_state_form">
    <div class="modal-dialog modal-dialog-centered text-center modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Cadastrar Estado') }}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="state-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-xl-2 mb-2">
                                <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                <input class="form-control" readonly />
                            </div>
                            <div class="col-xl-4 mb-3">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required autofocus >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div> 
                                @enderror
                            </div>
                            <div class="col-xl-2 mb-3">
                                <label>{{ __('Sigla') }}</label>
                                <input type="text" class="form-control" id="acronym" name="acronym" value="{{old('acronym')}}" required >
                                @error('acronym')
                                    <div class="invalid-feedback">{{ $message }}</div> 
                                @enderror
                            </div>
                            <div class="col-xl-2 mb-3">
                                <label>{{ __('Slug') }}</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}" required >
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-3 col-md-3">
                                <label>{{ __('Código País') }}</label>
                                <div class="input-group"> 
                                    <input class="form-control" id="cod_country-input" name="country_id" readonly>  
                                    <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_country_form"> <i class="fa fa-search"></i> </button>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <label>{{ __('País') }}</label>
                                <input class="form-control" id="name-country-input" readonly>
                            </div>
                        </div>
                        <div class="form-row justify-content-end">
                            <div class="col-xl-1 col-md-3">
                                <button class="btn btn-primary" type="submit" value="Salvar" style="margin-top: 35%;">{{ __('Cadastrar') }}</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script> 
$(document).ready(function () {
    $('#state-form').submit(function (event) {
        event.preventDefault(); // Previne o envio do formulário via HTML
        var form = $(this);
        var url = "{{ route('states.store') }}"
        var formData = form.serialize();
        console.log('formData',formData)
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#modal_state_form').modal('show');
            },
            error: function (xhr, status, error) {
                $('#modal_state_form').modal('show');
           }
        });
        $('#modal_create_state_form').modal('hide');
    });
});
    
</script>