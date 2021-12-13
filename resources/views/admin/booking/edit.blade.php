@extends('admin.layouts.app')

@section('content')

    @include('admin/base/_error', ['errors'=>$errors])
    @include('admin/base/_modal')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card {{ $item->status=="1" ? "card-info" : ($item->status=="99" ? "card-danger" : ($item->status=="2" ? "card-success":"") ) }}">
                        <div class="card-header">
                            <h3 class="card-title float-left">#{{ str_pad($item->id, 8, "0", STR_PAD_LEFT) }} Nolu Rezervasyon</h3>
                            <div class="float-right">
                                <a style="display: {{ $item->status!="1" && $item->status!="2" ? "inline-block" : "none" }}" href="{{ route("booking.status",["id"=>$item->id, "status"=>"1"]) }}" class="btn btn-info"><i class="fa fa-check"></i> ONAYLA</a>
                                <button style="display: {{ $item->status!="99" ? "inline-block" : "none" }}" data-title="Sipariş İptal" data-url="{{ route("booking.cancel",["id"=>$item->id]) }}" class="btn btn-danger modal-modal"><i class="fa fa-close"></i> İPTAL ET</button>
                                |
                                <button style="display: {{ $item->status=="1" ? "inline-block" : "none" }}" data-title="Sipariş Atama" data-url="{{ route("booking.assign", ["id"=>$item->id]) }}" class="btn btn-success modal-modal">SÜRÜCÜYE GÖNDER <i class="fa fa-arrow-circle-o-right"></i></button>
                                |
                                <a target="_blank" href="{{ route("booking.print", ["id"=>$item->id]) }}" class="btn btn-default"><i class="fa fa-print"></i> YAZDIR</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php print route($route_path.'.update',$item->id); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="card-body">
                                @include('admin/booking/_form')
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route($route_path.'.index') }}" class="btn btn-default"><i class="fa fa fa-arrow-circle-left"></i> Geri</a>
                                <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Kaydet</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection