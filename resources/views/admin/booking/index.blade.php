@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $module_name }}
            <a href="{{route($route_path.'.create')}}" class="btn btn-primary pull-right" style="display: none;"><i class='fa fa-plus-circle'></i> Yeni Ekle</a>
        </h1>
    </section>

    @if(session()->has('success'))
        <div class="alert alert-success">
            <i class="fa fa-check"></i> {{ session()->get('success') }}
        </div>
    @endif

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $module_name }} Listesi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body no-padding">
                        <!-- /.box-header -->
                        @if(count($items) > 0)
                            <div class="table-responsive">

                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rezervasyon Zamanı</th>
                                        <th>Alış Zamanı</th>
                                        <th>Dönüş Zamanı</th>
                                        <th>Türü</th>
                                        <th>Ödeme Türü</th>
                                        <th>Toplam ücret</th>
                                        <th>Durum</th>
                                        <th width="80px">İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $key => $item)
                                        <tr class="{{ $item->status=="1" ? "bg-info" : ($item->status=="99" ? "bg-danger" : ($item->status=="2" ? "bg-success":"bg-warning") ) }}">
                                            <td>#{{ str_pad($item->id, 8, "0", STR_PAD_LEFT) }}</td>
                                            <td>{{ $item->booking_datetime }}</td>
                                            <td>{{ $item->pickup_datetime }}</td>
                                            <td>
                                                @if($item->type==2)
                                                {{ $item->dropoff_datetime }}
                                                @else
                                                ---
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->type==1)
                                                    Tek Yön
                                                @else
                                                    Gidiş Dönüş
                                                @endif
                                            </td>
                                            <td>Nakit Ödeme</td>
                                            <td>{{ $item->total_price }}</td>
                                            <td>
                                                @if($item->status==0)
                                                    Beklemede
                                                @elseif($item->status==1)
                                                    Onaylandı
                                                @elseif($item->status==2)
                                                    Sürücüye Gönderildi
                                                @elseif($item->status==99)
                                                    İptal Edildi
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-default btn-xs" href="{{ route($route_path.'.edit',$item->id) }}" style="color: #0c0c0c!important;">
                                                    Görüntüle
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center">
                                <br/> <b>Kayıt Bulunamadı</b><br/><br/>
                            </div>
                        @endif

                        {!! $items->appends(Request::all())->render() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection