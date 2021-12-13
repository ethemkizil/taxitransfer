@extends('admin.layouts.print')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card {{ $item->status=="1" ? "card-info" : ($item->status=="99" ? "card-danger" : ($item->status=="2" ? "card-success":"") ) }}">
                        <div class="card-header">
                            <h3 class="card-title float-left">#{{ str_pad($item->id, 8, "0", STR_PAD_LEFT) }} Nolu Rezervasyon</h3>
                        </div>
                        <div class="card-body">
                            @include('admin/booking/_form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection