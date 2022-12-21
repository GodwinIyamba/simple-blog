@extends('backend.app_layout')
@section('title', 'StoryVilla - New Article')
@section('content')
    <main class="content">
        @include('backend.body.header')
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Manage Articles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Article</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Add New Article</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <!-- Form -->
                                <div class="col-lg-6 col-sm-6">
                                    <div class="mb-4">
                                        <label for="title">Article Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Add a title...">
                                        @error('title')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="my-1 me-2" for="country">Category</label>
                                        <select class="form-select" id="category" name="category">
                                            <option selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for=tags">Add Tags</label>
                                        <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}" placeholder="Separate tags with commas">
{{--                                            @foreach($tags as $tag)--}}
{{--                                                <div class="form-check">--}}
{{--                                                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="defaultCheck10">--}}
{{--                                                    <label class="form-check-label" for="defaultCheck10">--}}
{{--                                                        {{ $tag->name }}--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Article Cover</label>
                                        <input class="form-control" type="file" name="article_cover">
                                        @error('article_cover')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="mb-4">
                                        <label for="textarea">Article Body</label>
                                        <textarea class="form-control" name="body" placeholder="Start writing your article..." id="textarea" rows="11">{{ old('body') }}</textarea>
                                    </div>
                                    @error('body')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Create Article</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
