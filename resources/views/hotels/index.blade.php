@extends('layouts.app', ['activePage' => 'hotels', 'activeButton' => 'hotels', 'title' => env('app_name'), 'navName' => 'Hotels'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Hotels') }}</h3>
                                    
                                </div>
                                
                                @role('admin')
                                <div class="col-4 text-right">
                                    <a href=" {{ route('hotels.create') }}" class="btn btn-sm btn-default">{{ __('Add Hotel') }}</a>
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
                            <table class="table table-hover " id="hotels" style="width:100%;">
                                <thead>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Location') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Offer Price') }}</th>
                                    <th>{{ __('Discount') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </thead>
                                
                                <tbody>   
                                    @foreach ($hotels as $hotel)
                                        <tr>
                                            
                                            <td>{{$hotel->name}}</td>
                                            <td>{{$hotel->location}}</td>
                                            <td>{{$hotel->price}}</td>
                                            <td>{{$hotel->offer_price}}</td>
                                            <td>{{$hotel->discount}}</td>
                                            <td><span class="badge @if($hotel->is_active==0 ) {{ 'badge-warning' }} @elseif($hotel->is_active==1){{ 'badge-success'}} @endif">
                                               
                                                @if($hotel->is_active==0)
                                                {{ __('Inactive')}}
                                                @elseif($hotel->is_active==1)
                                                {{ __('Active')}}
                                              
                                                @endif
                                                </span></td>
                                            <td class="d-flex">
                                            @role('admin')      
                                                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>
                                                    
                                                    <form class="d-inline-block" action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Are you sure you want to delete this hotel?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>
                                                    </form>
                                           @endrole         
                                                    <a href="#" class="btn btn-link btn-warning edit d-inline-block open_modal" data-hotel-id="{{$hotel->id}}"  data-toggle="modal" data-target="#myModal_{{$hotel->id}}"><i class="fa fa-eye"></i></a>
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
    @foreach ($hotels as $hotel)
    <!--MODAL -->
    <div class="modal fade" id="myModal_{{$hotel->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- MODAL content -->
          <div class="modal-content" >
            <div class="modal-header">
              <h3 class="modal-title">{{ $hotel->name }}</h3>  
              <button type="button" class="close" data-dismiss="modal">×</button>
              
            </div>

       <div class="modal-body" style="padding-top:12px;">
              <center>
            <table class="table">      
                 
             <tbody>
                    <tr>
                      <td>Location</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel->location }} </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel->description }} </td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td style="padding-top: 20px" colspan="2">@if(!empty($hotel->price)){{ $hotel->price }}@else{{ __('-')}}@endif </td>
                    </tr> 
                    <tr>
                      <td>Offer Price</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel->offer_price }} </td>
                    </tr>  
                    <tr>
                      <td>Discount</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel->discount }} </td>
                    </tr>  
                    <tr>
                      <td>Latitude</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel->latitude }} </td>
                    </tr>  
                    <tr>
                        <td>Longitude</td>
                        
                        <td style="padding-top: 20px" colspan="2">
                           
                            @if(!empty($hotel->longitude)){{ $hotel->longitude }}@else{{ __('-')}}@endif </td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel->contact_no)){{ $hotel->contact_no }}@else{{ __('-')}}@endif</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel->is_active) && $hotel->is_active == 1) {{ __('Active') }}@else{{ __('Inactive')}}@endif</td>
                    </tr>
                     
                     <tr>
                        <td>Email</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel->email)){{ $hotel->email }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                        <td>Facebook Page</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel->fb_page)){{ $hotel->fb_page }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                        <td>Website</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel->website)) {{ $hotel->website }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                        <td>Youtube Link</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel->youtube_link)) {{ $hotel->youtube_link }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                        <td>Services</td>
                        @php $hotel_services = []; @endphp
                        @foreach($hotel->hotel_services as $hotel_service)
                         @php $hotel_services[] = $hotel_service->name;@endphp
                        @endforeach
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_services)) {{ implode(',',$hotel_services) }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                          <td>Tags</td>
                        @php $hotel_tags = []; @endphp
                        @foreach($hotel->hotel_tags as $hotel_tag)
                         @php $hotel_tags[] = $hotel_tag->name;@endphp
                        @endforeach
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_tags)) {{ implode(',',$hotel_tags) }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                          <td>Photos</td>
                        
                        @foreach($hotel->hotel_photos as $hotel_photo)
                         
                       
                        <td style="padding-top: 20px"><img @if(!empty($hotel_photo)) src="{{ $hotel_photo->name }}" @else{{ __('-')}}@endif width="50" height="50"></td>
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
            $('#hotels').DataTable({
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


            var table = $('#hotels').DataTable();

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });
        });
    </script>
@endpush