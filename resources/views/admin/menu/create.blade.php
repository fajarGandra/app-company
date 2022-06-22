<form action="{{ route('admin.menu.store') }}" id="form-create" method="POST">
    @csrf
    <div class="col-md-12 form-group mb-3">
        <label for="picker1">Parent</label>
        <select name="parent_id" class="form-control">
            <option value="0">No Parent</option>
            @foreach ($menu as $menus)
                <option value="{{ $menus->id }}" {{ ($parent == $menus->id) ? 'selected':'' }}>{{ $menus->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="picker1">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="description">Description <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="description">Permissions <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="permissions" name="permissions">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="url">URL <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="url" name="url">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="icon">Icon</label>
        <input type="text" class="form-control" id="icon" name="icon">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save"><i class="fas fa-spinner fa-spin spinner-btn"></i>
            Save</button>
    </div>
</form>
