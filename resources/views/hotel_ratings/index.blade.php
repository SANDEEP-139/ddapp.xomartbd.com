@extends('layouts.app', ['activePage' => 'Hotel Ratings', 'activeButton' => 'Hotel Ratings', 'title' => env('app_name'), 'navName' => 'Hotel Ratings'])

<style type="text/css">
.toggle-on.btn-sm,.toggle-off.btn-sm{
    padding-top: 13px;
}
</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Hotel Ratings') }}</h3>
                                    
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
                                    <th>{{ __('Feedback') }}</th>
                                    <th>{{ __('Rating') }}</th>
                                    <th>{{ __('Action') }}</th>
                    
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($hotel_ratings as $hotel_rating)
                                        <tr>
                                            <td>{{ $hotel_rating->user->name }}</td>
                                            <td>{{$hotel_rating->hotel->name}}</td>
                                            <td>{{$hotel_rating->hotel_room->title}}</td>
                                            <td>{{$hotel_rating->feedback}}</td>
                                            <td><span class="badge badge-success">{{$hotel_rating->rating}}</span></td>
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
    <script>
      $(function() {
        $('#toggle-one').bootstrapToggle({
            on: 'Approve',
            off: 'Decline',
            size: 'small',
            onstyle: 'success',
            offstyle: 'danger',
            style:'paddingTop = 10px'
        });
      });
      $('#toggle-one').on('change',function(){
        var value = $(this).val();
        var id = $('#recid').val();
        if(value == 0){
            var status = 1;
        }else{
            var status = 0;
        }
        $.ajax({
             url: "{{url('change_hotelrating_status')}}",
             type: "POST",
             data: {
                 status: status,
                 id: id,
                 _token: '{{csrf_token()}}'
             },
             dataType: 'json',
             success: function (result) {
                 console.log(result);
             }
         });
      });
    </script>
@endpush