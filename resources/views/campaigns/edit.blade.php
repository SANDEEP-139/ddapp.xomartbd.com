@extends('layouts.app', ['activePage' => 'campaigns', 'activeButton' => 'campaigns', 'title' => 'Categories', 'navName' => 'Edit Campaign'])

@section('content')
<div class="content">
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Edit Campaign') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('campaigns.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                     <form  action="{{ route('campaigns.update',$campaign->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-title">
                                {{ __('Title') }}
                            </label>
                            <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $campaign->title) }}" required autofocus>

                            @include('alerts.feedback', ['field' => 'title'])
                        </div>

                        <div class="form-group{{ $errors->has('campaign_type') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-role">Select Campaign Type</label>
                            <select name="campaign_type" id="campaign_type" class="form-control" placeholder="Status" required="">
                                <option value="">{{ __('Select Campaign Type')}}</option>
                                <option value="Ongoing" @if($campaign->campaign_type == 'Ongoing') {{ 'selected'}} @endif>Ongoing</option>
                                <option value="Upcoming"  @if($campaign->campaign_type == 'Upgoing') {{ 'selected'}} @endif >Upcoming</option>
                            </select>

                        </div>

                        <div class="form-group{{ $errors->has('campaign_start_date') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="campaign_start_date">
                                {{ __('Start Date') }}
                            </label>
                            <input type="text" name="campaign_start_date" id="campaign_start_date" class="form-control{{ $errors->has('campaign_start_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Date') }}" value="{{ old('campaign_start_date',$campaign->campaign_start_date) }}" required autofocus>

                            @include('alerts.feedback', ['field' => 'Start Date'])
                        </div>

                        <div class="form-group{{ $errors->has('campaign_end_date') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="campaign_end_date">
                                {{ __('End Date') }}
                            </label>
                            <input type="text" name="campaign_end_date" id="campaign_end_date" class="form-control{{ $errors->has('campaign_end_date') ? ' is-invalid' : '' }}" placeholder="{{ __('End Date') }}" value="{{ old('campaign_end_date',$campaign->campaign_end_date) }}" required autofocus>

                            @include('alerts.feedback', ['field' => 'End Date'])
                        </div>

                        <div class="form-group{{ $errors->has('campaign_description') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-campaign_description">
                                {{ __('description') }}
                            </label>
                            <textarea name="campaign_description" id="input-campaign_description" class="form-control{{ $errors->has('campaign_description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" value="" required autofocus>{{ old('campaign_description',$campaign->campaign_description) }}</textarea>
                            
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>

                        <div class="form-group{{ $errors->has('banner_photo') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-banner_photo">
                                {{ __('Banner Photo') }}
                            </label>
                            <input type="file" name="banner_photo" id="input-banner_photo" class="form-control{{ $errors->has('banner_photo') ? ' is-invalid' : '' }}" placeholder="{{ __('Banner Photo') }}" value="{{ old('banner_photo') }}"  autofocus>
                            <img src=" {{$campaign->banner_photo }}" width="50" height="50">
                            <input type="hidden" name="hidden_banner_photo" value="{{ $campaign->getRawOriginal('banner_photo') }}" />
                            @include('alerts.feedback', ['field' => 'banner_photo'])
                        </div>

                        <div class="form-group{{ $errors->has('join_users') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-role">Join Users</label>
                            @php $join_users = []; @endphp

                            @if($campaign->joined_users)
                             @php $join_users = explode(',',$campaign->joined_users); @endphp

                            @endif
                            <select name="join_users[]" id="join_users" class="form-control" placeholder="Status" required="" multiple>
                                <option value="">{{ __('Select Join Users')}}</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}" @if(in_array($user->id, $join_users) && $join_users) {{ 'selected'}}@endif>{{$user->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        
                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-role">Select Status</label>
                            <select name="status" id="status" class="form-control" placeholder="Status" required="">
                                <option value="">{{ __('Select Status')}}</option>
                                <option value="1" @if($campaign->status == 1) {{ 'selected'}}@endif>Active</option>
                                <option value="0" @if($campaign->status == 0) {{ 'selected'}}@endif>Inactive</option>                                               
                            </select>

                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-default mt-4">{{ __('Update Campaign') }}</button>
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

            $('#campaign_start_date,#campaign_end_date').daterangepicker({
              singleDatePicker: true,
              
            });
        });
    </script>
@endpush