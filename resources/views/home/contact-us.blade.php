@extends('layouts.front')

@section('content')
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <section class="page-title dark-overlay-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>{{ __('CONTACT US') }}</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Contact Section -->
    <section class="section-wrapper">
        <div class="container">
            <div class="row">

                @if($send===true)
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h4>Your message has been sent successfully.</h4>
                        <h2>THANK YOU!</h2>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <!-- Start Section Title -->
                    <div class="section-title text-center">
                        <h4>Fill out the form we'll be in touch soon!</h4>
                        <h2>Send a Message</h2>
                    </div>
                    <!-- End Section Title -->
                </div>
                <div class="col-md-12 contact-form">
                    <!-- Start Contact Form -->
                    <form action="" method="post">
                        {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" name="name" required class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="email" name="email" required class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="mobile" class="form-control" placeholder="Your Contact Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" id="comment" placeholder="Your Message"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-respond text-center"></div>
                        </div>

                        <div class="form-group">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfyD4YUAAAAALfy4fniqZakb8T1pRYMXR280kLk">
                            </div>
                        </div>

                        <div class="form-group text-center mb-0">
                            <button type="submit" class="btn btn-theme md-btn">SEND YOUR MESSAGE</button>
                        </div>
                    </form>
                    <!-- End Contact Form -->
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Contact Section -->


    <!-- Start Address Section -->
    <section class="section-wrapper address-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <i class="fa fa-map-marker"></i>
                        <p>Ege Mh., 48770 Dalaman/Muğla</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <i class="fa fa-envelope-o"></i>
                        <p><a href="mailto:support@email.com">info@dalamanairport.com</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <i class="fa fa-phone"></i>
                        <p>+90 542 557 76 76</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Address Section -->

    <!-- Start Map Section -->
    <section class="section-wrapper pb-0 pt-0">
        <div class="container-fluid clear-padding">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="embed-responsive embed-responsive-21by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12792.737907533774!2d28.7933172!3d36.7181305!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcaf246be6efae4da!2sDalaman+Havaliman%C4%B1!5e0!3m2!1str!2str!4v1546043313584"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Map Section -->

@endsection