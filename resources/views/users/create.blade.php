@extends('layouts.app', ['activePage' => 'user-management', 'activeButton' => 'laravel', 'title' => 'IkhodalSoftware', 'navName' => 'Create Users'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Create User') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Name') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('mobile_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-mobile_number">{{ __('Phone') }}</label>
                                        <input type="mobile_number" name="mobile_number" id="input-mobile_number" class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" value="{{ old('mobile_number') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'mobile_number'])
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">

                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('profile_pic') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-profile_pic">
                                            {{ __('Profile Picture') }}
                                        </label>
                                        <input type="file" name="profile_pic" id="input-profile_pic" class="form-control{{ $errors->has('profile_pic') ? ' is-invalid' : '' }}" placeholder="{{ __('Profile Picture') }}" value="{{ old('profile_pic') }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'profile_pic'])
                                    </div>

                                    <div class="form-group{{ $errors->has('nid_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nid_number">{{ __('nid number') }}</label>
                                        <input type="text" name="nid_number" id="input-nid_number" class="form-control{{ $errors->has('nid_number') ? ' is-invalid' : '' }}" placeholder="{{ __('nid number') }}" value="{{ old('nid_number') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'nid_number'])
                                    </div>

                                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-gender">
                                            {{ __('Gender') }}
                                        </label>
                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender" id="genders1" value="male">
                                            <span class="form-check-sign"></span>
                                            Male
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female" checked>
                                            <span class="form-check-sign"></span>
                                            Female
                                        </label>
                                    </div>
                                </div>

                               <div class="form-group{{ $errors->has('weather') ? ' has-danger' : '' }}">
                                   <label class="form-control-label" for="input-weather">{{ __('Weather') }}</label>
                                   <input type="text" name="weather" id="input-weather" class="form-control{{ $errors->has('weather') ? ' is-invalid' : '' }}" placeholder="{{ __('Weather') }}" value="{{ old('weather') }}" required autofocus>

                                   @include('alerts.feedback', ['field' => 'weather'])
                               </div>


                               <div class="form-group{{ $errors->has('emergency_contact') ? ' has-danger' : '' }}">
                                   <label class="form-control-label" for="input-emergency_contact">{{ __('Emergency Contact') }}</label>
                                   <input type="text" name="emergency_contact" id="input-emergency_contact" class="form-control{{ $errors->has('emergency_contact') ? ' is-invalid' : '' }}" placeholder="{{ __('Emergency Contact') }}" value="{{ old('emergency_contact') }}" required autofocus>

                                   @include('alerts.feedback', ['field' => 'emergency_contact'])
                               </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-role">Select Role</label>
                                    <select name="roles[]" id="input-role" class="form-control" placeholder="Role" required="">
                                        <option value="">{{ __('Select Role')}}</option>
                                    @foreach ($roles as $role_id => $role_name)
                                        <option value="{{$role_id}}">{{ucfirst($role_name)}}</option>
                                    @endforeach
                                    </select>

                                </div>
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">Select Status</label>
                                    <select name="status" id="status" class="form-control" placeholder="Status" required="">
                                        <option value="">{{ __('Select Status')}}</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-default mt-4">{{ __('Create User') }}</button>
                               </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#input-birth_date').daterangepicker({
              singleDatePicker: true,
              
            });
        });
    </script>
@endpush