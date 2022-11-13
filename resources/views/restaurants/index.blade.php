@extends('layouts.app', ['activePage' => 'Restaurants', 'activeButton' => 'Restaurants', 'title' => env('app_name'), 'navName' => 'Restaurants'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Restaurants') }}</h3>
                                    
                                </div>
                                
                                @role('admin')
                                <div class="col-4 text-right">
                                    <a href=" {{ route('restaurants.create') }}" class="btn btn-sm btn-default">{{ __('Add Restaurant') }}</a>
                                   
                                </div>
                                @endrole
                                
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            @include('alerts.success')
                            @include('alerts.errors')
                        </div>

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover " id="restaurants" style="width:100%;">
                                <thead>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Location') }}</th>
                                    <th>{{ __('Discount') }}</th>
                                    <th>{{ __('Contact No') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($restaurants as $restaurant)
                                        <tr>
                                            
                                            <td>{{$restaurant->name}}</td>
                                            <td>{{$restaurant->location}}</td>
                                            <td>{{$restaurant->discount}}</td>
                                            <td>{{$restaurant->contact_no}}</td>
                                            <td><span class="badge @if($restaurant->is_active==0 ) {{ 'badge-warning' }} @elseif($restaurant->is_active==1){{ 'badge-success'}} @endif">
                                               
                                                @if($restaurant->is_active==0)
                                                {{ __('Inactive')}}
                                                @elseif($restaurant->is_active==1)
                                                {{ __('Active')}}
                                              
                                                @endif
                                                </span></td>
                                            <td class="d-flex">
                                                    @role('admin')
                                                    <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>
                                                    
                                                    <form class="d-inline-block" action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Are you sure you want to delete this restaurant?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>
                                                    </form>
                                                    @endrole
                                                    <a href="#" class="btn btn-link btn-warning edit d-inline-block open_modal" data-restaurant-id="{{$restaurant->id}}"  data-toggle="modal" data-target="#myModal_{{$restaurant->id}}"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($restaurants as $restaurant)
    <!--MODAL -->
    <div class="modal fade" id="myModal_{{$restaurant->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- MODAL content -->
          <div class="modal-content" >
            <div class="modal-header">
              <h3 class="modal-title">{{ $restaurant->name }}</h3>  
              <button type="button" class="close" data-dismiss="modal">×</button>
              
            </div>

       <div class="modal-body" style="padding-top:12px;">
              <center>
            <table class="table">      
                 
             <tbody>
                    <tr>
                      <td>Location</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant->location }} </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant->description }} </td>
                    </tr>
 
                    <tr>
                      <td>Discount</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant->discount }} </td>
                    </tr>  
                    <tr>
                      <td>Latitude</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant->latitude }} </td>
                    </tr>  
                    <tr>
                        <td>Longitude</td>
                        
                        <td style="padding-top: 20px" colspan="2">
                           
                            @if(!empty($restaurant->longitude)){{ $restaurant->longitude }}@else{{ __('-')}}@endif </td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant->contact_no)){{ $restaurant->contact_no }}@else{{ __('-')}}@endif</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant->is_active) && $restaurant->is_active == 1) {{ __('Active') }}@else{{ __('Inactive')}}@endif</td>
                    </tr>
                    <tr>
                        <td>Youtube Link</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant->youtube_link)) {{ $restaurant->youtube_link }}@else{{ __('-')}}@endif</td>
                    </tr>
                    
                    <tr>
                          <td>Tags</td>
                        @php $restaurant_tags = []; @endphp
                        @foreach($restaurant->restaurant_tags as $restaurant_tag)
                         @php $restaurant_tags[] = $restaurant_tag->name;@endphp
                        @endforeach
                        <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant_tags)) {{ implode(',',$restaurant_tags) }}@else{{ __('-')}}@endif</td>
                    </tr>
                    <tr>
                          <td>Photos</td>
                        
                        @foreach($restaurant->restaurant_photos as $restaurant_photo)
                         
                       
                        <td style="padding-top: 20px"><img @if(!empty($restaurant_photo)) src="{{$restaurant_photo->name }}" @else{{ __('-')}}@endif width="50" height="50"></td>
                         @endforeach
                    </tr>

                </tbody>
            </table>

    </center>
    </div>

    <div class="modal-footer">
       
    </div>

            </div>
          </div>
      </div>

    <!-- /. modal content-->
    @endforeach
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#restaurants').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }

            });


            var table = $('#restaurants').DataTable();

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });
        });
    </script>
@endpush