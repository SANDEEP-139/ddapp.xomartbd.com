@extends('layouts.app', ['activePage' => 'hotels', 'activeButton' => 'hotels', 'title' => 'Hotels', 'navName' => 'Edit Hotel'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Edit Hotel') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('hotels.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form  action="{{ route('hotels.update',$hotel->id) }}" method="POST" enctype="multipart/form-data" id="hotel-form">
                                  @csrf
                                  @method('PUT')
                      
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('Name') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name',$hotel->name) }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email',$hotel->email) }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-location">{{ __('Location') }}</label>
                                        <input type="location" name="location" id="input-location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }} location" placeholder="{{ __('Location') }}" value="{{ old('location',$hotel->location) }}">

                                        @include('alerts.feedback', ['field' => 'location'])
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">
                                            {{ __('description') }}
                                        </label>
                                       <textarea name="description" id="input-description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}"  required autofocus>{{ old('description',$hotel->description) }}</textarea>
                                    
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-price">
                                            {{ __('price') }}
                                        </label>
                                        <input type="text" name="price" id="input-price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price',$hotel->price) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'price'])
                                    </div>

                                    <div class="form-group{{ $errors->has('offer_price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Offer Price') }}
                                        </label>
                                        <input type="text" name="offer_price" id="input-offer-price" class="form-control{{ $errors->has('offer_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Offer Price') }}" value="{{ old('offer_price',$hotel->offer_price) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'offer_price'])
                                    </div>

                                    <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Discount') }}
                                        </label>
                                        <input type="text" name="discount" id="input-offer-price" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" placeholder="{{ __('Discount') }}" value="{{ old('discount',$hotel->discount) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'discount'])
                                    </div>

                                    <div class="form-group{{ $errors->has('latitude') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Latitude') }}
                                        </label>
                                        <input type="text" name="latitude" id="latitude" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" placeholder="{{ __('latitude') }}" value="{{ old('latitude',$hotel->latitude) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'latitude'])
                                    </div>

                                    <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Longitude') }}
                                        </label>
                                        <input type="text" name="longitude" id="longitude" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" placeholder="{{ __('longitude') }}" value="{{ old('longitude',$hotel->longitude) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'longitude'])
                                    </div>

                                    <div class="form-group{{ $errors->has('contact_no') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Contact No') }}
                                        </label>
                                        <input type="text" name="contact_no" id="input-offer-price" class="form-control{{ $errors->has('contact_no') ? ' is-invalid' : '' }}" placeholder="{{ __('Contact No') }}" value="{{ old('contact_no',$hotel->contact_no) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'contact_no'])
                                    </div>

                                    <div class="form-group{{ $errors->has('fb_page') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Facebook Page') }}
                                        </label>
                                        <input type="text" name="fb_page" id="input-offer-price" class="form-control{{ $errors->has('fb_page') ? ' is-invalid' : '' }}" placeholder="{{ __('Facebook Page') }}" value="{{ old('fb_page',$hotel->fb_page) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'fb_page'])
                                    </div>

                                    <div class="form-group{{ $errors->has('website') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Website') }}
                                        </label>
                                        <input type="text" name="website" id="input-offer-price" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" placeholder="{{ __('Website') }}" value="{{ old('website',$hotel->website) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'website'])
                                    </div>

                                    <div class="form-group{{ $errors->has('youtube_link') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Youtube Link') }}
                                        </label>
                                        <input type="text" name="youtube_link" id="input-offer-price" class="form-control{{ $errors->has('youtube_link') ? ' is-invalid' : '' }}" placeholder="{{ __('Youtube Link') }}" value="{{ old('youtube_link',$hotel->youtube_link) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'youtube_link'])
                                    </div>

                                    <div class="form-group{{ $errors->has('hotel_photos') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Photos') }}
                                        </label>
                                    <div class="needsclick dropzone" id="document-dropzone">

                                    </div>
                                </div>

                                    <div class="form-group{{ $errors->has('hotel_tags') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Tags') }}
                                        </label>
                                        @php $hotel_tags = []; @endphp
                                        @foreach($hotel->hotel_tags as $hotel_tag)
                                         @php $hotel_tags[] = $hotel_tag->name;@endphp
                                        @endforeach
                                        <input type="text" name="hotel_tags" id="input-offer-price" class="form-control{{ $errors->has('hotel_tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" value="{{ old('hotel_tags',implode(',',$hotel_tags))}}" required autofocus data-role="tagsinput">
                                    
                                        @include('alerts.feedback', ['field' => 'hotel_tags'])
                                    </div>

                                    <div class="form-group{{ $errors->has('hotel_services') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Services') }}
                                        </label>
                                        @php $hotel_services = []; @endphp
                                        @foreach($hotel->hotel_services as $hotel_service)
                                         @php $hotel_services[] = $hotel_service->name;@endphp
                                        @endforeach
                                        <input type="text" name="hotel_services" id="input-offer-price" class="form-control{{ $errors->has('hotel_services') ? ' is-invalid' : '' }}" placeholder="{{ __('Services') }}" value="{{ old('hotel_services',implode(',',$hotel_services)) }}" required autofocus data-role="tagsinput">
                                    
                                        @include('alerts.feedback', ['field' => 'hotel_services'])
                                    </div>


                                    <div class="form-group{{ $errors->has('is_active') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">Select Status</label>
                                        <select name="is_active" id="is_active" class="form-control" placeholder="Status" required="">
                                            <option value="">{{ __('Select Status')}}</option>
                                            <option value="1" @if($hotel->is_active == 1) {{ 'selected'}}@endif>Active</option>
                                            <option value="0" @if($hotel->is_active == 0) {{ 'selected'}}@endif>Inactive</option>
                                        </select>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Update Hotel') }}</button>
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
    maxFiles: 5, 
                maxFilesize: 4,
  url: '{{ route("hotels.store_photos") }}',
  addRemoveLinks: true,
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  success: function (file, response) {
    $('form').append('<input type="hidden" name="hotel_photos[]" value="' + response.name + '">')
    uploadedDocumentMap[file.name] = response.name
  },
  removedfile: function (file) {
        var name = file.original_name;   
        console.log(file.original_name);       
        $.ajax({
          headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
        type: 'POST',
        url: '{{ route("hotels.remove_hotel_photos") }}',
        data: {name:name,id: file.id},
    });
        var fileRef;
                $('form').find('input[name="hotel_photos[]"][value="' + name + '"]').remove()
            return (fileRef = file.previewElement) != null ? 
                  fileRef.parentNode.removeChild(file.previewElement) : void 0;
                  
  },
  init: function () {
    @if(isset($hotel) && $hotel->hotel_photos)
      var files =
        {!! json_encode($hotel->hotel_photos) !!}
      for (var i in files) {
        var file = files[i]
        
        this.options.addedfile.call(this, file)
        this.options.thumbnail.call(this, file, file.name);
                this.emit("complete", file);

        $('form').append('<input type="hidden" name="hotel_photos[]" value="' + file.original_name + '">')
        
      }
    @endif
  }
}
function initialize() {
        var input = document.querySelector('.location');
        var autocomplete = new google.maps.places.Autocomplete(input ,{
          fields: ["address_components", "geometry"],
          types: ["address"],
      });
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 

    $('#hotel-form')
            .find('[name="hotel_tags"]')
        // Revalidate the color when it is changed
        .change(function (e) {
            console.warn($('[name="hotel_tags"]').val());
            $('#hotel-form').bootstrapValidator('revalidateField', 'hotel_tags');
        })
            .end()
            .find('[name="hotel_services"]')
        // Revalidate the color when it is changed
        .change(function (e) {
            console.warn($('[name="hotel_services"]').val());
            $('#hotel-form').bootstrapValidator('revalidateField', 'hotel_services');
        })
            .end()
            .bootstrapValidator({
            excluded: ':disabled',
            feedbackIcons: {
               
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                hotel_tags: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter at least one tag you like the most'
                        }
                    }
                },
                hotel_services: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter at least one service you like the most'
                        }
                    }
                },
               
            }

        })
            .on('success.form.bv', function (e) {
      
      
        });
  </script>
  @endpush