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
                                            @if($location_start->locationType->name!="Havaalanı")
                                            <div class="form-group col-md-12">
                                                <label>{{ __("Pickup Address") }}</label>
                                                <textarea name="pickup_address" style="height: 100px;" class="form-control">{{ old('pickup_address') ? old('pickup_address') :"" }}</textarea>
                                            </div>
                                            @endif
                                            @if($location_stop->locationType->name!="Havaalanı")
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
                                        @if($location_start->locationType->name=="Havaalanı" || $location_stop->locationType->name=="Havaalanı")
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
                                <h4>{{__("Total Amount")}}: {{ $bookingDetails->price }} £</h4>
                                @else
                                <h4>{{__("Total Amount")}}: <span style="text-decoration: line-through">{{$bookingDetails->price*2}} £</span>
                                    {{ ceil(((100 - $transferReturnDiscount) / 100) * ($bookingDetails->price*2)) }} £
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
                            <li class="total">Amount due <span>{{$bookingDetails->price}} £</span></li>
                            @else
                            <li class="total">Amount due
                                <span style="text-decoration: line-through;">{{($bookingDetails->price*2) }}£ </span><br>
                                <span> {{ ceil(((100 - $transferReturnDiscount) / 100)* ($bookingDetails->price*2)) }}£</span>
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
                <h4 class="modal-title">HİZMET SATIŞ SÖZLEŞMESİ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                UYARI : İlgili yasa gereği lütfen aşağıdaki sözleşme metnimizi 16 punto ve koyu fontta print ederek okuyunuz. Ayrıca; internet sitemize üye olan ve alış veriş yapan her müşteri, tarafımızdan düzenlenmiş olan aşağıdaki satış sözleşmemizin tüm maddelerini başka bir ihbara gerek kalmadan okumuş ve kabul etmiş sayılır!
                <br><br>
                İşbu sözleşme 13.06.2003 tarih ve 25137 sayılı Resmi Gazetede yayınlanan Mesafeli Sözleşmeler Uygulama Usul ve Esasları Hakkında Yönetmelik gereği internet üzerinden gerçekleştiren satışlar için sözleşme yapılması zorunluluğuna istinaden düzenlenmiş olup, maddeler halinde aşağıdaki gibidir.
                <br><br>
                MADDE 1 - KONU
                <br><br>
                İşbu sözleşmenin konusu, SATICI'nın, ALICI'ya satışını yaptığı, aşağıda nitelikleri ve satış fiyatı belirtilen ürünün satışı ve teslimi ile ilgili olarak 4077 sayılı Tüketicilerin Korunması Hakkındaki Kanun-Mesafeli Sözleşmeleri Uygulama Esas ve Usulleri Hakkında Yönetmelik hükümleri gereğince tarafların hak ve yükümlülüklerinin kapsamaktadır.
                <br><br>
                MADDE 2.1 - SATICI BİLGİLERİ
                www.dalamanairport.com
                <br><br>
                <br><br>
                MADDE 2.2 - ALICI BİLGİLERİ
                <br><br>
                ALICI; Müşteri olarak "https://www.dalamanairport.com" alışveriş sitesine üye olan kişidir. Üye olurken kullanılan adres ve iletişim bilgileri esas alınır. Yanlış veya hatalı bilgiler ile üye olunması ve hizmet satın alınması tamamen ALICI'nın sorumluluğundadır. Başka kişi veya kişilerce izinli ya da izinsiz bu bilgilerin değiştirilmesinden ALICI sorumludur. Her üye kendine ait üyelik erişiminin güvenliğinden sorumludur. "www.dalamanairport.com" Kullanım Sözleşmesi"nde belirtilen tüm maddeler dikkatle okunup, uyulmalıdır.
                <br><br>
                MADDE 3 - SÖZLEŞME KONUSU ÜRÜN BİLGİLERİ
                <br><br>
                Hizmetin türü, hizmet alacak kişi sayısı, yeri, zamanı, satış bedeli, ödeme şekli, siparişin sonlandığı andaki bilgilerden oluşmaktadır. Bu bilgilerin doğru seçilmesi ve doğru sağlanmasından ALICI sorumludur.
                <br><br>
                MADDE 4 - GENEL HÜKÜMLER
                <br><br>
                4.1 - ALICI, Madde 3'te belirtilen sözleşme konusu hizmetin temel niteliklerini, satış fiyatını ve ödeme şekli ile hizmete ilişkin tüm ön bilgileri okuyup bilgi sahibi olduğunu ve elektronik ortamda gerekli teyidi verdiğini beyan eder.
                <br><br>
                4.2 - Sözleşme konusu hizmet, alıcının talep ettiği tarih ve yerde gerçekleştirilir, Satın alınan hizmet ve varsa ürünler hizmetin sağlandığı esnada ALICI'nın kullanımına sunulur. Kullanım süresi hizmetin tamamlanmasına müteakip sona erer.
                <br><br>
                4.3 - Sözleşme konusu hizmet, ALICI'dan başka bir kişi/kuruluşa sağlanacak ise, hizmet verilecek kişiye tarih, yer ve saat bilgisi ALICI tarafından aktarılmak zorundadır. Yanlış veya eksik bilgi aktarımından www.dalamanairport.com sorumlu tutulamaz.
                <br><br>
                4.4 www.dalamanairport.com, sözleşme konusu hizmetin, satın alım sırasında belirtilen yer, tarih ve saat bilgilerine uygun olarak gerçekleştirilmesinden sorumludur. www.dalamanairport.com bu hizmeti sağlamak amacıyla hizmeti taşere edebilir. Belirtilen koşullarda başka bir firma veya sözleşmeli olarak hizmet aldığı 3. kişilere, kurum veya kuruluşlara yaptırabilir.
                <br><br>
                4.5 - Sözleşme konusu hizmetin sağlanması için; işbu sözleşmenin web sitesi üzerindeki onay alanında tamamını okumak ve işaretlemek kaydıyla onaylanmış olarak www.dalamanairport.com'a ulaştırılmış olması ve bedelinin SATICI'nın sunduğu ödeme seçeneklerinin biriyle ödenmiş olması şarttır. Herhangi bir nedenle ürün bedeli ödenmez veya banka kayıtlarında iptal edilir ise,www.dalamanairport.com hizmetin ifa edilmesi yükümlülüğünden kurtulmuş kabul edilir.
                <br><br>
                4.6- www.dalamanairport.com mücbir sebepler veya ulaşımı engelleyen hava muhalefeti, ulaşımın kısmen veya tamamen kesilmesi gibi olağanüstü durumlar nedeni ile sözleşme konusu hizmeti sağlayamaz ise, durumu ALICI'ya bildirmekle yükümlüdür. Bu takdirde ALICI siparişin genel iptal kurallarına bakılmaksızın iptal edilmesini veya sözleşme konusu hizmetin engelleyici durumun ortadan kalkmasına kadar ertelenmesi haklarından birini kullanabilir. ALICI'nın siparişi belirtilen şartlara uygun olmak kaydıyla iptal etmesi halinde ödediği tutar 10 gün içinde ödemeyi gerçekleştirdiği hesabına defaten ödenir.
                <br><br>
                4.7- www.dalamanairport.com hizmet alımına esas olan satın alma işlemi sırasında belirtilen yolcu sayısına göre koltuk ayırmakla yükümlüdür. Belirtilen tarih ve saatte ALICI veya hizmetin sağlanmasını talep ettiği 3. kişi/kişiler hizmetin sağlanabilmesi için belirtilen noktada hazır olmalıdır. Havalimanı çıkışlı transferlerde, ALICI www.dalamanairport.com'un yetkili personeli ile buluştuktan sonra 45 dakika bekleyebileceğini kabul eder. Buluşma noktasında wwww.dalamanairport.com aracı/araçları önceden bilgi verilmeyen durumlarda en fazla 1 saat bekler. Havalimanı çıkışlı transferlerde uçak inişleri takip edilebildiği için belirtilen süre dikkate alınmayabilir. Aksi durumda ALICI'nın belirttiği saatten itibaren 1 saatten daha geç süreyle gelmeyen ALICI veya kişi/kişiler için hizmet verilmiş kabul edilir. Bu andan itibaren ALICI hiçbir hak iddia edemez. Para iadesi yapılmaz. Uzun mesafeli hizmetlerde kısmi ödeme yapıp yapmama www.dalamanairport.com inisiyatifindedir.
                <br><br>
                4.8- www.dalamanairport.com sitesi verdiği hizmet için fiyat hesaplamalarını Google harita hizmetlerini kullanarak yapmaktadır. www.dalamanairport.com altyapısına bağlı, yetkili veya yetkisiz kişilerin bilinçli yada bilinçsiz işlemlerine bağlı, Google harita servislerinde kaynaklı hesaplama, rota çizme gibi hatalı işlemlere ve bu gibi gerçek değerinin altında veya üstünde satın alındığı belirlenen yolcu taşıma hizmetleri gerçekleştirilmeden önce SATICI tarafından ALICI'ya bilgi aktarımı yapılarak, ilgili transfer için iptal işlemi gerçekleştirilir. ALICI'nın talebine uygun olarak yeni bir sipariş satın alması sağlanabilir.
                <br><br>
                4.8- www.dalamanairport.com sitesi verdiği hizmet için fiyat hesaplamalarını Google harita hizmetlerini kullanarak yapmaktadır. www.dalamanairport.com altyapısına bağlı, yetkili veya yetkisiz kişilerin bilinçli yada bilinçsiz işlemlerine bağlı, Google harita servislerinde kaynaklı hesaplama, rota çizme gibi hatalı işlemlere ve bu gibi gerçek değerinin altında veya üstünde satın alındığı belirlenen yolcu taşıma hizmetleri gerçekleştirilmeden önce SATICI tarafından ALICI'ya bilgi aktarımı yapılarak, ilgili transfer için iptal işlemi gerçekleştirilir. ALICI'nın talebine uygun olarak yeni bir sipariş satın alması sağlanabilir.
                <br><br>
                4.9- İşbu sözleşme, ALICI tarafından okudum kabul ediyorum onay kutusunu tıklaması neticesinde talebin www.dalamanairport.com sistemine kayıt edilmesinden itibaren geçerlidir.
                <br><br>
                MADDE 5 - CAYMA HAKKI / DEĞİŞİKLİK VE İPTAL İŞLEMLERİ
                <br><br>
                ALICI, sözleşme konusu hizmetin sağlanmasından on iki (12) saat öncesine kadar cayma hakkına sahiptir. Cayma hakkının kullanılması için bu süre içinde www.dalamanairport.com'a faks, email veya telefon ile bildirimde bulunulması şarttır. Bu hakkın kullanılması halinde,www.dalamanairport.com takip eden on (10) gün içinde hizmet bedelini ALICI'ya iade eder.
                <br><br>
                ALICI, sözleşme konusu hizmetin sağlanmasından altı (6) saat önceye kadar hizmetin başlangıç ve bitiş yeri ile hizmet saatini değiştirme, erteleme hakkına sahiptir. Değişiklik hakkının kullanılması için bu süre içinde www.dalamanairport.com'a telefonla veya canlı destek birimlerine iletmek kaydı ile bildirimde bulunulmuş olması gerekir. Erteleme işlemi en fazla otuz (30) takvim günü sonrasına yapılabilir.
                <br><br>
                Hizmete ait fatura, hizmetin gerçekleşmesi halinde düzenlenir. ALICI'ya sunulan seçenekler içerisinden ALICI'nın talep ettiği şekilde fatura teslimi gerçekleştirilir.
                <br><br>
                Fatura edilmiş hizmetlerin, ALICI'dan kaynaklı iptali veya aksamasına bağlı olarak oluşabilecek tam veya kısmi para iadelerinde KDV ve varsa sair yasal yükümlülükler iade edilemez. Aksaklık veya iptal durumu www.dalamanairport.com kaynaklı ise ödemenin tamamı ALICI hesabına geri iade edilir.
                <br><br>
                Ayrıca, tüketicinin özel istek ve talepleri uyarınca üretilen veya üzerinde değişiklik ya da ilaveler yapılarak kişiye özel hale getirilen hizmetlerde, Kampanya ve diğer yapılabilecek promosyon özellikli satışlarda İptal işlemi gerçekleştirilemez, ALICI cayma hakkını kullanamaz. Ancak otuz (30) takvim günü içerisinde kullanılmak üzere değişiklik kurallarına uygun olarak erteleme hakkını kullanabilir.
                <br><br>
                İşbu sözleşmenin uygulanmasında, Sanayi ve Ticaret Bakanlığınca ilan edilen değere kadar Tüketici Hakem Heyetleri ile www.dalamanairport.com'un yerleşim yerindeki Tüketici Mahkemeleri yetkilidir.
                <br><br>
                Siparişin sonuçlanması durumunda ALICI işbu sözleşmenin tüm koşullarını kabul etmiş sayılacaktır.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection