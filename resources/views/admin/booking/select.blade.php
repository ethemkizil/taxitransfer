@extends('admin.layouts.app')

@section('content')

    @include('admin/base/_error', ['errors'=>$errors])

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">2. Araç Seç</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= route($route_path.'.new-booking'); ?>" method="get" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="vehicle_id" class="col-sm-2 control-label">Seyahat Aracı</label>
                                <div class="col-sm-10">
                                    <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle["id"] }}">{{ $vehicle["vehicle"]["name"] }}</option>
                                        @endforeach
                                    </select>
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