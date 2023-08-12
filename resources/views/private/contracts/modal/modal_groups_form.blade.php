<div class="modal fade" id="modal_groups_form">
    <div class="modal-dialog modal-dialog-centered text-center modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Selecione a Turma') }}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="GET">
                        <div class="row"> 
                            <div class="col-9 col-md-9" style="text-align: left;margin-bottom: 17px;">
                                <input type="text" name="search" class="form-control" placeholder="Procurar..." aria-label="Search" aria-describedby="button-addon2"  id="search-input">
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-bordered mb-0" id="tableFormaPagamento">
                            <thead>
                                <th>{{ __('Turma') }}</th> 
                                <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Selecionar') }}</th>
                            </thead>
                            <tbody id="modal-body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Salvar</button> <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script> 

$(document).ready(function() {
    $('#modal_groups_form').on('show.bs.modal', function(e) {
    var modal = $(this);
    var url = "{{ route('groups.busca') }}"

    // Fazer a primeira chamada sem nenhum valor no input
    $.ajax({
        url: url,
        success: function(response) {
            var tbody = modal.find('#modal-body');
            tbody.empty();
            response.data.forEach(function(groups) {
                tbody.append(`<tr>
                                <td>${groups.name}</td>
                                <td>
                                <button type="button" class="btn btn-primary select-btn-modal-groups-form" data-value="${groups.id}" data-name="${groups.name}" data-toggle="modal" data-target="#modal" >
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
                response.data.forEach(function(groups) {
                    tbody.append(`<tr>
                                    <td>${groups.name}</td>
                                    <td>
                                     <button type="button" class="btn btn-primary select-btn-modal-groups-form" data-value="${groups.id}" data-name="${groups.name}" data-toggle="modal" data-target="#modal" >
                                            Selecionar
                                        </button>
                                        </td>
                                </tr>`);
                });
            }
        });
    });


    $(document).on('click', '.select-btn-modal-groups-form', function() {
        var groupsId = $(this).data('value');
        var groupsName = $(this).data('name');
        
        
        $('#cod_groups-input').val(groupsId);
        $('#name-groups-input').val(groupsName);

        $('#modal_groups_form').modal('hide');
        $('#modal_create_state').modal('show');
    });

});
});
    
</script>