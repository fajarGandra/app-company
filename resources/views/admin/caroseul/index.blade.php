@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => 'admin.index',
            'name' => 'Dashboard',
        ],
        [
            'route' => '',
            'name' => 'Caroseul',
        ],
    ]" :title="'Caroseul'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="m-3">
                    <a href="{{ route('admin.caroseul.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body pt-3">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">{{ __('messages.publish_start') }}</th>
                                <th scope="col">{{ __('messages.publish_end') }}</th>
                                <th scope="col">{{ __('messages.item_order') }}</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($caroseul as $caroseuls)
                                <tr>
                                    <th scope="row">
                                        <img class="post-item clearfix {{ isset($caroseuls->id) ? '' : 'd-none' }}"
                                            src="{{ Storage::url($caroseuls->image) }}" style="width:50px" alt="Caroseul">
                                    </th>
                                    <td>{{ $caroseuls->title }}</td>
                                    <td>{{ $caroseuls->start_date }}</td>
                                    <td>{{ $caroseuls->end_date }}</td>
                                    <td>{{ $caroseuls->item_order }}</td>
                                    <td>
                                        <a href="{{ route('admin.caroseul.edit', $caroseuls->id) }}"
                                            class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="javascript:;" title="Delete"
                                            class="btn btn-outline-danger btn-sm btn-delete"
                                            data-id="{{ $caroseuls->id }}">
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

            var uri = '{{ route('admin.caroseul.destroy', ':id') }}';
            url = uri.replace(':id', id);
            console.log(url);

            display_data_in_modal('Hapus', body, '', 'Delete', url, 'post', 'btn-danger');
        });
    </script>
@endpush
