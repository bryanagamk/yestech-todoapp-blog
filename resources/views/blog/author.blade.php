@extends('template.blog')

@section('header')
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Posting by {{ $posts[0]->user->name }}</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach ($posts as $item)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('blog.show', [$item->slug]) }}">
                            <h2 class="post-title">{{ $item->title }}</h2>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $item->user->name }}</a>
                            on {{ $item->created_at }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
