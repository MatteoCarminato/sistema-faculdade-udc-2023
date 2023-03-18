{{-- Modal --}}
@include('components.modal.modal_city_create_state_form')
{{-- Modal --}}

<div class="modal fade" id="modal_state_form">
    <div class="modal-dialog modal-dialog-centered text-center modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Selecione o Estado') }}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="card-body">

            <form method="GET">
                <div class="row"> 
                    <div class="col-9 col-md-9" style="text-align: left;margin-bottom: 17px;">
                        <input type="text" name="search" class="form-control" placeholder="Procurar..." aria-label="Search" aria-describedby="button-addon2"  id="search-input">
                    </div>
                    <div class="col-3 col-md-3">
                    <button class="modal-effect input-group-text" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modal_city_create_state_form"> Cadastrar </button>
                    </div>
                </div>
            </form>

                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0" id="tableFormaPagamento">
                        <thead>
                            <th>{{ __('Estado') }}</th> 
                            <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Selecionar') }}</th>
                        </thead>
                        <tbody id="modal-body">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                </div>
        
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Salvar</button> <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script> 

$(document).ready(function() {
    $('#modal_state_form').on('show.bs.modal', function(e) {
    var modal = $(this);
    var url = "{{ route('states.busca') }}"

    // Fazer a primeira chamada sem nenhum valor no input
    $.ajax({
        url: url,
        success: function(response) {
            var tbody = modal.find('#modal-body');
            tbody.empty();
            response.data.forEach(function(states) {
                tbody.append(`<tr>
                                <td>${states.name}</td>
                                <td>
                                <button type="button" class="btn btn-primary select-btn" data-value="${states.id}" data-name="${states.name}" data-bs-dismiss="modal" >
                                            Selecionar
                                        </button>
                                        </td>
                            </tr>`);
            });
        }
    });

    // Quando o valor do input mudar, atualizar a tabela
    $('#search-input').on('input', function() {
        $.ajax({
            url: url,
            data: {
                search: $('#search-input').val()
            },
             success: function(response) {     
                var tbody = modal.find('#modal-body');
                tbody.empty();
                response.data.forEach(function(states) {
                    tbody.append(`<tr>
                                    <td>${states.name}</td>
                                    <td>
                                     <button type="button" class="btn btn-primary select-btn" data-value="${states.id}" data-name="${states.name}" data-bs-dismiss="modal" >
                                            Selecionar
                                        </button>
                                        </td>
                                </tr>`);
                });
            }
        });
    });


    $(document).on('click', '.select-btn', function() {
        var stateId = $(this).data('value');
        var stateName = $(this).data('name');
        
        
        $('#cod_state-input').val(stateId);
        $('#name-state-input').val(stateName);

        $('#modal_city_create_state_form').modal('hide');
    });

});
});
    
</script>