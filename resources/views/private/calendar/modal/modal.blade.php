

{{--Modal Create--}}
<div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('calendar.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="create-title" name="title"
                               aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="create-description" name="description"
                               aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Color picker</label>
                        <input type="color" name="color" class="form-control form-control-color"
                               id="create-color" value="#563d7c"
                               title="Choose your color" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" id="create_status" name="status"
                                required>
                            <option value="1">Pending</option>
                            <option value="2">Confirmed</option>
                            <option value="3">Canceled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Resource</label>
                        <select class="form-select" aria-label="Default select example" id="create_resource"
                                name="resourceId" required>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="datetime-local">Start</label>
                        <input type="datetime-local" class="form-control" id="create-start" name="start" required>
                    </div>
                    <div class="mb-3">
                        <label for="datetime-local">End</label>
                        <input type="datetime-local" class="form-control" id="create-end" name="end" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Modal Update--}}
<div class="modal fade" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('calendar.updateevents')}}">
                @method('PUT')
                @csrf
                <input type="hidden" id="id" name="id" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="update-title" name="title"
                               aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="update-description" name="description"
                               aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Color picker</label>
                        <input type="color" name="color" class="form-control form-control-color"
                               id="update-color"
                               title="Choose your color" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" id="update-status" name="status"
                                required>
                            <option value="1">Pending</option>
                            <option value="2">Confirmed</option>
                            <option value="3">Canceled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Resource</label>
                        <select class="form-select" aria-label="Default select example" id="update-resource"
                                name="resourceId" required>
                            <option value="a">A</option>
                            <option value="b">B</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="datetime-local">Start</label>
                        <input type="datetime-local" class="form-control" id="update-start" name="start" required>
                    </div>
                    <div class="mb-3">
                        <label for="datetime-local">End</label>
                        <input type="datetime-local" class="form-control" id="update-end" name="end" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>