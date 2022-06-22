@extends('layouts.admin')

@section('content')

<x-page.breadcrumb :breadcrumb="[
    [
        'route' => 'admin.index',
        'name' => 'Dashboard',
    ],
    [
        'route' => 'admin.clients.index',
        'name' => 'Clients',
    ],
    [
        'route' => '',
        'name' => 'Tambah Clients',
    ],
]" :title="'Tambah Clients'"></x-page.breadcrumb>

<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body pt-3">
                <form action="{{ isset($clients) ? route('admin.clients.update', $clients->id) : route('admin.clients.store') }}" method="post" enctype="multipart/form-data">
                    @isset($clients->id) @method('PUT') @endisset
                    @csrf
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">{{ __('messages.name') }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ (isset($clients->id)) ?$clients->name:'' }}">
                        <x-backend.form.error field='name' name="name"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">{{ __('messages.country') }}</label>
                      <div class="col-sm-10">
                        <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ (isset($clients->id)) ?$clients->country:'' }}">
                        <x-backend.form.error field='country' name="country"></x-backend.form.error>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-sm-2 col-form-label">{{ __('messages.image') }}</label>
                      <div class="col-sm-10">
                        <input class="form-control @error('image') is-invalid @enderror mb-3" type="file" id="image" name="image">
                        <img id="showImage" class="rounded-circle {{  isset($clients->id) ? '':'d-none'}}" src="{{ isset($clients->id) ? Storage::url($clients->image) : '' }}" alt="clients">
                        <x-backend.form.error field='image' name="image"></x-backend.form.error>
                      </div>
                    </div>
    
                    <div class="row mb-3">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">{{ isset($clients) ? 'Update':'Simpan' }}</button>
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