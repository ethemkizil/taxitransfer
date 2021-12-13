@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $module_name }}
            <a href="{{route($route_path.'.create')}}" class="btn btn-primary pull-right"><i
                        class='fa fa-plus-circle'></i> Yeni Ekle</a>
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
                        <h3 class="card-title">{{ $module_name }}</h3>
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
                                        <th>Plaka</th>
                                        <th>Açıklama</th>
                                        <th width="280px">İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $key => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->plate_number }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-xs"
                                                   href="{{ route($route_path.'.edit',$item->id) }}"><i
                                                            class="fa fa-edit"></i> Düzenle</a>
                                                <button type="button" data-toggle="modal"
                                                        data-target="#confirmDeleteModal-{{ $item->id }}"
                                                        class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Sil
                                                </button>
                                                <!-- Modal (Confirm Delete) -->
                                                <div class="modal fade" id="confirmDeleteModal-{{ $item->id }}"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Silme
                                                                    Onayı</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">&times;
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Kaydı silmek istediğinizden emin misiniz?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="POST"
                                                                      action="{{ route($route_path.'.destroy',$item->id) }}">
                                                                    <input type="hidden" name="_token"
                                                                           value="{{csrf_token()}}">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Cancel
                                                                    </button>
                                                                    <input type="submit" name="submit" value="Delete"
                                                                           class='btn btn-danger'>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center">
                                <br/>
                                <b>Kayıt Bulunamadı</b><br/><br/>
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