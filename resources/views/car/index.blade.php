@extends('layouts.front')

@section('content')

    <!-- Start Car View Section  -->
    <section class="section-wrapper grey-color-bg view-section">
        <div class="container">
            <div class="row">
                <!-- Start Sidebar Filter  -->
                <div class="col-md-3" style="display:none;">
                    <div class="filter-head text-center">
                        <h5>29 Car Found Matching Your Search.</h5>
                    </div>
                    <div class="filter-area">
                        <!-- Start Filter Widget -->
                        <div class="price-filter filter">
                            <h6>Price</h6>
                            <p><span class="price-value" id="amount"></span></p>
                            <div id="price-range"></div>
                        </div>
                        <!-- End Filter Widget -->
                        <!-- Start Filter Widget -->
                        <div class="name-filter filter">
                            <h6>Search Car</h6>
                            <div class="input-group margin-bottom-sm">
                                <input type="text" name="destination_city" class="form-control" required placeholder="E.g. Car">
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-search fa-fw"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <!-- End Filter Widget -->
                        <!-- Start Filter Widget -->
                        <div class="filter">
                            <h6>Car Type</h6>
                            <ul>
                                <li><label><input type="checkbox"> Full Size</label></li>
                                <li><label><input type="checkbox"> Compact</label></li>
                                <li><label><input type="checkbox"> Economy</label></li>
                                <li><label><input type="checkbox"> Luxury</label></li>
                                <li><label><input type="checkbox"> Premium</label></li>
                                <li><label><input type="checkbox"> Mini Car</label></li>
                                <li><label><input type="checkbox"> Van / Minivan</label></li>
                                <li><label><input type="checkbox"> Exotic</label></li>
                                <li><label><input type="checkbox"> Special</label></li>
                            </ul>
                        </div>
                        <!-- End Filter Widget -->
                        <!-- Start Filter Widget -->
                        <div class="filter">
                            <h6>Car Preference</h6>
                            <ul>
                                <li><label><input type="checkbox"> Passenger Quantity</label></li>
                                <li><label><input type="checkbox"> Satellite Navigation</label></li>
                                <li><label><input type="checkbox"> Air Conditioning</label></li>
                                <li><label><input type="checkbox"> Music System</label></li>
                                <li><label><input type="checkbox"> Wi-Fi</label></li>
                            </ul>
                        </div>
                        <!-- End Filter Widget -->
                        <!-- Start Filter Widget -->
                        <div class="filter">
                            <h6>Star Rating</h6>
                            <ul>
                                <li><label><input type="checkbox"> 5 Stars</label></li>
                                <li><label><input type="checkbox"> 4 Stars</label></li>
                                <li><label><input type="checkbox"> 3 Stars</label></li>
                                <li><label><input type="checkbox"> 2 Stars</label></li>
                                <li><label><input type="checkbox"> 1 Stars</label></li>
                            </ul>
                        </div>
                        <!-- End Filter Widget -->
                        <!-- Start Filter Widget -->
                        <div class="filter">
                            <h6>Review Score</h6>
                            <ul>
                                <li><label><input type="checkbox"> Excellent</label></li>
                                <li><label><input type="checkbox"> Good</label></li>
                                <li><label><input type="checkbox"> Okay</label></li>
                                <li><label><input type="checkbox"> Mediocre</label></li>
                                <li><label><input type="checkbox"> Poor</label></li>
                            </ul>
                        </div>
                        <!-- End Filter Widget -->
                    </div>
                </div>
                <!-- End Sidebar Filter  -->
                <!-- Start Car Listing -->
                <div class="col-md-12 item-listing">
                    <!-- Start Shorting  -->
                    <div class="sort-area" style="display: none">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-row">
                                    <!-- Start Shorting Item -->
                                    <div class="col-lg-3 col-sm-3 col-xs-6 sort">
                                        <select class="form-control form-control-sm">
                                            <option>Price</option>
                                            <option> Low to High</option>
                                            <option> High to Low</option>
                                        </select>
                                    </div>
                                    <!-- End Shorting Item -->
                                    <!-- Start Shorting Item -->
                                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                                        <select class="form-control form-control-sm">
                                            <option>Star Rating</option>
                                            <option> Low to High</option>
                                            <option> High to Low</option>
                                        </select>
                                    </div>
                                    <!-- End Shorting Item -->
                                    <!-- Start Shorting Item -->
                                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                                        <select class="form-control form-control-sm">
                                            <option>User Rating</option>
                                            <option> Low to High</option>
                                            <option> High to Low</option>
                                        </select>
                                    </div>
                                    <!-- End Shorting Item -->
                                    <!-- Start Shorting Item -->
                                    <div class="col-md-3 col-sm-3 col-xs-6 sort">
                                        <select class="form-control form-control-sm">
                                            <option>Name</option>
                                            <option> Ascending A - Z</option>
                                            <option> Descending Z - A</option>
                                        </select>
                                    </div>
                                    <!-- End Shorting Item -->
                                </div>
                            </div>
                            <div class="col-md-2 text-right sort">
                                <!-- Start Change View button Group -->
                                <div class="btn-group" role="group" aria-label="Change View">
                                    <a class="btn btn-theme btn-sm" href="car-grid.html" title="Grid View"> <i class="fa fa-th-large"></i> </a> <a class="btn btn-theme btn-sm" href="car-list.html" title="List View"> <i class="fa fa-list"></i> </a>
                                </div>
                                <!-- End Change View button Group -->
                            </div>
                        </div>
                    </div>
                    <!-- End Shorting  -->

                    <!-- Start List View -->


                    <?php
                    if(isset($vehicleList) && count($vehicleList) > 0){
                    foreach($vehicleList as $data){
                    ?>
                    <div class="list-items">
                        <div class="item">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img class="item-image" src="/uploads/vehicle/<?php echo $data["vehicle"]["picture"];?>" alt="Car Rental">
                                </div>
                                <div class="col-md-8">
                                    <div class="item-details">
                                        <div class="title">
                                            <h5><?php echo $data["vehicle"]["name"];?></h5>
                                            <span><?php echo $data["vehicle"]["description"];?></span>
                                        </div>
                                        <div class="price">{{ __("PRICE") }}
                                            @if($return==0)
                                            <span>{{ $data["price"] }} £</span>
                                            @else
                                                <span style="text-decoration: line-through">{{ ($data["price"]*2) }} £</span>
                                                <span>{{ ceil(((100 - $transferReturnDiscount) / 100)* ($data["price"]*2)) }} £</span>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row no-gutters item-info">
                                            <div class="col-lg-7 align-self-center">
                                                <ul class="item-amenities list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-user" title="Person"></i><span>{{ $data["vehicle"]["passenger"] }}</span></li>
                                                    <li class="list-inline-item"><i class="fa fa-briefcase" title="Bag"></i><span>{{ $data["vehicle"]["luggage"] }}</span></li>
                                                    <li class="list-inline-item"><i class="fa fa-ge" title="AC"></i><span>AC</span></li>
                                                    <li class="list-inline-item"><i class="fa fa-road" title="Milage"></i><span>{{ intval($data["distance"]) }} km</span></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-5 info-right">
                                                <div class="item-mile">
                                                    <p><span>{{ __("PICK UP POINT") }}</span>: {{$car1}}</p>
                                                    <p><span>{{ __("DROP OFF POINT") }}</span>: {{$car2}}</p>
                                                    <p><span>{{ __("TRAVEL TIME") }}</span>: {{$data["travel_time"]}} dk</p>
                                                    <p><span>{{ __("PICK UP DATE") }}</span>: {{$date1}} {{$time1}}</p>
                                                    @if($return==1)
                                                        <p><span>{{ __("RETURN DATE") }}</span>: {{$date1}} {{$time1}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review">

                                        </div>
                                        <a href="{{ route("booking", $data['id']) }}" class="btn btn-theme xs-btn">{{ __("Make Reservation") }}</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                    }
                    }else {
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="text-align: center; padding: 50px;">
                            Aradığınız kriterlere uygun kayıt bulunamadı
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- End Car Listing -->
            </div>

        </div>
    </section>
    <!-- End Car View Section  -->

@endsection