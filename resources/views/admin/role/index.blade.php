@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => '',
            'name' => 'Dashboard',
        ],
        [
            'route' => '',
            'name' => 'Role',
        ],
    ]" :title="'Role'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm m-2">
                            <i class="bi bi-plus me-1"></i> Tambah
                        </a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Guard Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($role as $key => $rules)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $rules->name }}</td>
                                    <td>{{ $rules->guard_name }}</td>
                                    <td>
                                        <div class="d-inline-flex justify-end">
                                            <a href="{{ route('admin.roles.edit', $rules->id) }}" class="btn btn-warning btn-sm m-2">
                                                <i class="bi bi-pencil-square me-1"></i>
                                            </a>
                                            <form action="{{ route('admin.roles.destroy', $rules->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
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
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('post_main_scripts')
<script>
    
</script>
@endpush