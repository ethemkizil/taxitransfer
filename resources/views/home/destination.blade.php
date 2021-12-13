@extends('layouts.front')

@section('content')

    <section class="page-title dark-overlay-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(app()->getLocale()=="tr")
                    <h3>{{$content->name}}</h3>
                    @else
                    <h3>{{$content->name_eng}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>



    <section class="section-wrapper">
        <div class="container" style="min-height: 500px">
            <div class="row">
                <div class="col-md-12">
                    @if(app()->getLocale()=="tr")
                        <h3>{!! $content->description !!}</h3>
                    @else
                        <h3>{!! $content->description_eng !!}</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection