@extends('layouts.front')

@section('content')

<!-- Start Page Title Section -->
<Section class="page-title dark-overlay car-header" style="background: url('/uploads/vehicle/{{ $bookingDetails->vehicle->picture}}')">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>{{ $bookingDetails->vehicle->name }}</h3>
                <p>{{ $bookingDetails->vehicle->description }}</p>
                <p>
                    <span><i class="fa fa-map-marker"></i> {{ $bookingDetails->startLocation->name }} <i class="fa fa-long-arrow-right"></i>{{ $bookingDetails->stopLocation->name }} </span>
                </p>
                <p><span><i class="fa fa-arrow-right"></i></span><span><i class="fa fa-calendar"></i>{{$date1}} </span><span><i class="fa fa-clock-o"></i> {{$time1}} </span></p>
                @if($return==1)
                <p><span><i class="fa fa-arrow-left"></i></span><span><i class="fa fa-calendar"></i>{{$date2}} </span><span><i class="fa fa-clock-o"></i> {{$time2}} </span></p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- End Page Title Section -->

<!-- Start Tour BookingMail Details Section  -->
<section class="section-wrapper booking-detail pt-0">
    <div class="container">

        @include('admin/base/_error', ['errors'=>$errors])

        <div class="row">
            <div class="col-lg-8 col-md-7" style="padding-top: 30px;">
                <!-- Start Tour BookingMail Tab Content  -->
                <div class="tab-content">
                	<form method="post" action="">
                	{!! csrf_field() !!}
                        <!-- Start Passenger info Tab Content  -->
                        <div id="passenger-info" class="tab-pane fade show active">

                        	@for ($i = 0; $i < $person; $i++)
                            <div class="login-box">
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

                                <div class="login-box">
                                    <h4>{{ __("Address Information") }}</h4>
                                    <div class="booking-form">
                                        <!-- Start Guest Details  -->
                                        <div class="form-row">
                                            @if($location_start->locationType->name!="Havaalan??")
                                            <div class="form-group col-md-12">
                                                <label>{{ __("Pickup Address") }}</label>
                                                <textarea name="pickup_address" style="height: 100px;" class="form-control">{{ old('pickup_address') ? old('pickup_address') :"" }}</textarea>
                                            </div>
                                            @endif
                                            @if($location_stop->locationType->name!="Havaalan??")
                                            <div class="form-group col-md-12">
                                                <label>{{ __("Drop Off Address") }}</label>
                                                <textarea name="dropoff_address" style="height: 100px;" class="form-control">{{ old('dropoff_address') ? old('dropoff_address') :"" }}</textarea>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- End Guest Details  -->
                                    </div>
                                </div>
    						
    						<div class="login-box">
                                <h4>{{ __("Travel Information") }}</h4>
                                <div class="booking-form">
                                    <!-- Start Guest Details  -->
                                    <div class="form-row">
                                        @if($location_start->locationType->name=="Havaalan??" || $location_stop->locationType->name=="Havaalan??")
                                        <div class="form-group col-md-12">
                                            <label>{{ __("Flight Number") }}</label>
                                            <input type="text" name="flight_number" class="form-control" value="{{ old('flight_number') ? old('flight_number') :"" }}">
                                        </div>
                                        @endif
                                        <div class="form-group col-md-12">
                                            <label>{{ __("Special ") }}</label>
                                            <textarea name="special_requirement" style="height: 100px;" class="form-control">{{ old('special_requirement') ? old('special_requirement') :"" }}</textarea>
                                        </div>
                                    </div>
                                    <!-- End Guest Details  -->
                                </div>
                            </div>

                            <div class="login-box">
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
                            
                            <div class="login-box" style="margin-top: 30px;">
                                @if($return==0)
                                <h4>{{__("Total Amount")}}: {{ $bookingDetails->price }} ??</h4>
                                @else
                                <h4>{{__("Total Amount")}}: <span style="text-decoration: line-through">{{$bookingDetails->price*2}} ??</span>
                                    {{ ceil(((100 - $transferReturnDiscount) / 100) * ($bookingDetails->price*2)) }} ??
                                </h4>
                                @endif
                                <div class="booking-form">
                                    <!-- Start Paypal Payment  -->
                                    <div class="paypal-pay">
                                        <h5>{{__("pay on arrivial")}}</h5>
                                        <div class="col-md-12 form-group">
                                            <label><input type="checkbox" name="agreement" value="1" required>
                                                <a href="#" role="button" data-toggle="modal" data-target="#agrr_{{ app()->getLocale() }}">{{__("I have read and approved the Terms & Conditions")}}</a>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 text-center">
                                                <span><i class="fa fa-money"></i></span>
                                            </div>
                                            <div class="col-lg-10 align-self-center">
                                                <button class="btn btn-theme md-btn" type="submit">{{__("BOOKING NOW")}} <i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <!-- End Passenger info Tab Content  -->
                    
                    </form>
                </div>
                <!-- End Tour BookingMail Tab Content  -->
            </div>
            <!-- Start BookingMail Sidebar  -->
            <div class="col-lg-4 col-md-5 booking-sidebar" style="padding-top: 30px;">
                <!-- Start Sidebar Widget  -->
                <div class="sidebar-item sidebar-booking-summary">
                    <h5><i class="fa fa-bookmark"></i>{{ __("SELECTION") }}</h5>
                    <div class="sidebar-item-body">
                        <ul class="bordered-li">
                            <li>Date <span>{{ $date1 }} - {{$time1}} </span></li>
                            @if($return==1)
                            <li>Return Date <span>{{ $date2 }} - {{$time2}} </span></li>
                            @endif
                            <li>Car <span>{{ $bookingDetails->vehicle->name }}</span></li>
                            <li>Total Persons <span>{{$person}}</span></li>
                            <li>Pick Up <span>{{ $bookingDetails->startLocation->name }}</span></li>
                            <li>Drop Off <span>{{ $bookingDetails->stopLocation->name }}</span></li>
                            @if($return==0)
                            <li class="total">Amount due <span>{{$bookingDetails->price}} ??</span></li>
                            @else
                            <li class="total">Amount due
                                <span style="text-decoration: line-through;">{{($bookingDetails->price*2) }}?? </span><br>
                                <span> {{ ceil(((100 - $transferReturnDiscount) / 100)* ($bookingDetails->price*2)) }}??</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- End Sidebar Widget  -->

                <!-- Start Sidebar Widget  -->
                <div class="sidebar-item contact-box">
                    <h5><i class="fa fa-phone"></i>{{ __("HELP YOU NEED?") }}</h5>
                    <div class="sidebar-item-body">
                        <p>Need Help? Call us or drop a message. Our agents will be in touch shortly.</p>
                        <p><i class="fa fa-phone"></i> +90 542 557 76 76</p>
                        <p><i class="fa fa-envelope-o"></i> <a href="mailto:info@dalamanairport.com">info@dalamanairport.com</a></p>
                    </div>
                </div>
                <!-- End Sidebar Widget  -->
            </div>
            <!-- End BookingMail Sidebar  -->
        </div>
    </div>
</section>
<!-- End Tour BookingMail Details Section  -->


<div class="modal fade" tabindex="-1" role="dialog" id="agrr_en">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Terms & Conditions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                IMPORTANT! Please read the following Booking Conditions carefully.<br>
                Introduction<br>
                <br><br>
                Upon booking a transfer, you will be sent an e-mail confirmation of your booking in the form of a Transfer Voucher, at the time that the confirmation is sent the booking is confirmed.
                <br><br>
                The date of the booking is the date that appears on the e-mail confirmation.
                <br><br>
                All bookings are subject to these Booking Conditions.
                <br><br>
                Once the booking has been confirmed, the transfer provider is responsible to you to provide you with the services requested.
                <br><br>
                Please note: Upon receipt of your Transfer Voucher it is important to carefully check the details of your booking.
                <br><br>
                In parties of two or more passengers, the person making the booking ("Lead Passenger") accepts responsibility for all payments for all members of the party. All vouchers and correspondence will be sent to the Lead Passenger. The Lead Passenger in turn has to ensure that all members of the party are kept fully informed.
                <br><br>
                Extra luggage or oversized items may carry an additional charge or require specialised transportation. Please add a note in the special request field on our booking page to ensure that we are aware of any extra pieces of luggage.
                <br><br>
                Shuttle Transfers: Please note that your shuttle transfer duration may vary depending on how many stops have to be made on the way to your accommodation.
                Paying for your booking
                <br><br>
                We do accept one type of payments,
                <br><br>
                Pay on Arrival, If this type of payment is selected, you will be asked to make the full payment on your arrival at your destination airport in cash in Sterlings ( British Pounds ), or in Euros or  local currency can be accepted but then the local Exchange rates will be involved.
                <br><br>
                <br><br>
                Amendments to your existing booking
                <br><br>
                You may cancel your booking at any time using our customer service form or requesting cancellation via e-mail sent to info@dalamanairport.com.
                <br><br>
                Holiday Insurance
                <br><br>
                It is highly recommended that adequate holiday insurance is taken out and this is your responsibility. The insurance should cover, amongst other things, the cost of cancellation by yourself, all medical costs and the cost of assistance including return to the UK in the event of an accident or illness.
                Our responsibility to you for your Booking
                <br><br>
                As we are acting only as a booking agent, we have no liability for any of the transfer arrangements and in particular, to the extent permissible by law, no liability for any illness, personal injury, death or loss of any kind, unless caused by our negligence. Any claim for damages due to injury, illness or death arising from your use of the transfer services, must be brought against the operator of the transfer services and will be under the jurisdiction of the law of the country in which the transfer is being provided.
                Indemnity
                <br><br>
                Upon booking your transfer through dalamanairport.com, you accept responsibility for the proper conduct of yourself and your party during the transfer. The transfer provider reserves the right at any time to terminate (before or after departure) your booking or that of any member of your party due to your/their misconduct, within their reasonable opinion.
                <br><br>
                If your actions or those of any member of your party causes damage during the transfer, you agree to fully indemnify us against any claim (including reasonable legal costs) made against dalamanairport.com by the transfer provider. Lastly, you are also liable for reimbursing the transfer provider for any damage caused, before you arrive at your destination.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="agrr_tr">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">H??ZMET SATI?? S??ZLE??MES??</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                UYARI : ??lgili yasa gere??i l??tfen a??a????daki s??zle??me metnimizi 16 punto ve koyu fontta print ederek okuyunuz. Ayr??ca; internet sitemize ??ye olan ve al???? veri?? yapan her m????teri, taraf??m??zdan d??zenlenmi?? olan a??a????daki sat???? s??zle??memizin t??m maddelerini ba??ka bir ihbara gerek kalmadan okumu?? ve kabul etmi?? say??l??r!
                <br><br>
                ????bu s??zle??me 13.06.2003 tarih ve 25137 say??l?? Resmi Gazetede yay??nlanan Mesafeli S??zle??meler Uygulama Usul ve Esaslar?? Hakk??nda Y??netmelik gere??i internet ??zerinden ger??ekle??tiren sat????lar i??in s??zle??me yap??lmas?? zorunlulu??una istinaden d??zenlenmi?? olup, maddeler halinde a??a????daki gibidir.
                <br><br>
                MADDE 1 - KONU
                <br><br>
                ????bu s??zle??menin konusu, SATICI'n??n, ALICI'ya sat??????n?? yapt??????, a??a????da nitelikleri ve sat???? fiyat?? belirtilen ??r??n??n sat?????? ve teslimi ile ilgili olarak 4077 say??l?? T??keticilerin Korunmas?? Hakk??ndaki Kanun-Mesafeli S??zle??meleri Uygulama Esas ve Usulleri Hakk??nda Y??netmelik h??k??mleri gere??ince taraflar??n hak ve y??k??ml??l??klerinin kapsamaktad??r.
                <br><br>
                MADDE 2.1 - SATICI B??LG??LER??
                www.dalamanairport.com
                <br><br>
                <br><br>
                MADDE 2.2 - ALICI B??LG??LER??
                <br><br>
                ALICI; M????teri olarak "https://www.dalamanairport.com" al????veri?? sitesine ??ye olan ki??idir. ??ye olurken kullan??lan adres ve ileti??im bilgileri esas al??n??r. Yanl???? veya hatal?? bilgiler ile ??ye olunmas?? ve hizmet sat??n al??nmas?? tamamen ALICI'n??n sorumlulu??undad??r. Ba??ka ki??i veya ki??ilerce izinli ya da izinsiz bu bilgilerin de??i??tirilmesinden ALICI sorumludur. Her ??ye kendine ait ??yelik eri??iminin g??venli??inden sorumludur. "www.dalamanairport.com" Kullan??m S??zle??mesi"nde belirtilen t??m maddeler dikkatle okunup, uyulmal??d??r.
                <br><br>
                MADDE 3 - S??ZLE??ME KONUSU ??R??N B??LG??LER??
                <br><br>
                Hizmetin t??r??, hizmet alacak ki??i say??s??, yeri, zaman??, sat???? bedeli, ??deme ??ekli, sipari??in sonland?????? andaki bilgilerden olu??maktad??r. Bu bilgilerin do??ru se??ilmesi ve do??ru sa??lanmas??ndan ALICI sorumludur.
                <br><br>
                MADDE 4 - GENEL H??K??MLER
                <br><br>
                4.1 - ALICI, Madde 3'te belirtilen s??zle??me konusu hizmetin temel niteliklerini, sat???? fiyat??n?? ve ??deme ??ekli ile hizmete ili??kin t??m ??n bilgileri okuyup bilgi sahibi oldu??unu ve elektronik ortamda gerekli teyidi verdi??ini beyan eder.
                <br><br>
                4.2 - S??zle??me konusu hizmet, al??c??n??n talep etti??i tarih ve yerde ger??ekle??tirilir, Sat??n al??nan hizmet ve varsa ??r??nler hizmetin sa??land?????? esnada ALICI'n??n kullan??m??na sunulur. Kullan??m s??resi hizmetin tamamlanmas??na m??teakip sona erer.
                <br><br>
                4.3 - S??zle??me konusu hizmet, ALICI'dan ba??ka bir ki??i/kurulu??a sa??lanacak ise, hizmet verilecek ki??iye tarih, yer ve saat bilgisi ALICI taraf??ndan aktar??lmak zorundad??r. Yanl???? veya eksik bilgi aktar??m??ndan www.dalamanairport.com sorumlu tutulamaz.
                <br><br>
                4.4 www.dalamanairport.com, s??zle??me konusu hizmetin, sat??n al??m s??ras??nda belirtilen yer, tarih ve saat bilgilerine uygun olarak ger??ekle??tirilmesinden sorumludur. www.dalamanairport.com bu hizmeti sa??lamak amac??yla hizmeti ta??ere edebilir. Belirtilen ko??ullarda ba??ka bir firma veya s??zle??meli olarak hizmet ald?????? 3. ki??ilere, kurum veya kurulu??lara yapt??rabilir.
                <br><br>
                4.5 - S??zle??me konusu hizmetin sa??lanmas?? i??in; i??bu s??zle??menin web sitesi ??zerindeki onay alan??nda tamam??n?? okumak ve i??aretlemek kayd??yla onaylanm???? olarak www.dalamanairport.com'a ula??t??r??lm???? olmas?? ve bedelinin SATICI'n??n sundu??u ??deme se??eneklerinin biriyle ??denmi?? olmas?? ??artt??r. Herhangi bir nedenle ??r??n bedeli ??denmez veya banka kay??tlar??nda iptal edilir ise,www.dalamanairport.com hizmetin ifa edilmesi y??k??ml??l??????nden kurtulmu?? kabul edilir.
                <br><br>
                4.6- www.dalamanairport.com m??cbir sebepler veya ula????m?? engelleyen hava muhalefeti, ula????m??n k??smen veya tamamen kesilmesi gibi ola??an??st?? durumlar nedeni ile s??zle??me konusu hizmeti sa??layamaz ise, durumu ALICI'ya bildirmekle y??k??ml??d??r. Bu takdirde ALICI sipari??in genel iptal kurallar??na bak??lmaks??z??n iptal edilmesini veya s??zle??me konusu hizmetin engelleyici durumun ortadan kalkmas??na kadar ertelenmesi haklar??ndan birini kullanabilir. ALICI'n??n sipari??i belirtilen ??artlara uygun olmak kayd??yla iptal etmesi halinde ??dedi??i tutar 10 g??n i??inde ??demeyi ger??ekle??tirdi??i hesab??na defaten ??denir.
                <br><br>
                4.7- www.dalamanairport.com hizmet al??m??na esas olan sat??n alma i??lemi s??ras??nda belirtilen yolcu say??s??na g??re koltuk ay??rmakla y??k??ml??d??r. Belirtilen tarih ve saatte ALICI veya hizmetin sa??lanmas??n?? talep etti??i 3. ki??i/ki??iler hizmetin sa??lanabilmesi i??in belirtilen noktada haz??r olmal??d??r. Havaliman?? ????k????l?? transferlerde, ALICI www.dalamanairport.com'un yetkili personeli ile bulu??tuktan sonra 45 dakika bekleyebilece??ini kabul eder. Bulu??ma noktas??nda wwww.dalamanairport.com arac??/ara??lar?? ??nceden bilgi verilmeyen durumlarda en fazla 1 saat bekler. Havaliman?? ????k????l?? transferlerde u??ak ini??leri takip edilebildi??i i??in belirtilen s??re dikkate al??nmayabilir. Aksi durumda ALICI'n??n belirtti??i saatten itibaren 1 saatten daha ge?? s??reyle gelmeyen ALICI veya ki??i/ki??iler i??in hizmet verilmi?? kabul edilir. Bu andan itibaren ALICI hi??bir hak iddia edemez. Para iadesi yap??lmaz. Uzun mesafeli hizmetlerde k??smi ??deme yap??p yapmama www.dalamanairport.com inisiyatifindedir.
                <br><br>
                4.8- www.dalamanairport.com sitesi verdi??i hizmet i??in fiyat hesaplamalar??n?? Google harita hizmetlerini kullanarak yapmaktad??r. www.dalamanairport.com altyap??s??na ba??l??, yetkili veya yetkisiz ki??ilerin bilin??li yada bilin??siz i??lemlerine ba??l??, Google harita servislerinde kaynakl?? hesaplama, rota ??izme gibi hatal?? i??lemlere ve bu gibi ger??ek de??erinin alt??nda veya ??st??nde sat??n al??nd?????? belirlenen yolcu ta????ma hizmetleri ger??ekle??tirilmeden ??nce SATICI taraf??ndan ALICI'ya bilgi aktar??m?? yap??larak, ilgili transfer i??in iptal i??lemi ger??ekle??tirilir. ALICI'n??n talebine uygun olarak yeni bir sipari?? sat??n almas?? sa??lanabilir.
                <br><br>
                4.8- www.dalamanairport.com sitesi verdi??i hizmet i??in fiyat hesaplamalar??n?? Google harita hizmetlerini kullanarak yapmaktad??r. www.dalamanairport.com altyap??s??na ba??l??, yetkili veya yetkisiz ki??ilerin bilin??li yada bilin??siz i??lemlerine ba??l??, Google harita servislerinde kaynakl?? hesaplama, rota ??izme gibi hatal?? i??lemlere ve bu gibi ger??ek de??erinin alt??nda veya ??st??nde sat??n al??nd?????? belirlenen yolcu ta????ma hizmetleri ger??ekle??tirilmeden ??nce SATICI taraf??ndan ALICI'ya bilgi aktar??m?? yap??larak, ilgili transfer i??in iptal i??lemi ger??ekle??tirilir. ALICI'n??n talebine uygun olarak yeni bir sipari?? sat??n almas?? sa??lanabilir.
                <br><br>
                4.9- ????bu s??zle??me, ALICI taraf??ndan okudum kabul ediyorum onay kutusunu t??klamas?? neticesinde talebin www.dalamanairport.com sistemine kay??t edilmesinden itibaren ge??erlidir.
                <br><br>
                MADDE 5 - CAYMA HAKKI / DE????????KL??K VE ??PTAL ????LEMLER??
                <br><br>
                ALICI, s??zle??me konusu hizmetin sa??lanmas??ndan on iki (12) saat ??ncesine kadar cayma hakk??na sahiptir. Cayma hakk??n??n kullan??lmas?? i??in bu s??re i??inde www.dalamanairport.com'a faks, email veya telefon ile bildirimde bulunulmas?? ??artt??r. Bu hakk??n kullan??lmas?? halinde,www.dalamanairport.com takip eden on (10) g??n i??inde hizmet bedelini ALICI'ya iade eder.
                <br><br>
                ALICI, s??zle??me konusu hizmetin sa??lanmas??ndan alt?? (6) saat ??nceye kadar hizmetin ba??lang???? ve biti?? yeri ile hizmet saatini de??i??tirme, erteleme hakk??na sahiptir. De??i??iklik hakk??n??n kullan??lmas?? i??in bu s??re i??inde www.dalamanairport.com'a telefonla veya canl?? destek birimlerine iletmek kayd?? ile bildirimde bulunulmu?? olmas?? gerekir. Erteleme i??lemi en fazla otuz (30) takvim g??n?? sonras??na yap??labilir.
                <br><br>
                Hizmete ait fatura, hizmetin ger??ekle??mesi halinde d??zenlenir. ALICI'ya sunulan se??enekler i??erisinden ALICI'n??n talep etti??i ??ekilde fatura teslimi ger??ekle??tirilir.
                <br><br>
                Fatura edilmi?? hizmetlerin, ALICI'dan kaynakl?? iptali veya aksamas??na ba??l?? olarak olu??abilecek tam veya k??smi para iadelerinde KDV ve varsa sair yasal y??k??ml??l??kler iade edilemez. Aksakl??k veya iptal durumu www.dalamanairport.com kaynakl?? ise ??demenin tamam?? ALICI hesab??na geri iade edilir.
                <br><br>
                Ayr??ca, t??keticinin ??zel istek ve talepleri uyar??nca ??retilen veya ??zerinde de??i??iklik ya da ilaveler yap??larak ki??iye ??zel hale getirilen hizmetlerde, Kampanya ve di??er yap??labilecek promosyon ??zellikli sat????larda ??ptal i??lemi ger??ekle??tirilemez, ALICI cayma hakk??n?? kullanamaz. Ancak otuz (30) takvim g??n?? i??erisinde kullan??lmak ??zere de??i??iklik kurallar??na uygun olarak erteleme hakk??n?? kullanabilir.
                <br><br>
                ????bu s??zle??menin uygulanmas??nda, Sanayi ve Ticaret Bakanl??????nca ilan edilen de??ere kadar T??ketici Hakem Heyetleri ile www.dalamanairport.com'un yerle??im yerindeki T??ketici Mahkemeleri yetkilidir.
                <br><br>
                Sipari??in sonu??lanmas?? durumunda ALICI i??bu s??zle??menin t??m ko??ullar??n?? kabul etmi?? say??lacakt??r.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection