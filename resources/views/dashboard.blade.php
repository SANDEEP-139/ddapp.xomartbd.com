@extends('layouts.app', ['activePage' => 'dashboard', 'title' => env('app_name'), 'navName' => 'Dashboard', 'activeButton' => 'Dashboard'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-12 order-xl-1">
                    <div class="card "style="margin: 0 auto;width: 50%; text-align: center;">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Hotels') }}</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="circle-tile ">
                              
                              <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded"><button type="button" class="btn btn-success"><span class="badge badge-success">{{ $hotels }}</span></button> </div>
                                <hr>
                                <a class="circle-tile-footer" href="{{ route('hotels.index') }}">More Info<i class="fa fa-chevron-circle-right"></i></a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-5">
                <div class="col-xl-12 ">
                    <div class="card "style="margin:  auto;width: 50%; text-align: center;">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Restaurants') }}</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="circle-tile ">
                              
                              <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded"><button type="button" class="btn btn-success"><span class="badge badge-success">{{ $restaurants }}</span></button> </div>
                                <hr>
                                <a class="circle-tile-footer" href="{{ route('restaurants.index') }}">More Info<i class="fa fa-chevron-circle-right"></i></a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-xl-12 ">
                    <div class="card "style="margin:  auto;width: 50%; text-align: center;">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Users') }}</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="circle-tile ">
                              
                              <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded"><button type="button" class="btn btn-success"><span class="badge badge-success">{{ $users }}</span></button> </div>
                                <hr>
                                <a class="circle-tile-footer" href="{{ route('restaurants.index') }}">More Info<i class="fa fa-chevron-circle-right"></i></a>
                              </div>
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
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
        });
    </script>
@endpush