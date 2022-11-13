@extends('layouts.app', ['activePage' => 'Restaurant Menus', 'activeButton' => 'Restaurant Menus', 'title' => env('app_name'), 'navName' => 'Restaurant Menus'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Restaurant Menus') }}</h3>
                                    
                                </div>
                                
                                <div class="col-4 text-right">
                                    <a href=" {{ route('restaurant_menus.create') }}" class="btn btn-sm btn-default">{{ __('Add Restaurant Menu') }}</a>
                                   
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
                            <table class="table table-hover " id="restaurant_menus" style="width:100%;">
                                <thead>
                                    <th>{{ __('Restaurant Name') }}</th>
                                    <th>{{ __('Menu Name') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Discount') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($restaurant_menus as $restaurant_menu)
                                        <tr>
                                            
                                            <td>{{$restaurant_menu->restaurant->name}}</td>
                                            <td>{{$restaurant_menu->name}}</td>
                                            <td>{{$restaurant_menu->description}}</td>
                                            <td>{{$restaurant_menu->discount}}</td>
                                            <td><span class="badge @if($restaurant_menu->is_active==0 ) {{ 'badge-warning' }} @elseif($restaurant_menu->is_active==1){{ 'badge-success'}} @endif">
                                               
                                                @if($restaurant_menu->is_active==0)
                                                {{ __('Inactive')}}
                                                @elseif($restaurant_menu->is_active==1)
                                                {{ __('Active')}}
                                              
                                                @endif
                                                </span></td>
                                            <td class="d-flex">
                                                
                                                    <a href="{{ route('restaurant_menus.edit', $restaurant_menu->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>
                                                    
                                                    <form class="d-inline-block" action="{{ route('restaurant_menus.destroy', $restaurant_menu->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Are you sure you want to delete this restaurant menu?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>
                                                    </form>
                                                    
                                                    <a href="#" class="btn btn-link btn-warning edit d-inline-block open_modal" data-restaurant-id="{{$restaurant_menu->id}}"  data-toggle="modal" data-target="#myModal_{{$restaurant_menu->id}}"><i class="fa fa-eye"></i></a>
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
    @foreach ($restaurant_menus as $restaurant_menu)
    <!--MODAL -->
    <div class="modal fade" id="myModal_{{$restaurant_menu->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- MODAL content -->
          <div class="modal-content" >
            <div class="modal-header">
              <h3 class="modal-title">{{ $restaurant_menu->restaurant->name }}</h3>  
              <button type="button" class="close" data-dismiss="modal">×</button>
              
            </div>

       <div class="modal-body" style="padding-top:12px;">
              <center>
            <table class="table">      
                 
             <tbody>
                    <tr>
                      <td>Menu Name</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu->name }} </td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu->description }} </td>
                    </tr>
 
                    <tr>
                      <td>Discount</td>
                      <td style="padding-top: 20px" colspan="2"> {{ $restaurant_menu->discount }} </td>
                    </tr>  
                    
                    <tr>
                        <td>Contact Number</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant_menu->contact_no)){{ $restaurant_menu->contact_no }}@else{{ __('-')}}@endif</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant_menu->is_active) && $restaurant_menu->is_active == 1) {{ __('Active') }}@else{{ __('Inactive')}}@endif</td>
                    </tr>
                   
                    <tr>
                          <td>Tags</td>
                        @php $restaurant_menu_tags = []; @endphp
                        @foreach($restaurant_menu->restaurant_menu_tags as $restaurant_menu_tag)
                         @php $restaurant_menu_tags[] = $restaurant_menu_tag->name;@endphp
                        @endforeach
                        <td style="padding-top: 20px" colspan="2">@if(!empty($restaurant_menu_tags)) {{ implode(',',$restaurant_menu_tags) }}@else{{ __('-')}}@endif</td>
                    </tr>
                    <tr>
                          <td>Photos</td>
                        
                        @foreach($restaurant_menu->restaurant_menu_photos as $restaurant_menu_photo)
                         
                       
                        <td style="padding-top: 20px"><img @if(!empty($restaurant_menu_photo)) src="{{ asset('restaurant_menu_photos/'.$restaurant_menu_photo->name) }}" @else{{ __('-')}}@endif width="50" height="50"></td>
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
            $('#restaurant_menus').DataTable({
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


            var table = $('#restaurant_menus').DataTable();

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });
        });
    </script>
@endpush