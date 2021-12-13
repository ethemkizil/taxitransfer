@extends('admin.layouts.app')

@section('content')

    @include('admin/base/_error', ['errors'=>$errors])

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">1. Konum Seç</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php print route($route_path.'.select'); ?>" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="col-md-12 return-select search-col-padding">
                                    <div class="radio checkbox" style="display: inline-block; margin-right: 20px;">
                                        <label for="return1"> <input type="radio" name="return" id="return1" value="0" checked="">
                                            One Way
                                        </label>
                                    </div>
                                    <div class="radio checkbox" style="display: inline-block">
                                        <label for="return2"> <input type="radio" name="return" id="return2" value="1">
                                            Return
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_location_id" class="col-sm-2 control-label">Kalkış Noktası</label>
                                <div class="col-sm-12">
                                    <select name="start_location_id" id="start_location_id" class="form-control select2">
                                        <option></option>
                                        @foreach ($locations as $location)
                                            <option {{ isset($item) ? ($location->id == $item->start_location_id ? "selected" : "") : "" }} value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stop_location_id" class="col-sm-2 control-label">Varış Noktası</label>
                                <div class="col-sm-12">
                                    <select name="stop_location_id" id="stop_location_id" class="form-control">
                                        <option></option>
                                        @foreach ($locations as $location)
                                            <option {{isset($item) ? ($location->id == $item->stop_location_id ? "selected" : "") : ""}} value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-3">
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
                                    <div class="col-sm-3">
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
                                    <div class="col-sm-3">
                                        <label>{{ __("PASSENGER") }}</label> <select class="form-control" name="person">
                                            <?php
                                            for ($i = 1; $i < 12; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>{{ __("SUITCASE") }}</label> <select class="form-control" name="package_type">
                                            @for ($i = 1; $i < 11; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
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

                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Devam <i class="fa fa-arrow-right"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection
