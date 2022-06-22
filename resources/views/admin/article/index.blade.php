@extends('layouts.admin')

@section('content')

<x-page.breadcrumb :breadcrumb="[
    [
        'route' => 'admin.index',
        'name' => 'Dashboard',
    ],
    [
        'route' => '',
        'name' => 'Article',
    ],
]" :title="'Article'"></x-page.breadcrumb>

<section class="section">
    <div class="row">
        <div class="card">
            <div class="m-3">
                <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Tambah</a>
            </div>
          <div class="card-body pt-3">
            <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Keyword</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                    @foreach($article as $articles)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $articles->title }}</td>
                    <td>{{ $articles->slug }}</td>
                    <td>{{ $articles->keywords }}</td>
                    <td>
                        <a href="{{ route('admin.article.edit', $articles->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
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

  </script>
@endpush