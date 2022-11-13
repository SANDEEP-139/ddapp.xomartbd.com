@extends('layouts.app', ['activePage' => 'Restaurant Ratings', 'activeButton' => 'Restaurant Ratings', 'title' => env('app_name'), 'navName' => 'Restaurant Ratings'])

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
                                    <h3 class="mb-0">{{ __('Restaurant Ratings') }}</h3>
                                    
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
                                    <th>{{ __('Feedback') }}</th>
                                    <th>{{ __('Rating') }}</th>
                                    <th>{{ __('Status') }}</th>
                    
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($restaurant_ratings as $restaurant_rating)
                                        <tr>
                                            <td>{{ $restaurant_rating->user->name }}</td>
                                            <td>{{$restaurant_rating->restaurant->name}}</td>
                                            <td>{{$restaurant_rating->feedback}}</td>
                                            <td><span class="badge badge-success">{{$restaurant_rating->rating}}</span></td>
                                            <input type="hidden" id="recid" value="{{ $restaurant_rating->id }}">
                                            <td class="statusval">
                                                <input id="toggle-one" @if($restaurant_rating->status == 1) checked @endif type="checkbox" value="{{$restaurant_rating->status??0}}">
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
             url: "{{url('change_restaurantrating_status')}}",
             type: "POST",
             data: {
                 status: status,
                 id: id,
                 _token: '{{csrf_token()}}'
             },
             dataType: 'json',
             success: function (result) {
                 $('#toggle-one').val(value);
             }
         });
      });
    </script>
@endpush