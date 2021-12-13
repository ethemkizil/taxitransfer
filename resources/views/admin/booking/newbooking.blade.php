@extends('admin.layouts.app')

@section('content')

    @include('admin/base/_error', ['errors'=>$errors])

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">3. Rezervasyon Bilgileri</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php print route($route_path.'.store'); ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div id="passenger-info" class="tab-pane fade show active">

                                        @for ($i = 0; $i < $person; $i++)
                                            <div class="card-body">
                                                <h4>{{$i+1}}. {{ __("Passenger Information") }}</h4>
                                                <div class="booking-form">
                                                    <!-- Start Guest Details  -->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>{{ __("Firstname") }}</label>
                                                            <input type="text" name="passengers[{{$i}}][firstname]" class="form-control" value="{{ old('passengers')[$i]["firstname"] ? old('passengers')[$i]["firstname"] :"" }}" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>{{ __("Lastname") }}</label>
                                                            <input type="text" name="passengers[{{$i}}][lastname]" class="form-control" value="{{ old('passengers')[$i]["lastname"] ? old('passengers')[$i]["lastname"] :"" }}" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>{{ __("Email") }}</label>
                                                            <input type="email" name="passengers[{{$i}}][email]" class="form-control" value="{{ old('passengers')[$i]["email"] ? old('passengers')[$i]["email"] :"" }}" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>{{ __("Phone") }}</label>
                                                            <input type="text" name="passengers[{{$i}}][phonenumber]" class="form-control" value="{{ old('passengers')[$i]["phonenumber"] ? old('passengers')[$i]["phonenumber"] :"" }}" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>{{ __("Region Identity Number / Passport Number") }}</label>
                                                            <input type="text" name="passengers[{{$i}}][pid]" class="form-control" value="{{ old('passengers')[$i]["pid"] ? old('passengers')[$i]["pid"] :"" }}">
                                                        </div>
                                                        <div class="form-group col-md-12 text-center mt-3" STYLE="display: none">

                                                        </div>
                                                    </div>
                                                    <!-- End Guest Details  -->
                                                </div>
                                            </div>
                                        @endfor

                                        <div class="card-body">
                                            <h4>{{ __("Address Information") }}</h4>
                                            <div class="booking-form">
                                                <!-- Start Guest Details  -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>{{ __("Pickup Address") }}</label>
                                                        <textarea name="pickup_address" style="height: 100px;" class="form-control">{{ old('pickup_address') ? old('pickup_address') :"" }}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>{{ __("Drop Off Address") }}</label>
                                                        <textarea name="dropoff_address" style="height: 100px;" class="form-control">{{ old('dropoff_address') ? old('dropoff_address') :"" }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- End Guest Details  -->
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <h4>{{ __("Travel Information") }}</h4>
                                            <div class="booking-form">
                                                <!-- Start Guest Details  -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>{{ __("Flight Number") }}</label>
                                                        <input type="text" name="flight_number" class="form-control" value="{{ old('flight_number') ? old('flight_number') :"" }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>{{ __("Special ") }}</label>
                                                        <textarea name="special_requirement" style="height: 100px;" class="form-control">{{ old('special_requirement') ? old('special_requirement') :"" }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- End Guest Details  -->
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <h4>{{ __("Extras") }}</h4>
                                            <div class="booking-form">
                                                <!-- Start Guest Details  -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-3 text-center">
                                                        <div class="checkbox-inline">
                                                            <label for="baby">
                                                                <input type="checkbox" name="baby" id="baby" class="form-control">
                                                                {{ __("Baby Chair") }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 text-center">
                                                        <div class="checkbox">
                                                            <label for="baby2">
                                                                <input type="checkbox" name="baby2" id="baby2" class="form-control">
                                                                {{ __("+Baby Chair") }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Guest Details  -->
                                            </div>
                                        </div>

                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection