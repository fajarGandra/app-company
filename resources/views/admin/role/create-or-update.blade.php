@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => 'admin.index',
            'name' => 'Dashboard',
        ],
        [
            'route' => 'admin.roles.index',
            'name' => 'Role',
        ],
        [
            'route' => '',
            'name' => 'Add Role',
        ],
    ]" :title="'Add Role'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Roles</h5>
                        <form
                            action="{{ isset($role) ? route('admin.roles.update', $role->id) : route('admin.roles.store') }}"
                            method="post">
                            @isset($role->id)
                                @method('PUT')
                            @endisset
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ isset($role->id) ? $role->name : '' }}">
                                    <x-form.error field='name' name="name"></x-form.error>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($role) ? 'Update' : 'Simpan' }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        @if (isset($role->id))
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Assign Permissions</h5>
                            <hr>
                            <div class="col-md-12">
                                <form action="{{ route('admin.roles.permission.store', $role->id) }}" method="post">
                                    @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="1px">#</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Sub Menu</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($list as $val)
                                                <tr>
                                                    <th scope="row">{{ $no++ }}</th>
                                                    <td>
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck-{{ $val->id }}" name="permission[]" value="{{ $val->name }}" {{ ($val->flag === 1)? 'checked':'' }}>
                                                        <label class="form-check-label" for="gridCheck-{{ $val->id }}">
                                                            {{ $val->name }}
                                                        </label>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                    @if (isset($val->childs_parent))
                                                        @foreach ($val->childs_parent as $child_parent)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="gridCheck{{ $child_parent->id }}" name="permission[]" value="{{ $child_parent->name }}" {{ ($role->hasPermissionTo($child_parent->name)) ? 'checked':'' }}>
                                                                <label class="form-check-label" for="gridCheck{{ $child_parent->id }}">
                                                                    {{ $child_parent->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    </td>
                                                </tr>
                                                @if (isset($val->subMenu))
                                                    @foreach ($val->subMenu as $sub)
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="gridCheck{{ $sub->id }}" name="permission[]" value="{{ $sub->name }}" {{ ($role->hasPermissionTo($sub->name)) ? 'checked':'' }}>
                                                                    <label class="form-check-label" for="gridCheck{{ $sub->id }}">
                                                                        {{ $sub->name }}
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            @if (isset($sub->childs))
                                                                @foreach ($sub->childs as $child)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck{{ $child->id }}" name="permission[]" value="{{ $child->name }}" {{ ($role->hasPermissionTo($child->name)) ? 'checked':'' }}>
                                                                        <label class="form-check-label" for="gridCheck{{ $child->id }}">
                                                                            {{ $child->name }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-sm-2 text-center">
                                        <button type="submit" class="btn btn-primary">Assign</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </section>
@endsection
