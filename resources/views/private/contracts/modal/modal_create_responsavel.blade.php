<div class="modal fade" id="modal_create_responsavel">
    <div class="modal-dialog modal-dialog-centered text-center modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Cadastrar Responsável') }}</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="responsavel-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-xl-2 mb-2">
                                <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                <input class="form-control" readonly />
                            </div>
                            <div class="col-xl-5 mb-3">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-5 mb-3">
                                <label>{{ __('Celular') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}" required autofocus>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label>{{ __('Grau de Parentesco') }}</label>
                                <input type="text" class="form-control" id="id_family" name="id_family"
                                    value="{{ old('id_family') }}" autofocus>
                                @error('id_family')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label>{{ __('CPF') }}</label>
                                <input type="text" class="form-control" id="id_cpf" name="id_cpf"
                                    value="{{ old('id_cpf') }}" required autofocus>
                                @error('id_cpf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" value="responsavel" name="type">

                            <div class="col-xl-1 col-md-3">
                                <button class="btn btn-primary" type="submit" value="Salvar"
                                    style="margin-top: 35%;">{{ __('Cadastrar') }}</button>
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

<script>
    $(document).ready(function() {
        $('#responsavel-form').submit(function(event) {
            event.preventDefault(); // Previne o envio do formulário via HTML
            var form = $(this);
            var url = "{{ route('clients.salvarResponsavelBasico') }}"
            var formData = form.serialize();
            console.log('formData', formData)
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#modal_responsavel_form').modal('show');
                },
                error: function(xhr, status, error) {
                    $('#modal_responsavel_form').modal('show');
                }
            });
            $('#modal_create_responsavel').modal('hide');
        });
    });
</script>
