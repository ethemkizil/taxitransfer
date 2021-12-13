@extends('admin.layouts.app')

@section('content')

    @include('admin/base/_error', ['errors'=>$errors])

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{$module_name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php print route($route_path.'.update',$item->id); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="card-body">
                                @include('admin/invoice/_form')
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