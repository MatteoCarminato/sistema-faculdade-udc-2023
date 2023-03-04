<div class="modal fade" id="modal_create_city_state_country">
    <div class="modal-dialog modal-dialog-centered text-center modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Cadastrar País') }}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="country-form">
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
                            <div class="col-xl-2 mb-3">
                                <label>{{ __('DDD') }}</label>
                                <input type="text" class="form-control" id="phone_code" name="phone_code" value="{{old('phone_code')}}" required >
                                @error('phone_code')
                                    <div class="invalid-feedback">{{ $message }}</div> 
                                @enderror
                            </div>
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
    $('#country-form').submit(function (event) {
        event.preventDefault(); // Previne o envio do formulário via HTML
        var form = $(this);
        var url = "{{ route('countries.store') }}"
        var formData = form.serialize();
        console.log('formData',formData)
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#modal_country_form').modal('show');
            },
            error: function (xhr, status, error) {
                $('#modal_country_form').modal('show');
           }
        });
        $('#modal_create_city_state_country').modal('hide');
    });
});
    
</script>