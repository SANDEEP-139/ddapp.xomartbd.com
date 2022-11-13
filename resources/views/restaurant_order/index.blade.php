@extends('layouts.app', ['activePage' => 'Restaurant Order', 'activeButton' => 'Restaurant Order', 'title' => env('app_name'), 'navName' => 'Restaurant Order'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Restaurant Order') }}</h3>
                                    
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
                                    <th>{{ __('Restaurant Name') }}</th>
                                    <th>{{ __('Restaurant Menu Name') }}</th>
                                    <th>{{ __('Restaurant Menu Food') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Delivery Charge') }}</th>
                                    <th>{{ __('Total Price') }}</th>
                                    <th>{{__('Status')}}</th>
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($restaurant_order as $restaurant_order)
                                        <tr>
                                            <td>{{$restaurant_order->user->name}}</td>
                                            <td>{{ $restaurant_order->restaurant->name }}</td>
                                            <td>{{$restaurant_order->restaurant_menu->name}}</td>
                                            <td>{{$restaurant_order->restaurant_menu_food->name}}</td>

                                            <td>{{$restaurant_order->price}}</td>
                                            <td>{{$restaurant_order->delivery_charge}}</td>
                                            <td>{{$restaurant_order->total_price}}</td>
                                            <td><span class="badge @if($restaurant_order->order_status=='Confirmed'){{ 'badge-success'}}@else {{ 'badge-danger'}}@endif">
                                               
                                                @if($restaurant_order->order_status=='Confirmed')
                                                {{'Confirmed'}}
                                                @else
                                                {{'Pending'}}
                                                @endif
                                                </span></td>
                                            <td>
                                             <input type="hidden" id="recid" value="{{ $hotel_rating->id }}">
                                                <input id="toggle-one" @if($hotel_rating->status == 1) checked @endif type="checkbox" value="{{$hotel_rating->status??0}}">
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