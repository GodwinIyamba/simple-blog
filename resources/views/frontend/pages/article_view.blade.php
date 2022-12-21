@extends('frontend.app_layout')
@section('content')
    <div class="wrapper style3">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-12-medium">
                    </div>
                    <div class="col-8 col-12-medium imp-medium">
                        <div id="content">

                            <!-- Content -->

                            <article>
                                <header class="major box feature1">
                                    <h2>{{ $article->title }}</h2>
                                </header>

                                <span class="image featured"><img src="{{ asset($article->article_cover) }}" alt="" /></span>

                                <p>{{ $article->body }}</p>
                            </article>
                            <div>
                                @foreach($article->tags as $tag)
                                    <span style="padding: .4em .5em; line-height: 1; white-space: nowrap; text-align: center; border-width: 1px; border-style: solid;border-radius: 2px; background-color: rgba(0, 0, 0, 0.15); color:; white;">#{{ $tag->name }}</span>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-2 col-12-medium">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
