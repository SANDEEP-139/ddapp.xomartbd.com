@extends('layouts.app', ['activePage' => 'restaurant_menus', 'activeButton' => 'restaurant_menus', 'title' => 'restaurant_menus', 'navName' => 'Create Restaurant Menu'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Create Restaurant Menu') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('restaurant_menus.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('restaurant_menus.store') }}" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('restaurant_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">Select Restaurant</label>
                                        <select name="restaurant_id" id="restaurant_id" class="form-control" placeholder="" required="">
                                            <option value="">{{ __('Select Restaurant')}}</option>
                                            @foreach($restaurants as $key => $value)

                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('Name') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    
                                   
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">
                                            {{ __('description') }}
                                        </label>
                                       <textarea name="description" id="input-description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" value="{{ old('description') }}" required autofocus></textarea>
                                    
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                   

                                    <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Discount') }}
                                        </label>
                                        <input type="text" name="discount" id="input-offer-price" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" placeholder="{{ __('Discount') }}" value="{{ old('discount') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'discount'])
                                    </div>

                                    

                                    <div class="form-group{{ $errors->has('restaurant_menu_photos') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Photos') }}
                                        </label>
                                        <div class="needsclick dropzone" id="document-dropzone">

                                        </div>

                                    
                                        @include('alerts.feedback', ['field' => 'restaurant_menu_photos'])
                                    </div>



                                    <div class="form-group{{ $errors->has('restaurant_menu_tags') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Tags') }}
                                        </label>
                                        <input type="text" name="restaurant_menu_tags" id="input-offer-price" class="form-control{{ $errors->has('restaurant_menu_tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" value="{{ old('restaurant_menu_tags') }}" required autofocus data-role="tagsinput">
                                    
                                        @include('alerts.feedback', ['field' => 'restaurant_menu_tags'])
                                    </div>

                                    <div class="form-group{{ $errors->has('is_active') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">Select Status</label>
                                        <select name="is_active" id="is_active" class="form-control" placeholder="Status" required="">
                                            <option value="">{{ __('Select Status')}}</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Create Restaurant Menu') }}</button>
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
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route("restaurant_menus.store_photos") }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="restaurant_menu_photos[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="restaurant_menu_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($restaurant) && $restaurant->restaurant_menu_photos)
        var files =
          {!! json_encode($restaurant->restaurant_menu_photos) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="restaurant_menu_photos[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }


  event_pic = document.querySelector(".location");
  autocomplete = new google.maps.places.Autocomplete(event_pic, {
    fields: ["address_components", "geometry"],
    types: ["address"],
  });
</script>
@endpush