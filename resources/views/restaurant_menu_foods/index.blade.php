@extends('layouts.app', ['activePage' => 'restaurant_menu_food', 'activeButton' => 'restaurant_menu_food', 'title' => env('app_name'), 'navName' => 'Restaurant Menu Foods'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Restaurant Menu Foods') }}</h3>
                                    
                                </div>
                                
                                <div class="col-4 text-right">
                                    <a href=" {{ route('restaurant_menu_foods.create') }}" class="btn btn-sm btn-default">{{ __('Add Restaunrant Menu food') }}</a>
                                   
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
                            <table class="table table-hover " id="restaurant_menu_food" style="width:100%;">
                                <thead>
                                    <th>{{ __('Restaurant Name') }}</th>
                                    <th>{{ __('Menu Name') }}</th>
                                    <th>{{ __('Food Name') }}</th>
                                    <th>{{ __('price') }}</th>
                                    <th>{{ __('discount (%)') }}</th>
                                    <th>{{ __('discount price') }}</th>
                                    <th>{{ __('Offer Start Date') }}</th>
                                    <th>{{ __('Offer End Date') }}</th>
                                  
                                    <th>{{ __('Actions') }}</th>
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($restaurant_menu_foods as $restaurant_menu_food)
                                        <tr>
                                            <td>{{$restaurant_menu_food->restaurant->name}}</td>
                                            <td>{{$restaurant_menu_food->restaurant_menu->name}}</td>
                                            <td>{{$restaurant_menu_food->name}}</td>
                                            <td>{{$restaurant_menu_food->price}}</td>
                                            <td>{{$restaurant_menu_food->discount}}</td>
                                            <td>{{$restaurant_menu_food->discount_price}}</td>
                                            
                                            <td>{{Carbon\Carbon::parse($restaurant_menu_food->start_date)->format('m-d-y')}}</td>
                                            <td>{{Carbon\Carbon::parse($restaurant_menu_food->end_date)->format('m-d-y')}}</td>
                                            
                                           
                                            <td class="d-flex">
                                                
                                                    <a href="{{ route('restaurant_menu_foods.edit', $restaurant_menu_food->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>
                                                    
                                                    <form class="d-inline-block" action="{{ route('restaurant_menu_foods.destroy', $restaurant_menu_food->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Are you sure you want to delete this Restaurant Menu Foods offer?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>
                                                    </form>
                                                    
                                                    <a href="#" class="btn btn-link btn-warning edit d-inline-block open_modal" data-hotel-id="{{$restaurant_menu_food->id}}"  data-toggle="modal" data-target="#myModal_{{$restaurant_menu_food->id}}"><i class="fa fa-eye"></i></a>
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
    @foreach ($restaurant_menu_foods as $restaurant_menu_food)
    <!--MODAL -->
    <div class="modal fade" id="myModal_{{$restaurant_menu_food->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- MODAL content -->
          <div class="modal-content" >
            <div class="modal-header">
              <h3 class="modal-title">{{ $restaurant_menu_food->restaurant->name }}</h3>  
              <button type="button" class="close" data-dismiss="modal">×</button>
              
            </div>

       <div class="modal-body" style="padding-top:12px;">
              <center>
            <table class="table">      
                 
             <tbody>
                    
                    <tr>
                      <td>Menu Name</td>
                      <td style="padding-top: 20px" colspan="2"> {{$restaurant_menu_food->restaurant_menu->name}} </td>
                    </tr>
                    <tr>
                      <td>Food Name</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu_food->name }} </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu_food->description }} </td>
                    </tr>
                    <tr>
                      <td>List</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu_food->list }} </td>
                    </tr>
                    
                    <tr>
                      <td>Price</td>
                      <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant_menu_food->price)){{ $restaurant_menu_food->price }}@else{{ __('-')}}@endif </td>
                    </tr> 
                    <tr>
                      <td>Discount Price</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu_food->discount_price }} </td>
                    </tr>  
                    <tr>
                      <td>Discount</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu_food->discount }} </td>
                    </tr>
                    <tr>
                      <td>Delivery Charge</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu_food->delivery_charge }} </td>
                    </tr>
                    <tr>
                      <td>Offer Start Date</td>
                      <td style="padding-top: 20px" colspan="2"> {{Carbon\Carbon::parse($restaurant_menu_food->start_date)->format('m-d-y')}} </td>


                    </tr> 
                    <tr>
                      <td>Offer End Date</td>
                      <td style="padding-top: 20px" colspan="2"> {{Carbon\Carbon::parse($restaurant_menu_food->end_date)->format('m-d-y')}} </td>
                    </tr>   
                    
                    <tr>
                          <td>Photos</td>
                        
                        @foreach($restaurant_menu_food->restaurant_menu_food_photos as $restaurant_menu_food_photos)
                         
                       
                        <td style="padding-top: 20px"><img @if(!empty($restaurant_menu_food_photos)) src="{{ asset('restaurant_menu_food_photos/'.$restaurant_menu_food_photos->name) }}" @else{{ __('-')}}@endif width="50" height="50"></td>
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
            $('#restaurant_menu_food').DataTable({
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


            var table = $('#restaurant_menu_food').DataTable();

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });
        });
    </script>
@endpush