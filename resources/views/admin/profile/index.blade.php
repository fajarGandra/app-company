@extends('layouts.admin')

@section('content')

<x-page.breadcrumb :breadcrumb="[
    [
        'route' => 'admin.index',
        'name' => 'Dashboard',
    ],
    [
        'route' => '',
        'name' => 'Profile',
    ],
]" :title="'Profile'"></x-page.breadcrumb>

<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img id="showImage" class="rounded-circle" src="{{ ($user->profile_photo_path != "") ? Storage::url($user->profile_photo_path) : asset('be/assets/img/profile-img.jpg') }}" alt="Profile">
            <h2>{{ $user->name }}</h2>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">{{ __('messages.edit-profile') }}</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">{{ __('messages.setting') }}</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">{{ __('messages.change-password') }}</button>
              </li>

            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade profile-edit pt-3 show active" id="profile-edit">

                <!-- Profile Edit Form -->
                <form id="form-submit" action="{{ route('admin.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.cover-image') }}</label>
                    <div class="col-md-8 col-lg-9">
                      <input class="form-control @error('profile_photo_path') is-invalid @enderror mb-3" type="file" id="profile_photo_path" name="profile_photo_path">
                      <x-backend.form.error field='profile_photo_path' name="profile_photo_path"></x-backend.form.error>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}">
                      <x-backend.form.error field='name'></x-backend.form.error>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}">
                      <x-backend.form.error field='email'></x-backend.form.error>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" id="btn-submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                {{-- <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form --> --}}

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                
                <!-- Profile Edit Form -->
                <form id="form-submit" action="{{ route('admin.profile.change-password', $user->id) }}" method="POST">
                  @method('PUT')
                  @csrf
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                      <x-backend.form.error field='password'></x-backend.form.error>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Password Confirmation</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                      <x-backend.form.error field='password_confirmation'></x-backend.form.error>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" id="btn-submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection

@push('content_scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#profile_photo_path').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src', e.target.result)
        }
        reader.readAsDataURL(e.target.files[0]);
      })
    })

    
    // $(function () {
    //   $('#btn-submit').click(function() {
    //         var title = '{{ isset($category->id) ? "Update" : "Submit" }}';
            
    //         showAlertDialog(title);

    //         $('#modal-confirm-yes').click(function() {
    //             $('#form-submit').submit();
    //         });
    //     });
    // });
  </script>
@endpush