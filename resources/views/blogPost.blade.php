@extends('layouts.layout')

@section('content')
    <div>
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><span>Home</span></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/blog') }}"><span>Blog</span></a></li>
                <li class="breadcrumb-item"><a href="{{ $post->url() }}"><span>{{ $post->title }}</span></a></li>
            </ol>
            <div class="row">
                <div class="col-md-12" style="margin-top: 2rem;">
                    <h1>{{ $post->title }}</h1>
                    <p style="font-size: 14px;">Posted on {{ \Carbon\Carbon::parse($post->created_at)->format('M. dS, Y') }}, By
                        <a href="{{ $post->author->url() }}">{{ $post->author->name }}</a></p>
                    <p>{!! $post->content !!}<br></p>
                    @if(count($post->tags) > 0)
                        <p style="font-size: 14px;"><strong>Tags:</strong>
                            @foreach($post->tags as $key => $tag)
                                &nbsp;<a href="{{ $tag->url() }}">{{ $tag->title }}</a>
                                @if($key + 1 != count($post->tags))
                                    ,
                                @endif
                            @endforeach
                            <br>
                        </p>
                    @endif
                    @if(count($post->categories) > 0)
                        <p style="font-size: 14px;"><strong>Categories:</strong>
                            @foreach($post->categories as $key => $category)
                                &nbsp;<a href="{{ $category->url() }}">{{ $category->title }}</a>
                                @if($key + 1 != count($post->categories))
                                    ,
                                @endif
                            @endforeach
                            <br>
                        </p>
                    @endif
                </div>
            </div>

            <div class="row" style="margin: 4rem -15px 0 -15px;">
                <div class="col" style="width: 1140px;">
                    <h2 style="width: 1140px;">More Blog Posts</h2>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="row" style="margin: 2rem -15px 2rem -15px;">
                @foreach($related as $post)
                    <div class="col-md-4"  style="margin: 2rem 0px 2rem 0px;">
                        <h3><a href="{{ $post->url() }}">{{ $post->title }}</a></h3>
                        <p style="font-size: 14px;">Posted on {{ \Carbon\Carbon::parse($post->created_at)->format('M. dS, Y') }}, By
                            <a href="{{ $post->author->url() }}">{{ $post->author->name }}</a><br></p>
                        <p style="text-align: justify">{!!   \Illuminate\Support\Str::words(strip_tags_content($post->content),50) !!}&nbsp;<a href="{{ $post->url() }}">Continue Reading »</a><br></p>
                        @if(count($post->tags) > 0)
                            <p style="font-size: 14px;"><strong>Tags:</strong>
                                @foreach($post->tags as $key => $tag)
                                    &nbsp;<a href="{{ $tag->url() }}">{{ $tag->title }}</a>
                                    @if($key + 1 != count($post->tags))
                                        ,
                                    @endif
                                @endforeach
                                <br>
                            </p>
                        @endif
                        @if(count($post->categories) > 0)
                            <p style="font-size: 14px;"><strong>Categories:</strong>
                                @foreach($post->categories as $key => $category)
                                    &nbsp;<a href="{{ $category->url() }}">{{ $category->title }}</a>
                                    @if($key + 1 != count($post->categories))
                                        ,
                                    @endif
                                @endforeach
                                <br>
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection