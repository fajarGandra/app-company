@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => 'admin.index',
            'name' => 'Dashboard',
        ],
        [
            'route' => 'admin.users.index',
            'name' => 'Users',
        ],
        [
            'route' => '',
            'name' => 'Users Roles',
        ],
    ]" :title="'Users Roles'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Roles</h5>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" readonly="" value="{{ isset($admins->id) ? $admins->name : '' }}">
                                <x-form.error field='name' name="name"></x-form.error>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" readonly="" value="{{ isset($admins->id) ? $admins->email : '' }}">
                                <x-form.error field='email' name="email"></x-form.error>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @if (isset($admins->roles))
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Assign Roles</h5>
                            <form action="{{ route('admin.users.assign-roles', $admins->id) }}" method="post">
                                @csrf
                                <div class="row mb-12">
                                    <legend class="col-form-label col-sm-2 pt-0">Roles</legend>
                                    <div class="d-inline-flex justify-end">
                                        <div class="col-sm-8">
                                            <select class="form-select" name="roles">
                                                @foreach ($role as $roles)
                                                    <option value="{{ $roles->name }}">{{ $roles->name }}</option>
                                                @endforeach
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
                                            <th scope="col">Roles Name</th>
                                            <th scope="col">Permissions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($admins->roles as $val)
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
                                                    @foreach($val->permissions as $pemiss)
                                                        <span class="badge bg-primary"> {{ $pemiss->name }} </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="d-inline-flex justify-end">
                                                        <form
                                                            action="{{ route('admin.users.delete-roles', [$admins->id, $val->id]) }}"
                                                            method="post">
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
        @endif
    </section>
@endsection
