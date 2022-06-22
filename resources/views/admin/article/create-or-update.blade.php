@extends('layouts.admin')

@section('content')

<x-page.breadcrumb :breadcrumb="[
    [
        'route' => 'admin.index',
        'name' => 'Dashboard',
    ],
    [
        'route' => 'admin.article.index',
        'name' => 'Article',
    ],
    [
        'route' => '',
        'name' => 'Tambah Article',
    ],
]" :title="'Tambah Article'"></x-page.breadcrumb>

<section class="section contact">
  <form action="{{ isset($article) ? route('admin.article.update', $article->slug) : route('admin.article.store') }}" method="post" enctype="multipart/form-data">
    @isset($article->id) @method('PUT') @endisset
    @csrf
    <div class="row gy-8">
      <div class="col-xl-9">
        <div class="card p-4">
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Cover</label>
            <div class="col-sm-5">
              <input class="form-control @error('name') is-invalid @enderror" type="file" id="cover" name="cover">
              <x-backend.form.error field='cover' name="cover"></x-backend.form.error>
              </div>
            <div class="col-sm-5">
                <img src="">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ (isset($article->id)) ?$article->title:'' }}">
              <x-backend.form.error field='title' name="title"></x-backend.form.error>
              </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
            <div class="col-sm-10">
              <input type="text" name="slug" id="slug" readonly class="form-control @error('slug') is-invalid @enderror" value="{{ (isset($article->slug)) ?$article->slug:'' }}">
              <x-backend.form.error field='slug' name="slug"></x-backend.form.error>
              </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" style="height: 100px" name="desc" onkeyup="count_down(this);">{!! (isset($article->desc)) ?$article->desc:'' !!}</textarea>
              <span class="pull-right" id="count2"></span>
              <x-backend.form.error field='desc' name="desc"></x-backend.form.error>
              </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select class="form-select" aria-label="Default select example" name="category_id">
                <option>Pilih Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ isset($article) ? ($article->category_id === $category->id) ? 'Selected': '': '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Keywords</label>
            <div class="col-sm-10">
              <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" value="{{ (isset($article->keywords)) ?$article->keywords:'' }}">
              <x-backend.form.error field='keywords' name="keywords"></x-backend.form.error>
              </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Meta Desc</label>
            <div class="col-sm-10">
              <input type="text" name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" value="{{ (isset($article->meta_desc)) ?$article->meta_desc:'' }}">
              <x-backend.form.error field='meta_desc' name="meta_desc"></x-backend.form.error>
              </div>
          </div>
          <hr>
            <!-- TinyMCE Editor -->
          <div class="row mb-3">
            <div class="col-sm-12">
                <textarea class="tinymce-editor" name="content">
                  {{ (isset($article->content)) ?$article->content:'' }}
              </textarea><!-- End TinyMCE Editor -->
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">{{ isset($article) ? 'Update':'Simpan' }}</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="info-box card">
              <h3>Preview Cover</h3>
              <img id="showImageCover" src="{{ isset($article->cover) ? Storage::url($article->cover) : '' }}" alt="{{ isset($article->title) ? $article->title:'' }}">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="info-box card">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="info-box card">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>info@example.com<br>contact@example.com</p>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="info-box card">
              <i class="bi bi-clock"></i>
              <h3>Open Hours</h3>
              <p>Monday - Friday<br>9:00AM - 05:00PM</p>
            </div>
          </div>
        </div>

      </div>

    </div>

</section>

@endsection

@push('content_scripts')
  <script type="text/javascript">
    
    $(function () {
        $('#title').on('change', function(){
            slug = $(this).val();
            slugName = slug.replace(/ /g, '-').toLowerCase();
            $('#slug').val(slugName);
        });
        
      $('#cover').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImageCover').attr('src', e.target.result)
        }
        reader.readAsDataURL(e.target.files[0]);
      })
    })

    // function count_up(obj) {
    //     document.getElementById('desc').innerHTML = obj.value.length;
    // }
 
    function count_down(obj) {
        var element = document.getElementById('count2');

        element.innerHTML = 200 - obj.value.length;

        if (200 - obj.value.length < 0) {
            element.style.color = 'red';
        } else {
            element.style.color = 'grey';
        }
    }
  </script>
@endpush