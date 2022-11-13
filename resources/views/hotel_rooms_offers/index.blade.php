@extends('layouts.app', ['activePage' => 'hotel_room_offers', 'activeButton' => 'hotel_room_offers', 'title' => env('app_name'), 'navName' => 'Hotel Room Offers'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Hotel Room Offers') }}</h3>
                                    
                                </div>
                                @role('admin')
                                <div class="col-4 text-right">
                                    <a href=" {{ route('hotel_room_offers.create') }}" class="btn btn-sm btn-default">{{ __('Add Hotel Room Offer') }}</a>
                                   
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
                            <table class="table table-hover " id="hotel_room_offers" style="width:100%;">
                                <thead>
                                    <th>{{ __('Hotel Name') }}</th>
                                    <th>{{ __('title') }}</th>
                                    <th>{{ __('price') }}</th>
                                    <th>{{ __('discount (%)') }}</th>
                                    <th>{{ __('discount price') }}</th>
                                    <th>{{ __('Offer Start Date') }}</th>
                                    <th>{{ __('Offer End Date') }}</th>
                                  
                                    <th>{{ __('Actions') }}</th>
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($hotel_room_offers as $hotel_room_offer)
                                        <tr>
                                            <td>{{$hotel_room_offer->hotel->name}}</td>
                                            <td>{{$hotel_room_offer->title}}</td>
                                            <td>{{$hotel_room_offer->price}}</td>
                                            <td>{{$hotel_room_offer->discount}}</td>
                                            <td>{{$hotel_room_offer->discount_price}}</td>
                                            
                                            <td>{{Carbon\Carbon::parse($hotel_room_offer->start_date)->format('m-d-y')}}</td>
                                            <td>{{Carbon\Carbon::parse($hotel_room_offer->end_date)->format('m-d-y')}}</td>
                                            
                                           
                                            <td class="d-flex">
                                                    @role('admin')
                                                    <a href="{{ route('hotel_room_offers.edit', $hotel_room_offer->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>
                                                    
                                                    <form class="d-inline-block" action="{{ route('hotel_room_offers.destroy', $hotel_room_offer->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Are you sure you want to delete this hotel offer?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>
                                                    </form>
                                                    @endrole
                                                    <a href="#" class="btn btn-link btn-warning edit d-inline-block open_modal" data-hotel-id="{{$hotel_room_offer->id}}"  data-toggle="modal" data-target="#myModal_{{$hotel_room_offer->id}}"><i class="fa fa-eye"></i></a>
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
    @foreach ($hotel_room_offers as $hotel_room_offer)
    <!--MODAL -->
    <div class="modal fade" id="myModal_{{$hotel_room_offer->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- MODAL content -->
          <div class="modal-content" >
            <div class="modal-header">
              <h3 class="modal-title">{{ $hotel_room_offer->hotel->name }}</h3>  
              <button type="button" class="close" data-dismiss="modal">×</button>
              
            </div>

       <div class="modal-body" style="padding-top:12px;">
              <center>
            <table class="table">      
                 
             <tbody>
                    
                    <tr>
                      <td>Title</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->title }} </td>
                    </tr>
                    <tr>
                      <td>Sub Title</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->subtitle }} </td>
                    </tr>
                    <tr>
                      <td>Beds</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->beds }} </td>
                    </tr>
                    <tr>
                      <td>Baths</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->baths }} </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->description }} </td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_room_offer->price)){{ $hotel_room_offer->price }}@else{{ __('-')}}@endif </td>
                    </tr> 
                    <tr>
                      <td>Offer Price</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->discount_price }} </td>
                    </tr>  
                    <tr>
                      <td>Discount</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->discount }} </td>
                    </tr>
                    <tr>
                      <td>Max Occupancy</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $hotel_room_offer->total }} </td>
                    </tr>
                    <tr>
                      <td>Offer Start Date</td>
                      <td style="padding-top: 20px" colspan="2"> {{Carbon\Carbon::parse($hotel_room_offer->start_date)->format('m-d-y')}} </td>


                    </tr> 
                    <tr>
                      <td>Offer End Date</td>
                      <td style="padding-top: 20px" colspan="2"> {{Carbon\Carbon::parse($hotel_room_offer->end_date)->format('m-d-y')}} </td>
                    </tr>   
                    <tr>
                        <td>Private Policy</td>
                        
                        <td style="padding-top: 20px" colspan="2">
                           
                            @if(!empty($hotel_room_offer->private_policy)){{ $hotel_room_offer->private_policy }}@else{{ __('-')}}@endif </td>
                    </tr>
                    <tr>
                        <td>Info</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($hotel_room_offer->info)){{ $hotel_room_offer->info }}@else{{ __('-')}}@endif</td>
                    </tr>
                    <tr>
                          <td>Photos</td>
                        
                        @foreach($hotel_room_offer->hotel_room_photos as $hotel_room_photo)
                         
                       
                        <td style="padding-top: 20px"><img @if(!empty($hotel_room_photo)) src="{{ $hotel_room_photo->name }}" @else{{ __('-')}}@endif width="50" height="50"></td>
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
            $('#hotel_room_offers').DataTable({
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


            var table = $('#hotel_room_offers').DataTable();

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });
        });
    </script>
@endpush