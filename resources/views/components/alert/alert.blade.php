@if (session('success'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success mb-2" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i>{{ session('success') }}
            </div>
        </div>
    </div>
    @elseif (session('warning'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger mb-2" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-frown-o me-2" aria-hidden="true"></i>{{ session('warning') }}
            </div>
        </div>
    </div>
@endif