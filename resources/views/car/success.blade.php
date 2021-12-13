@extends('layouts.front')

@section('content')

<!-- Start Page Title Section -->
<Section class="page-title dark-overlay-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>THANK YOU!</h3>
                <h4>Congratulations </h4>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title Section -->


<!-- Start Contact Section -->
<section class="section-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Start Section Title -->
                <div class="section-title text-center">
                    <h4>Booking Confirmed</h4>
                    <h2>THANK YOU!</h2>
                </div>
                <!-- End Section Title -->
            </div>
            <div class="col-sm-12">
                <div class="thanks-content text-center">
                    <h1><i class="fa fa-check"></i></h1>
                    <h2> Awesome! </h2>
                    <h3>Your Booking has been confirmed.</h3>
                    <p>We have received your Booking Details.<br> You will Receive a confirmation email shortly</p>
                    <p>Your Booking ID: <strong>{{$bookingId}}</strong></p>
                    <a class="btn btn-theme md-btn text-uppercase" href="/"><i class="fa fa-home"></i> Go to home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->

@endsection