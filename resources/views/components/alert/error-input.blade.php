@if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-frown-o me-2" aria-hidden="true"></i>:message</div>')) !!}
@endif

