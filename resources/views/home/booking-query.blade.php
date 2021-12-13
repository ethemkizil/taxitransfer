@extends('layouts.front')

@section('content')
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <section class="page-title dark-overlay-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>{{ __('BOOKING QUERY') }}</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Contact Section -->
    <section class="section-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-md-12 contact-form">
                    <!-- Start Contact Form -->
                    <form action="" method="post">
                        {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                <input type="text" name="reservationId" required class="form-control" placeholder="Reservation Number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4"></div>
                            <div class="form-group text-center col-md-4">
                                <button type="submit" class="btn btn-theme md-btn">{{ __("GET RESERVATION DETAILS") }}</button>
                            </div>
                        </div>

                    </form>
                    <!-- End Contact Form -->
                </div>

            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card {{ $item->status=="1" ? "card-info" : ($item->status=="99" ? "card-danger" : ($item->status=="2" ? "card-success":"") ) }}">
                        <div class="card-header">
                            <h3 class="card-title float-left">#{{ str_pad($item->id, 8, "0", STR_PAD_LEFT) }} Nolu Rezervasyon</h3>
                        </div>

                        <div class="card-body">

                            @if(strlen($item->cancel_reason)>0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered detail-view">
                                            <tr><th>İptal Nedeni</th><td>{{$item->cancel_reason}}</td></tr>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                @if(intval($item->driver_id)>0)
                                    <div class="col-md-6">
                                        <diV>
                                            <h2>Sürücü Bilgileri</h2>
                                        </diV>
                                        <div>
                                            <table class="table table-striped table-bordered detail-view">
                                                <tr><th>Sürücü Adı</th><td>{{$item->driver->firstname}}</td></tr>
                                                <tr><th>Sürücü Soyadı</th><td>{{$item->driver->lastname}}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if(intval($item->plate_id)>0)
                                    <div class="col-md-6">
                                        <diV>
                                            <h2>Plaka Bilgileri</h2>
                                        </diV>
                                        <div>
                                            <table class="table table-striped table-bordered detail-view">
                                                <tr><th>Plaka</th><td>{{$item->plate->plate_number}}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <h2>Rezervasyon Bilgileri</h2>
                                    </div>
                                    <div>
                                        <table class="table table-striped table-bordered detail-view">
                                            <tr><th>Türü</th><td>
                                                    @if($item->type==1)
                                                        Tek Yön
                                                    @else
                                                        Gidiş Dönüş
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr><th>Rezervasyon Tarihi</th><td>{{$item->booking_datetime}}</td></tr>
                                            <tr><th>Başlangıç Yeri</th><td>{{$item->startLocation->name}}</td></tr>
                                            <tr><th>Varış Yeri</th><td>{{$item->stopLocation->name}}</td></tr>
                                            <tr><th>Araç</th><td>{{$item->vehicle->name}}</td></tr>

                                        </table>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <h2>Yolcu Bilgisi</h2>
                                    </div>
                                    <div>
                                        @foreach($bookingDetails as $customer)
                                            <table class="table table-striped table-bordered detail-view">
                                                <tr><th>Adı</th><td>{{$customer->name}}</td></tr>
                                                <tr><th>Soyadı</th><td>{{$customer->surname}}</td></tr>
                                                <tr><th>Telefon</th><td>{{$customer->phone}}</td></tr>
                                                <tr><th>Email</th><td>{{$customer->email}}</td></tr>
                                                <tr><th>Tc / Pasaport</th><td>{{$customer->pid}}</td></tr>
                                            </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <h2>Adres Bilgileri</h2>
                                    </div>
                                    <div>
                                        <table class="table table-striped table-bordered detail-view">
                                            <tr><th>Alınacağı Adres</th><td>{{$item->pickup_address}}</td></tr>
                                            <tr><th>Bırakılacağı Adres</th><td>{{$item->dropoff_address}}</td></tr>
                                        </table>
                                    </div>
                                    <div>
                                        <h2>Diğer Bilgiler</h2>
                                    </div>
                                    <div>
                                        <table class="table table-striped table-bordered detail-view">
                                            <tr><th>Uçuş Numarası</th><td>{{$item->flight_number}}</td></tr>
                                            <tr><th>Özel İstekler</th><td>{{$item->special_requirement}}</td></tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div>
                                        <h2>Ödeme Bilgisi</h2>
                                    </div>
                                    <div>
                                        <table class="table table-striped table-bordered detail-view">
                                            <tr><th>Ödeme Türü</th><td>Nakit</td></tr>
                                            <tr><th>Transfer Fiyatı</th><td>{{$item->transfer_price}}</td></tr>
                                            <tr><th>Toplam Fiyat</th><td>{{$item->total_price}}</td></tr>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

@endsection