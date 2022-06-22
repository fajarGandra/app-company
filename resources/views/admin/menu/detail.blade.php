<form action="{{ route('admin.menu.update', $menus->id) }}" id="form-create" method="POST">
    @csrf
    @method('put')
    <div class="col-md-12 form-group mb-3">
        <label for="picker1">Parent</label>
        <select name="parent_id" class="form-control">
            <option value="0">No Parent</option>
            @foreach ($menu as $value)
                <option value="{{ $value->id }}" {{ ($menus->parent_id == $value->id) ? 'selected':'' }}>{{ $value->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="picker1">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $menus->name }}">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="description">Description <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $menus->description }}">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="description">Permissions <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="permissions" name="permissions" value="{{ $menus->permission_name }}">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="url">URL <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="url" name="url" value="{{ $menus->url }}">
    </div>
    <div class="col-md-12 form-group mb-3">
        <label for="icon">Icon</label>
        <input type="text" class="form-control" id="icon" name="icon" value="{{ $menus->icon }}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-update"><i class="fas fa-spinner fa-spin spinner-btn"></i>
            Update</button>
    </div>
</form>
