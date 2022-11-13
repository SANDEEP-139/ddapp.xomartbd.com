<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ env('app_name') }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#hotel_management" @if($activeButton =='hotels') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Hotel Management') }}
                        <b class="caret"></b>
                    </p>

                </a>
                <div class="collapse @if($activeButton =='hotels') active @endif" id="hotel_management">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'hotels') active @endif">
                            <a class="nav-link" href="{{route('hotels.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Hotels") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'hotel_room_offers') active @endif">
                            <a class="nav-link" href="{{route('hotel_room_offers.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Hotel Room Offers") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'hotel-booking-list') active @endif">
                            <a class="nav-link" href="{{route('hotel-booking-list.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Booked hotels") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'hotel-rating') active @endif">
                            <a class="nav-link" href="{{route('hotel-rating.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Hotel ratings") }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#restaurant_management" @if($activeButton =='restaurants') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Restaurant Management') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='restaurants') active @endif" id="restaurant_management">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'restaurants') active @endif">
                            <a class="nav-link" href="{{route('restaurants.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Restaurants") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'restaurants') active @endif">
                            <a class="nav-link" href="{{route('restaurant_menus.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Restaurant Menus") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'restaurants') active @endif">
                            <a class="nav-link" href="{{route('restaurant_menu_foods.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Restaurant Menu Foods") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'restaurants') active @endif">
                            <a class="nav-link" href="{{route('restaurant-order-list.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Restaurant Order") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'restaurants') active @endif">
                            <a class="nav-link" href="{{route('restaurant-rating.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Restaurant Ratings") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

          <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("User Management") }}</p>
                            </a>
                        </li>
           <li class="nav-item @if($activePage == 'role-management') active @endif">
                             <a class="nav-link" href="{{route('roles.index')}}">
                                 <i class="nc-icon nc-circle-09"></i>
                                 <p>{{ __("Roles Management") }}</p>
                             </a>
                         </li>
            <li class="nav-item @if($activePage == 'category-management') active @endif">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __("Category Management") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'campaign-management') active @endif">
                <a class="nav-link" href="{{route('campaigns.index')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __("Campaign Management") }}</p>
                </a>
            </li>


        </ul>
    </div>
</div>
