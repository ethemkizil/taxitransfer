@extends('layouts.front')

@section('content')

    <!-- Start Main Search Section -->
    <section>
        <div class="full-width-search" style="height: 650px;">
            <!-- Start Slider background -->
            <section class="bg-slider">
                <div class="slide">
                    <div class="slideshow owl-carousel">
                        <!-- Start Slider Backround Image  -->
                        <div class="item slider-1"></div>
                        <div class="item slider-2"></div>
                        <!-- End Slider Backround Image -->
                    </div>
                </div>
            </section>
            <!-- End Slider background  -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 search-section">
                        <div role="tabpanel">
                            <!-- Start Main Category Tab -->
                            <ul class="nav nav-tabs search-top" role="tablist" id="searchTab">
                                <!-- Start Tab -->
                                <li role="presentation" class="text-center nav-item">
                                    <a class="nav-link active show" href="#car" aria-controls="car" role="tab" data-toggle="tab"> <i class="fa fa-car"></i> <span>TRANSFER</span> </a>
                                </li>
                                <!-- End Tab -->
                                <!-- Start Tab -->
                                <li role="presentation" class="text-center nav-item">
                                    <a class="nav-link" href="#holiday" aria-controls="holiday" role="tab" data-toggle="tab"> <i class="fa fa-suitcase"></i> <span>{{ __("TOUR") }}</span> </a>
                                </li>
                                <!-- End Tab -->

                            </ul>
                            <!-- End Main Category Tab -->

                            <!-- Start Tab Content -->
                            <div class="tab-content">
                                <!-- Start Holidays Tab -->
                                <div role="tabpanel" class="tab-pane" id="holiday">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-md-12 product-search-title">{{ __("Select Tour Package") }}</div>

                                            <div class="col-md-4 col-sm-6 search-col-padding">
                                                <label>{{ __("TOUR TYPE") }}</label> <select class="form-control" name="tourCategoryId" id="tourCategoryId">
                                                    <option></option>
                                                    @foreach($tourCategories as $tourCategory)
                                                        <option value="{{$tourCategory->id}}">{{$tourCategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6 search-col-padding">
                                                <label>{{ __("LOCATION") }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="pack-destination-city" class="form-control" required placeholder="E.g. New York">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-marker fa-fw"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 col-sm-6 search-col-padding">
                                                <label>{{ __("START DATE") }}</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" placeholder="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar fa-fw"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-12 search-col-padding">
                                                <button type="submit" class="btn btn-theme md-btn text-uppercase mt-2">
                                                    {{__("SEARCH TOURS")}}
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Holidays Tab -->
                                <!-- Start Car Tab -->
                                <div role="tabpanel" class="tab-pane show active" id="car">
                                    <form method="get" action="/car">
                                        <div class="form-row">
                                            <div class="col-md-12 product-search-title">{{ __("Enter transfer details") }}</div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 return-select search-col-padding">
                                                <div class="radio checkbox" style="display: inline-block; margin-right: 20px;">
                                                    <label for="return1"> <input type="radio" name="return" id="return1" value="0" checked>
                                                        {{ __("One Way") }}
                                                    </label>
                                                </div>
                                                <div class="radio checkbox" style="display: inline-block">
                                                    <label for="return2"> <input type="radio" name="return" id="return2" value="1">
                                                        {{ __("Return") }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>{{ __("PICK UP POINT") }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="car_1" id="car_1" class="form-control" required placeholder="">
                                                    <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-marker fa-fw"></i>
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>{{ __("DROP OFF POINT") }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="car_2" id="car_2" class="form-control" required placeholder="">
                                                    <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-marker fa-fw"></i>
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-3 col-sm-6 search-col-padding">
                                                <label>{{ __("PICK UP DATE") }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="date1" class="form-control datepicker required" placeholder="" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar fa-fw"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 search-col-padding">
                                                <label>{{ __("ARRIVIAL") }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="time1" class="form-control timepicker required" placeholder="2:15 PM" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-clock-o fa-fw"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-6 search-col-padding">
                                                <label>{{ __("PASSENGER") }}</label> <select class="form-control" name="person">
                                                    <?php
                                                    for ($i = 1; $i < 12; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-6 search-col-padding">
                                                <label>{{ __("SUITCASE") }}</label> <select class="form-control" name="package_type">
                                                    @for ($i = 1; $i < 11; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row return-wrapper" id="return-wrapper" style="display: none;">
                                            <div class="col-md-3 col-sm-6 search-col-padding">
                                                <label>{{ __("RETURN DATE") }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="date2" class="form-control datepicker" placeholder="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar fa-fw"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 search-col-padding">
                                                <label>{{ __("DEPARTURE") }}</label>
                                                <div class="input-group">
                                                    <input type="text" name="time2" class="form-control timepicker" placeholder="2:15 PM">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-clock-o fa-fw"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <div class="form-row">
                                            <div class="col-md-12 search-col-padding">
                                                <button type="submit" class="btn btn-theme md-btn text-uppercase mt-2">
                                                    {{ __("SEARCH TRANSFER") }}
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Cruise Tab -->
                            </div>
                            <!-- End Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Main Search Section -->

    @foreach($homeContents as $content)
        {!! $content->content !!}
    @endforeach
@endsection