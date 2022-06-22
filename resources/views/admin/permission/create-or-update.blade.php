@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => 'admin.index',
            'name' => 'Dashboard',
        ],
        [
            'route' => 'admin.permissions.index',
            'name' => 'Permissions',
        ],
        [
            'route' => '',
            'name' => 'Add Permissions',
        ],
    ]" :title="'Add Permissions'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Permissions Menu</h5>
                        <form
                            action="{{ isset($permission) ? route('admin.permissions.update', $permission->id) : route('admin.permissions.store') }}"
                            method="post">
                            @isset($permission->id)
                                @method('PUT')
                            @endisset
                            @csrf
                            {{-- <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Permission Menu</label>
                                <div class="col-sm-6">
                                    <select class="form-select" name="parent_menu">
                                        <option value="0">No Parent</option>
                                        @foreach ($permissionMenu as $val)
                                            <option value="{{ $val->id }}" {{ ($permission->parent_menu === $val->id) ? 'selected':'' }}>{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ isset($permission->id) ? $permission->name : '' }}">
                                    <x-form.error field='name' name="name"></x-form.error>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($permission) ? 'Update' : 'Simpan' }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Assign Permission: <i>{{ $permission->name }}</i></h5>
                        <form action="{{ route('admin.permissions.menu', $permission->id) }}" method="post">
                            @csrf
                            <div class="row mb-12">
                                <legend class="col-form-label col-sm-2 pt-0">Action</legend>
                                <div class="d-inline-flex justify-end">
                                    <div class="col-sm-8">
                                        <select class="form-select" name="permission">
                                            <option value="View {{ $permission->name }}">View</option>
                                            <option value="Store {{ $permission->name }}">Store</option>
                                            <option value="Edit {{ $permission->name }}">Edit</option>
                                            <option value="Delete {{ $permission->name }}">Delete</option>
                                            <option value="Approved {{ $permission->name }}">Approved</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <button type="submit" class="btn btn-primary">Assign</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="1px">#</th>
                                        <th scope="col">Permission Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($permissionMenu[0]->childs as $val)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>
                                                <input class="form-check-input" type="checkbox" id="gridCheck"
                                                    checked="">
                                                <label class="form-check-label" for="gridCheck">
                                                    <span class="badge bg-success"> {{ $val->name }} </span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="d-inline-flex justify-end">
                                                    <form action="{{ route('admin.permissions.remove-permission', $val->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm m-2">
                                                            <i class="bi bi-trash me-1"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
