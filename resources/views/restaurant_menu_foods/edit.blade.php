@extends('layouts.app', ['activePage' => 'restaurant_menu_foods', 'activeButton' => 'restaurant_menu_foods', 'title' => 'Restaurant Menu Food', 'navName' => 'Edit Restaurant Menu Food'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Edit Restaurant Menu Food') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('restaurant_menu_foods.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <form  action="{{ route('restaurant_menu_foods.update',$restaurant_menu_food->id) }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                               
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('restaurant_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">Select Restaurant</label>
                                        <select name="restaurant_id" id="restaurant_id" class="form-control" placeholder="" required="">
                                            <option value="">{{ __('Select Restaurant')}}</option>
                                            @foreach($restaurants as $key => $value)

                                            <option value="{{$key}}" @if(old('restaurant_id') == $key || $restaurant_menu_food->restaurant_id == $key) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group{{ $errors->has('restaurant_menu_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">Select Restaurant Menu</label>
                                        <select name="restaurant_menu_id" id="restaurant_menu_id" class="form-control" placeholder="" required="">
                                            <option value="">{{ __('Select Restaurant Menu')}}</option>
                                            
                                        </select>

                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('Name') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name',$restaurant_menu_food->name) }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">
                                            {{ __('description') }}
                                        </label>
                                       <textarea name="description" id="input-description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" value="" required autofocus>{{ old('description',$restaurant_menu_food->description) }}</textarea>
                                    
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('start_date_end_date') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Start Date - End Date') }}
                                        </label>
                                        <input type="text" name="start_date_end_date" id="start_date_end_date" class="form-control{{ $errors->has('start_date_end_date') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('start_date_end_date',$restaurant_menu_food->start_date_end_date) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'start_date_end_date'])
                                    </div>

                                    
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-price">
                                            {{ __('price') }}
                                        </label>
                                        <input type="text" name="price" id="input-price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price',$restaurant_menu_food->price) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'price'])
                                    </div>

                                    <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Discount (%)') }}
                                        </label>
                                        <input type="text" name="discount" id="input-offer-price" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" placeholder="{{ __('Discount (%)') }}" value="{{ old('discount',$restaurant_menu_food->discount) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'discount'])
                                    </div>

                                    <div class="form-group{{ $errors->has('discount_price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Discount Price') }}
                                        </label>
                                        <input type="text" name="discount_price" id="input-offer-price" class="form-control{{ $errors->has('discount_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Discount Price') }}" value="{{ old('discount_price',$restaurant_menu_food->discount_price) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'discount_price'])
                                    </div>

                                    <div class="form-group{{ $errors->has('delivery_charge') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Delivery Charge') }}
                                        </label>
                                        <input type="text" name="delivery_charge" id="input-delivery_charge" class="form-control{{ $errors->has('delivery_charge') ? ' is-invalid' : '' }}" placeholder="{{ __('Delivery Charge') }}" value="{{ old('delivery_charge',$restaurant_menu_food->delivery_charge) }}" required autofocus>
                                    
                                        @include('alerts.feedback', ['field' => 'delivery_charge'])
                                    </div>

                                    

                                    <div class="form-group{{ $errors->has('list') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('List') }}
                                        </label>
                                        <input type="text" name="list" id="input-offer-price" class="form-control{{ $errors->has('list') ? ' is-invalid' : '' }}" placeholder="{{ __('List') }}" value="{{ old('list',$restaurant_menu_food->list) }}" required autofocus data-role="tagsinput">
                                    
                                        @include('alerts.feedback', ['field' => 'list'])
                                    </div>

                                    <div class="form-group{{ $errors->has('restaurant_menu_food_tags') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Tags') }}
                                        </label>
                                        @php $restaurant_menu_food_tags = []; @endphp
                                        @foreach($restaurant_menu_food->restaurant_menu_food_tags as $restaurant_menu_food_tag)
                                         @php $restaurant_menu_food_tags[] = $restaurant_menu_food_tag->name;@endphp
                                        @endforeach
  
                                        <input type="text" name="restaurant_menu_food_tags" id="input-offer-price" class="form-control{{ $errors->has('restaurant_menu_food_tags') ? ' is-invalid' : '' }}" placeholder="{{ __('Tags') }}" value="{{ old('restaurant_menu_food_tags',implode(',',$restaurant_menu_food_tags)) }}" required autofocus data-role="tagsinput">
                                    
                                        @include('alerts.feedback', ['field' => 'restaurant_menu_food_tags'])
                                    </div>

                                    <div class="form-group{{ $errors->has('restaurant_menu_food_photos') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-offer-price">
                                            {{ __('Photos') }}
                                        </label>
                                        <div class="needsclick dropzone" id="document-dropzone">

                                        </div>

                                    
                                        @include('alerts.feedback', ['field' => 'restaurant_menu_food_photos'])
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
    url: '{{ route("restaurant_menu_foods.store_photos") }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="restaurant_menu_food_photos[]" value="' + response.name + '">')
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
      $('form').find('input[name="restaurant_menu_food_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($project) && $project->restaurant_menu_food_photos)
        var files =
          {!! json_encode($project->restaurant_menu_food_photos) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="restaurant_menu_food_photos[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }



  $('input[name="start_date_end_date"]').daterangepicker({

   });


  
  $(document).ready(function ()
    {
        // Cache the jQuery objects, don't look them up in each access
        var $restaurants = $('select[name="restaurant_id"]');
        var $restaurant_menus = $('select[name="restaurant_menu_id"]');
        
        $restaurants.on('change',function(){
            var restaurant_id = $restaurants.val();
            var restaurant_menu_id = '{{$restaurant_menu_food->restaurant_menu_id}}';

            
            if(restaurant_id)
            {
                $.ajax({
                   url: "{{url('fetch_restaurant_menu')}}",
                   type: "POST",
                   data: {
                       restaurant_id: restaurant_id,
                       _token: '{{csrf_token()}}'
                   },
                   dataType: 'json',
                    success:function(data)
                    {
                        $restaurant_menus.empty();
                        jQuery.each(data, function(key,value){
                            // Check if current element matches previous selection

                            $restaurant_menus.append(
                                `<option value="${value.id}"${value.id == restaurant_menu_id ? ' selected' : ''}>${value.name}</option>`
                            );
                        });
                    }
                });
            }
            else
            {
                $restaurant_menus.empty();
            }
    });
    
    // After document is loaded and handler set up, fire the handler
    $restaurants.trigger('change');
});
</script>
@endpush