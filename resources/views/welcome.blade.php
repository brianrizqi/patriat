@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Article</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
            <div class="breadcrumb-item">Article</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
{{--            @foreach($article as $item)--}}
{{--                <div class="col-12 col-sm-6 col-md-6 col-lg-3">--}}
{{--                    <article class="article">--}}
{{--                        <div class="article-header">--}}
{{--                            <div class="article-image" data-background="{{url('storage/'.$item->img)}}">--}}
{{--                            </div>--}}
{{--                            <div class="article-title">--}}
{{--                                <h2><a href="#">{{$item->title}}</a></h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="article-details">--}}
{{--                            <p style="text-overflow: ellipsis; white-space: nowrap;--}}
{{--     overflow: hidden;">--}}
{{--                                {{$item->article}}--}}
{{--                            </p>--}}
{{--                            <div class="article-cta">--}}
{{--                                <a href="#" class="btn btn-primary">Read More</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--            @endforeach--}}
        </div>
    </div>
@endsection
