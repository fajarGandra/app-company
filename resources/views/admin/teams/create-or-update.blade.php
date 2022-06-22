@extends('layouts.admin')

@section('content')

<x-page.breadcrumb :breadcrumb="[
    [
        'route' => 'admin.index',
        'name' => 'Dashboard',
    ],
    [
        'route' => 'admin.teams.index',
        'name' => 'Teams',
    ],
    [
        'route' => '',
        'name' => 'Tambah Teams',
    ],
]" :title="'Tambah Teams'"></x-page.breadcrumb>

<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body pt-3">
                <form action="{{ isset($teams) ? route('admin.teams.update', $teams->id) : route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
                    @isset($teams->id) @method('PUT') @endisset
                    @csrf
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">{{ __('messages.name') }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ (isset($teams->id)) ?$teams->name:'' }}">
                        <x-backend.form.error field='name' name="name"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">{{ __('messages.position') }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ (isset($teams->id)) ?$teams->jabatan:'' }}">
                        <x-backend.form.error field='jabatan' name="jabatan"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">{{ __('messages.description') }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ (isset($teams->id)) ?$teams->deskripsi:'' }}">
                        <x-backend.form.error field='deskripsi' name="deskripsi"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-sm-2 col-form-label">{{ __('messages.image') }}</label>
                      <div class="col-sm-10">
                        <input class="form-control @error('image') is-invalid @enderror mb-3" type="file" id="image" name="image">
                        <img id="showImage" class="rounded-circle {{  isset($teams->id) ? '':'d-none'}}" src="{{ isset($teams->id) ? Storage::url($teams->image) : '' }}" width="100px" alt="teams">
                        <x-backend.form.error field='image' name="image"></x-backend.form.error>
                      </div>
                    </div>
    
                    <div class="row mb-3">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">{{ isset($teams) ? 'Update':'Simpan' }}</button>
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
    $(document).ready(function() {
      
      $('#startDateDatepicker, #endDateDatepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });

      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src', e.target.result)
        }
        reader.readAsDataURL(e.target.files[0]);
      })
    })
  
@endpush