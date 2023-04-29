@extends('layouts.app')


@section('content')

@include('private.calendar.modal.modal')

<link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.10.2/main.min.css' rel='stylesheet'/>


<script>

        var SITEURL = "{{ url('/') }}";

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                nowIndicator: true,
                editable: true,
                selectable: true,
                navLinks: true,
                timeZone: 'America/Sao_Paulo',
                locale: 'pt-br',
                initialView: 'resourceTimeGridDay',
                eventColor: 'gray',
                resources: [
                    {id: 'a', title: 'Quadra'},
                    // {id: 'b', title: 'Room B'}
                ],
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'resourceTimeGridDay,resourceTimeGridWeek,dayGridMonth'
                },
                events: "{{ route('calendar.getevents') }}",
                dateClick: function (info) {
                    var start = moment(info.dateStr).format('YYYY-MM-DD\THH:mm');
                    var end = moment(info.dateStr).add(60, 'minutes').format('YYYY-MM-DD\THH:mm');

                    document.getElementById('create-start').value = start;
                    document.getElementById('create-end').value = end;

                    var myModal = new bootstrap.Modal(document.getElementById('modal-create'))
                    myModal.show()
                },
                eventClick: function (info) {
                    let id_event = info.event._def['publicId'];
                    let _token = document.getElementsByName("_token")[0].value;
                    document.getElementById('id').value = id_event;

                    $.ajax({
                        method: "get",
                        url: SITEURL + '/calendar/' + id_event + '/edit',
                        data: {
                            _token: _token
                        },
                        success: function (response) {
                            document.getElementById('update-title').value = response.data.title;
                            document.getElementById('update-description').value = response.data.description;
                            document.getElementById('update-start').value = response.data.start;
                            document.getElementById('update-end').value = response.data.end;
                            document.getElementById('update-color').value = response.data.color;
                            document.getElementById('update-resource').value = response.data.resourceId;
                            document.getElementById('update-status').value = response.data.status;

                            var myModal = new bootstrap.Modal(document.getElementById('modal-update'))
                            myModal.show()
                        }
                    });
                },
                eventDrop: function (info) {
                    if (!confirm("Você solicitou a alteração: " + info.event.title +
                        "\nO evento será alterado para a data: " + moment(info.event.startStr).format(
                            'DD-MM-YYYY HH:mm:ss')))
                    {
                        info.revert();
                    } else {
                        console.log(info)
                        let id_event = info.event._def['publicId'];
                        let _token = document.getElementsByName("_token")[0].value;
                        let start = moment(info.event.startStr).format('YYYY-MM-DD\THH:mm');
                        let end = moment(info.event.endStr).format('YYYY-MM-DD\THH:mm');
                        let resource = info.event._def.resourceIds[0];
                        $.ajax({
                            url: "{{route('calendar.dropevents')}}",
                            method: "post",
                            data: {
                                id: id_event,
                                resourceId:resource,
                                start: start,
                                end: end,
                                _token: _token
                            },
                            success: function (result) {
                               alert('deu bom');
                            }
                        });
                    }
                },
                eventResize: function (info) {
                    let id_event = info.event._def['publicId'];
                    let _token = document.getElementsByName("_token")[0].value;
                    let end = moment(info.event.endStr).format('YYYY-MM-DD\THH:mm');

                    $.ajax({
                        url: "{{route('calendar.resizeevents')}}",
                        method: "post",
                        data: {
                            id: id_event,
                            end: end,
                            _token: _token
                        },
                        success: function (result) {
                            alert("atualização ok");
                        }
                    });
                },
            });
            calendar.render();
        });

    </script>


<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Calendario') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Calendario') }}</li>
            </ol>
        </div>
    </div>

    <!-- ROW OPEN -->
    <div class="row row-cards">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Calendario') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <div id='calendar'></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Full Calendar v5 --}}
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.10.2/main.min.js'></script>

{{-- Moment JS--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection