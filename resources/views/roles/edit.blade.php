@extends('layouts.app', ['activePage' => 'roles', 'activeButton' => 'roles', 'title' => 'Roles', 'navName' => 'Edit Role'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Edit Role') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                          {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

                                  @csrf
                                  @method('PUT')
                      
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('Name') }}
                                        </label>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                   
                                   <div class="form-group{{ $errors->has('users') ? ' has-danger' : '' }}">
                                       <label class="form-control-label" for="input-role">Users</label>
                                       <select name="users[]" id="users" class="form-control" placeholder="Users" required="" multiple>
                                           <option value="">{{ __('Select Users')}}</option>
                                           @foreach($users as $user)
                                           <option value="{{$user->id}}">{{$user->name}}</option>
                                           @endforeach
                                       </select>

                                   </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Update Role') }}</button>
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
