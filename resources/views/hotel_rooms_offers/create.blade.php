@extends('layouts.app', ['activePage' => 'hotel_room_offers', 'activeButton' => 'hotel_room_offers', 'title' => 'Hotel Room Offer', 'navName' => 'Create Hotel Room Offer'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Create Hotel Room Offer') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('hotel_room_offers.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('hotel_room_offers.store') }}" enctype="multipart/form-data" id="hotel-rooms-offers-form">
                                @csrf
                               
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('hotel_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">Select Hotel</label>
                                        <select name="hotel_id" id="hotel_id" class="form-control" placeholder="" required="">
                                            <option value="">{{ __('Select Hotel')}}</option>
                                            @foreach($hotels as $key => $value)

                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-title">
                                            {{ __('Title') }}
                                        </label>
                                        <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'title'])
                                    </div>

                                    <div class="form-group{{ $errors->has('subtitle') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-subtitle">
                                            {{ __('Sub title') }}
                                        </label>
                                        <input type="text" name="subtitle" id="input-subtitle" class="form-control{{ $errors->has('subtitle') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub title') }}" value="{{ old('subtitle') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'subtitle'])
                                    </div>
                                
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">
                                            {{ __('description') }}
                                        </label>
                                       <textarea name="description" id="input-description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" value="" required autofocus>{{ old('description') }}</textarea>
                                    
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('start_date_end_date') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Start Date - End Date') }}
                                        </label>
                                        <input type="text" name="start_date_end_date" id="start_date_end_date" class="form-control{{ $errors->has('start_date_end_date') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('start_date_end_date') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'start_date_end_date'])
                                    </div>

                                    <div class="form-group{{ $errors->has('beds') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-beds">
                                            {{ __('Beds') }}
                                        </label>
                                        <input type="text" name="beds" id="input-beds" class="form-control{{ $errors->has('beds') ? ' is-invalid' : '' }}" placeholder="{{ __('Beds') }}" value="{{ old('beds') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'beds'])
                                    </div>

                                    <div class="form-group{{ $errors->has('baths') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-baths">
                                            {{ __('Baths') }}
                                        </label>
                                        <input type="text" name="baths" id="input-baths" class="form-control{{ $errors->has('baths') ? ' is-invalid' : '' }}" placeholder="{{ __('Baths') }}" value="{{ old('baths') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'baths'])
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-price">
                                            {{ __('price') }}
                                        </label>
                                        <input type="text" name="price" id="input-price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'price'])
                                    </div>

                                    <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Discount (%)') }}
                                        </label>
                                        <input type="text" name="discount" id="input-offer-price" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" placeholder="{{ __('Discount (%)') }}" value="{{ old('discount') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'discount'])
                                    </div>

                                    <div class="form-group{{ $errors->has('discount_price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Discount Price') }}
                                        </label>
                                        <input type="text" name="discount_price" id="input-offer-price" class="form-control{{ $errors->has('discount_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Discount Price') }}" value="{{ old('discount_price') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'discount_price'])
                                    </div>

                                    <div class="form-group{{ $errors->has('total') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Max occupancy') }}
                                        </label>
                                        <input type="text" name="total" id="input-total" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" placeholder="{{ __('Max occupancy') }}" value="{{ old('total') }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'total'])
                                    </div>

                                    <div class="form-group{{ $errors->has('private_policy') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-private_policy">
                                            {{ __('Private Policy') }}
                                        </label>
                                       <textarea name="private_policy" id="input-private_policy" class="form-control{{ $errors->has('private_policy') ? ' is-invalid' : '' }}" placeholder="{{ __('Private Policy') }}"  required autofocus>{{ old('private_policy') }}</textarea>
                                    
                                        @include('alerts.feedback', ['field' => 'private_policy'])
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('info') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-info">
                                            {{ __('Info') }}
                                        </label>
                                       <textarea name="info" id="input-info" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}" placeholder="{{ __('Info') }}"  required autofocus>{{ old('info') }}</textarea>
                                    
                                        @include('alerts.feedback', ['field' => 'info'])
                                    </div>


                                    <div class="form-group{{ $errors->has('hotel_room_photos') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Photos') }}
                                        </label>
                                        <div class="needsclick dropzone" id="document-dropzone">

                                        </div>

                                    
                                        @include('alerts.feedback', ['field' => 'hotel_room_photos'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Submit') }}</button>
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
  url: '{{ route("hotel_room_offers.store_photos") }}',
  addRemoveLinks: true,
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  success: function (file, response) {
    $('form').append('<input type="hidden" name="hotel_room_photos[]" value="' + response.name + '">')
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
        url: '{{ route("hotel_room_offers.remove_hotel_rooms_photos") }}',
        data: {name:name,id: file.id},
    });
        var fileRef;
                $('form').find('input[name="hotel_room_photos[]"][value="' + name + '"]').remove()
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

        $('form').append('<input type="hidden" name="hotel_room_photos[]" value="' + file.original_name + '">')
        
      }
    @endif
  }
}


  $('#hotel-rooms-offers-form').bootstrapValidator({
          excluded: ':disabled',
          feedbackIcons: {
             
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
             
             
          }

      })
          .on('success.form.bv', function (e) {
    
    
      });

  $('input[name="start_date_end_date"]').daterangepicker({

   });
</script>
@endpush