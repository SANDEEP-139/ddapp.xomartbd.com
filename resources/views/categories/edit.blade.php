@extends('layouts.app', ['activePage' => 'categories', 'activeButton' => 'categories', 'title' => 'Categories', 'navName' => 'Edit Category'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Edit Category') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                           <form  action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')

                                  @csrf
                                  @method('PUT')
                      
                                <div class="pl-lg-4">
                                   <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-title">
                                            {{ __('Title') }}
                                        </label>
                                        <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $category->title) }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'title'])
                                    </div>

                                    <div class="form-group{{ $errors->has('icon') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-icon">
                                            {{ __('Icon') }}
                                        </label>
                                        <input type="file" name="icon" id="input-icon" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" placeholder="{{ __('Icon') }}"   autofocus>
                                        <br>
                                        <img src="{{ $category->icon }}" width="50" height="50">
                                        <input type="hidden" name="hidden_icon" value="{{ $category->getRawOriginal('icon') }}" />
                                        @include('alerts.feedback', ['field' => 'icon'])
                                    </div>


                                     <div class="form-group{{ $errors->has('is_active') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">Select Status</label>
                                        <select name="is_active" id="is_active" class="form-control" placeholder="Status" required="">
                                            <option value="">{{ __('Select Status')}}</option>
                                            <option value="1" @if($category->status == 1) {{ 'selected'}}@endif>Active</option>
                                            <option value="0" @if($category->status == 0) {{ 'selected'}}@endif>Inactive</option>
                                        </select>

                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Update Category') }}</button>
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
