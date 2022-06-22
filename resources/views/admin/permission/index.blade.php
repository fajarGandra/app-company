@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => '',
            'name' => 'Dashboard',
        ],
        [
            'route' => '',
            'name' => 'Permission',
        ],
    ]" :title="'Permission'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        {{-- <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary btn-sm m-2">
                            <i class="bi bi-plus me-1"></i> Tambah
                        </a> --}}
                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Sub Menu</th>
                                    <th scope="col">Permissions</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $no = 1;
                                @endphp
                                @foreach ($permission as $permissions)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $permissions->name }}</td>
                                        <td></td>
                                        <td>
                                            @foreach ($permissions->childs_parent as $child_parent)
                                            <span class="badge bg-success"> {{ $child_parent->name }} </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($permissions->subMenu)
                                            <div class="d-inline-flex justify-end">
                                                <a href="{{ route('admin.permissions.edit', $permissions->id) }}" class="btn btn-warning btn-sm m-2">
                                                    <i class="bi bi-gear me-1"></i>
                                                </a>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @foreach ($permissions->subMenu as $sub)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            {{ $sub->name }}
                                        </td>
                                        <td>
                                            @foreach ($sub->childs as $child)
                                            <span class="badge bg-success"> {{ $child->name }} </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-inline-flex justify-end">
                                                <a href="{{ route('admin.permissions.edit', $sub->id) }}" class="btn btn-warning btn-sm m-2">
                                                    <i class="bi bi-gear me-1"></i>
                                                </a>
                                                {{-- <form action="{{ route('admin.permissions.destroy', $sub->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm m-2">
                                                        <i class="bi bi-trash me-1"></i>
                                                    </button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
