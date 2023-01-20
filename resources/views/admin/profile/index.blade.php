@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="name">
                                    <h1>{{ Str::limit($headline->name) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="gender">
                                    <h2>{{ Str::limit($headline->gender) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="caption mx-auto">
                                <div class="hobby">
                                    <h3>{{ Str::limit($headline->hobby, 50) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="caption mx-auto">
                                <div class="introduction">
                                    <h4>{{ Str::limit($headline->introduction, 500) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-3">
                @foreach($posts as $post)
                <div class="post">
                    <div class="row">
                        <div class="text col-md-6">
                            <div class="date">
                                {{ $post->update_at->format('Y年m月d日') }}
                            </div>
                            <div class="name">
                                {{ Str::limit($post->name) }}
                            </div>
                            <dviv class="gender mt-3">
                                {{ Str::limit($post->gender) }}
                            </dviv>
                            <div class="hobby mt-3">
                                {{ Str::limit($post->hobby, 100) }}
                            </div>
                            <div class="introduction mt-3">
                                {{ Str::limit($post->introduction, 1000) }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection    