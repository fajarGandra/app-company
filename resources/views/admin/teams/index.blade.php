@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => 'admin.index',
            'name' => 'Dashboard',
        ],
        [
            'route' => '',
            'name' => 'Teams',
        ],
    ]" :title="'Teams'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="m-3">
                    <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">{{ __('messages.add') }}</a>
                </div>
                <div class="card-body pt-3">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('messages.image') }}</th>
                                <th scope="col">{{ __('messages.name') }}</th>
                                <th scope="col">{{ __('messages.position') }}</th>
                                <th scope="col">{{ __('messages.description') }}</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($teams as $team)
                                <tr>
                                    <th scope="row">
                                        <img class="post-item clearfix {{ isset($team->id) ? '' : 'd-none' }}"
                                            src="{{ Storage::url($team->image) }}" style="width:50px" alt="Caroseul">
                                    </th>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->jabatan }}</td>
                                    <td>{{ $team->deskripsi }}</td>
                                    <td>
                                        <a href="{{ route('admin.teams.edit', $team->id) }}"
                                            class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="javascript:;" title="Delete"
                                            class="btn btn-outline-danger btn-sm btn-delete"
                                            data-id="{{ $team->id }}">
                                            <i class="bi bi-trash"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>

    </section>
@endsection

@push('content_scripts')
    <script type="text/javascript">
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            var body = `
                <input type="hidden" name="_method" value="delete" />
                Apakah anda yakin ingin hapus data ini?
            `;

            var uri = '{{ route('admin.teams.destroy', ':id') }}';
            url = uri.replace(':id', id);
            console.log(url);

            display_data_in_modal('Hapus', body, '', 'Delete', url, 'post', 'btn-danger');
        });
    </script>
@endpush
