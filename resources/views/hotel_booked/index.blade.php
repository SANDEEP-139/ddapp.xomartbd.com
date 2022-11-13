@extends('layouts.app', ['activePage' => 'Hotel Booked', 'activeButton' => 'Hotel Booked', 'title' => env('app_name'), 'navName' => 'Hotel Booked'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Hotel Booked') }}</h3>
                                    
                                </div>
                                
                                
                                
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
                                     <th>{{ __('Customer Name') }}</th>
                                    <th>{{ __('Hotel Name') }}</th>
                                    <th>{{ __('Room Title') }}</th>
                                    <th>{{ __('Check-in') }}</th>
                                    <th>{{ __('Check-out') }}</th>
                                    <th>{{ __('Beds') }}</th>
                                    <th>{{ __('Baths') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Discount') }}</th>
                                    <th>{{ __('Discount Price') }}</th>
                                    <th>{{__('Status')}}</th>
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($hotel_booked as $hotel_book)
                                        <tr>
                                            <td>{{ $hotel_book->user->name }}</td>
                                            <td>{{$hotel_book->hotel->name}}</td>
                                            <td>{{$hotel_book->hotel_room->title}}</td>
                                            <td>{{$hotel_book->from}}</td>
                                            <td>{{$hotel_book->to}}</td>
                                            <td>{{$hotel_book->hotel_room->beds}}</td>
                                            <td>{{$hotel_book->hotel_room->baths}}</td>
                                            <td>{{$hotel_book->price}}</td>
                                            <td>{{$hotel_book->hotel_room->discount}}</td>
                                           <td>{{$hotel_book->hotel_room->discount_price}}</td>
                                            <td><span class="badge @if($hotel_book->book_type==0){{ 'badge-success'}} @endif">
                                               
                                                
                                                @if($hotel_book->book_type==0)
                                                {{ __('Booked')}}
                                              
                                                @endif
                                                </span></td>
                                            
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
    @foreach ($hotel_booked as $hotel_book)
    <!--MODAL -->
    <div class="modal fade" id="myModal_{{$hotel_book->hotel->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- MODAL content -->
          <div class="modal-content" >
            <div class="modal-header">
              <h3 class="modal-title">{{ $hotel_book->hotel->name }}</h3>  
              <button type="button" class="close" data-dismiss="modal">×</button>
              
            </div>

       <div class="modal-body" style="padding-top:12px;">
              <center>
            <table class="table">      
                 
             <tbody>
                    <tr>
                      <td>Location</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_book->hotel->location }} </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_book->hotel->description }} </td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_book->hotel->price)){{ $hotel_book->hotel->price }}@else{{ __('-')}}@endif </td>
                    </tr> 
                    <tr>
                      <td>Offer Price</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_book->hotel->offer_price }} </td>
                    </tr>  
                    <tr>
                      <td>Discount</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_book->hotel->discount }} </td>
                    </tr>  
                    <tr>
                      <td>Latitude</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_book->hotel->latitude }} </td>
                    </tr>  
                    <tr>
                        <td>Longitude</td>
                        
                        <td style="padding-top: 20px" colspan="2">
                           
                            @if(!empty($hotel_book->hotel->longitude)){{ $hotel_book->hotel->longitude }}@else{{ __('-')}}@endif </td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_book->hotel->contact_no)){{ $hotel_book->hotel->contact_no }}@else{{ __('-')}}@endif</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_book->hotel->is_active) && $hotel_book->hotel->is_active == 1) {{ __('Active') }}@else{{ __('Inactive')}}@endif</td>
                    </tr>
                     
                     <tr>
                        <td>Email</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_book->hotel->email)){{ $hotel_book->hotel->email }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                        <td>Facebook Page</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_book->hotel->fb_page)){{ $hotel_book->hotel->fb_page }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                        <td>Website</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_book->hotel->website)) {{ $hotel_book->hotel->website }}@else{{ __('-')}}@endif</td>
                    </tr>

                    <tr>
                        <td>Youtube Link</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_book->hotel->youtube_link)) {{ $hotel_book->hotel->youtube_link }}@else{{ __('-')}}@endif</td>
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