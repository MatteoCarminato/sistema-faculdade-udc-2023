<div class="modal fade" id="modal_create_clients">
    <div class="modal-dialog modal-dialog-centered text-center modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Cadastrar Aluno') }}</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="clients-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-xl-2 mb-2">
                                <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                <input class="form-control" readonly />
                            </div>
                            <input type="hidden" id="type" name="type" value="aluno" required autofocus>
                            <div class="col-xl-5 mb-4">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-5 mb-4">
                                <label>{{ __('Apelido') }}</label>
                                <input type="text" class="form-control" id="nickname" name="nickname"
                                    value="{{ old('nickname') }}" required autofocus>
                                @error('nickname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-2 mb-2">
                                <label>{{ __('RG') }}</label>
                                <input type="text" class="form-control" id="rg" name="rg"
                                    value="{{ old('rg') }}" required autofocus>
                                @error('rg')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-2 mb-2">
                                <label>{{ __('CPF') }}</label>
                                <input type="text" class="form-control" id="cpf" name="cpf"
                                    value="{{ old('cpf') }}" required autofocus>
                                @error('cpf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-2 mb-2">
                                <label>{{ __('Telefone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}" required autofocus>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label>{{ __('Data Nascimento') }}</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    value="{{ old('birth_date') }}" required autofocus>
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
        $('#clients-form').submit(function(event) {
            event.preventDefault(); // Previne o envio do formulário via HTML
            var form = $(this);
            var url = "{{ route('clients.salvarAlunoBasico') }}"
            var formData = form.serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#modal_clients_form').modal('show');
                },
                error: function(xhr, status, error) {
                    $('#modal_clients_form').modal('show');
                }
            });
            $('#modal_create_clients').modal('hide');
        });
    });
</script>
