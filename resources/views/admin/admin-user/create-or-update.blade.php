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
            'name' => ''.$title.' Users',
        ],
    ]" :title="$title.' Users'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title }} Users</h5>
                        <form action="{{ isset($users) ? route('admin.users.update', $users->id) : route('admin.users.store') }}" method="post">
                            @isset($users->id)
                                @method('PUT')
                            @endisset
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ isset($users->id) ? $users->name : '' }}">
                                    <x-form.error field='name' name="name"></x-form.error>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ isset($users->id) ? $users->email : '' }}">
                                    <x-form.error field='email' name="email"></x-form.error>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password">
                                    <x-form.error field='password' name="password"></x-form.error>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Password Confirmation</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation">
                                    <x-form.error field='password_confirmation' name="password_confirmation"></x-form.error>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($users) ? 'Update' : 'Simpan' }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
