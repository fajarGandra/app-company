@extends('layouts.admin')

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => 'admin.index',
            'name' => 'Dashboard',
        ],
        [
            'route' => 'admin.caroseul.index',
            'name' => 'Caroseul',
        ],
        [
            'route' => '',
            'name' => 'Tambah Caroseul',
        ],
    ]" :title="'Tambah Caroseul'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body pt-3">
                    <form
                        action="{{ isset($caroseul) ? route('admin.caroseul.update', $caroseul->id) : route('admin.caroseul.store') }}"
                        method="post" enctype="multipart/form-data">
                        @isset($caroseul->id)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ isset($caroseul->id) ? $caroseul->title : '' }}">
                                <x-backend.form.error field='title' name="title"></x-backend.form.error>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" style="height: 100px"
                                    name="description">{!! isset($caroseul->description) ? $caroseul->description : '' !!}</textarea>
                                <x-backend.form.error field='description' name="description"></x-backend.form.error>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">{{ __('messages.start_date') }}</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="start_date"
                                    value="{{ old('start_date', $caroseul->start_date ?? '') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">{{ __('messages.end_date') }}</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="end_date"
                                    value="{{ old('end_date', $caroseul->end_date ?? '') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Link</label>
                            <div class="col-sm-4">
                                <input type="text" name="btn_link" id="btn_link"
                                    class="form-control @error('btn_link') is-invalid @enderror"
                                    value="{{ isset($caroseul->id) ? $caroseul->btn_link : '' }}">
                                <x-backend.form.error field='btn_link' name="btn_link"></x-backend.form.error>
                            </div>
                          </div>
                        <div class="row mb-3">
                              <label for="inputText" class="col-sm-2 col-form-label">Button Name</label>
                            <div class="col-sm-4">
                              <input type="text" name="btn_name" id="btn_name"
                                    class="form-control @error('btn_name') is-invalid @enderror"
                                    value="{{ isset($caroseul->id) ? $caroseul->btn_name : '' }}">
                                <x-backend.form.error field='btn_name' name="btn_name"></x-backend.form.error>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">{{ __('messages.item_order') }}</label>
                            <div class="col-sm-4">
                                <input type="number" name="item_order" id="item_order"
                                    class="form-control @error('item_order') is-invalid @enderror"
                                    value="{{ isset($caroseul->id) ? $caroseul->item_order : '#f19e36' }}">
                                <x-backend.form.error field='item_order' name="item_order"></x-backend.form.error>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">{{ __('messages.text_color') }}</label>
                            <div class="col-sm-4">
                                    <input type="color" class="form-control form-control-color @error('text_color') is-invalid @enderror" id="exampleColorInput" name="text_color" value="{{ isset($caroseul->id) ? $caroseul->text_color : '' }}" title="Choose your color">
                                <x-backend.form.error field='text_color' name="text_color"></x-backend.form.error>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profileImage" class="col-sm-2 col-form-label">{{ __('messages.image') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('image') is-invalid @enderror mb-3" type="file"
                                    id="image" name="image">
                                <img id="showImage" class="rounded-circle {{ isset($caroseul->id) ? '' : 'd-none' }}"
                                    src="{{ isset($caroseul->id) ? Storage::url($caroseul->image) : '' }}"
                                    alt="Caroseul">
                                <x-backend.form.error field='image' name="image"></x-backend.form.error>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit"
                                    class="btn btn-primary">{{ isset($caroseul) ? 'Update' : 'Simpan' }}</button>
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

            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        })
      </script>
    @endpush
