@extends('frontend.app_layout')
@section('content')
    <!-- Banner -->
    @include('frontend.body.banner')

    <div id="main-wrapper">
        <div class="wrapper style1">
            <div class="inner">
                <!-- Feature 1 -->
                <section class="container box feature1">
                    <div class="row">
                        <div class="col-12">
                            <header class="first major">
                                <h2>Hey, this is StoryVilla</h2>
                                <p>This is where you read about everything our small universe has for you</strong>...</p>
                            </header>
                        </div>
                        @foreach($articles as $article)
                            <div class="col-4 col-12-medium">
                                <a href="{{ route('article.show', $article) }}">
                                    <section>
                                        <img class="image featured" src="{{ asset($article->article_cover)}}" alt="" />
                                        <h3>{{ $article->title }}</h3>
                                        <p style="width: 300px; margin: auto;">{{ Str::limit($article->body, 100) }}</p>
                                    </section>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
