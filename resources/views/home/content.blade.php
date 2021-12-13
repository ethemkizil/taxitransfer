@extends('layouts.front')

@section('content')

    <section class="page-title dark-overlay-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>{{$content->name}}</h3>
                </div>
            </div>
        </div>
    </section>



    <section class="section-wrapper">
        <div class="container" style="min-height: 500px">
            <div class="row">
                <div class="col-md-12">
                    {!! $content->content !!}
                </div>
            </div>
        </div>
    </section>

@endsection