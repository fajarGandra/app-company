@extends('layouts.admin')

@section('content')

<x-page.breadcrumb :breadcrumb="[
    [
        'route' => 'admin.index',
        'name' => 'Dashboard',
    ],
    [
        'route' => 'admin.category.index',
        'name' => 'Category',
    ],
    [
        'route' => '',
        'name' => 'Tambah Category',
    ],
]" :title="'Tambah Category'"></x-page.breadcrumb>

<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body pt-3">
                <form action="{{ isset($category) ? route('admin.category.update', $category->id) : route('admin.category.store') }}" method="post">
                    @isset($category->id) @method('PUT') @endisset
                    @csrf
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ (isset($category->id)) ?$category->name:'' }}">
                        <x-backend.form.error field='name' name="name"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                      <div class="col-sm-10">
                        <input type="text" name="slug" id="slug" readonly class="form-control @error('slug') is-invalid @enderror" value="{{ (isset($category->slug)) ?$category->slug:'' }}">
                        <x-backend.form.error field='slug' name="slug"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Keywords</label>
                      <div class="col-sm-10">
                        <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" value="{{ (isset($category->keywords)) ?$category->keywords:'' }}">
                        <x-backend.form.error field='keywords' name="keywords"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Meta Desc</label>
                      <div class="col-sm-10">
                        <input type="text" name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" value="{{ (isset($category->meta_desc)) ?$category->meta_desc:'' }}">
                        <x-backend.form.error field='meta_desc' name="meta_desc"></x-backend.form.error>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update':'Simpan' }}</button>
                      </div>
                    </div>
    
                  </form>
            </div>
            
        </div>
    </div>
</section>

@endsection

@push('content_scripts')
  <script type="text/javascript">
    
    $(function () {
        $('#name').on('change', function(){
            slug = $(this).val();
            slugName = slug.replace(/ /g, '-').toLowerCase();
            $('#slug').val(slugName);
        });
    });
  </script>
@endpush