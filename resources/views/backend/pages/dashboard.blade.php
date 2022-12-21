@extends('backend.app_layout')
@section('title', 'StoryVilla - Dashboard')
@section('content')
    <main class="content">
        @include('backend.body.header')

        <div class="py-4">

        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">@if($articles->count() > 1) Articles @else Article @endif</h2>
                                    <h3 class="fw-extrabold mb-2">{{ $articles->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">@if($categories->count() > 1)Categories @else Category @endif</h2>
                                    <h3 class="fw-extrabold mb-2">{{ $categories->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">@if($tags->count() > 1) Tags @else Tag @endif</h2>
                                    <h3 class="fw-extrabold mb-2">{{$tags->count()}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="fs-5 fw-bold mb-0">Article List</h2>
                                    </div>
                                    <div class="col text-end">
                                        <a href="{{ route('articles.index') }}" class="btn btn-sm btn-primary">See all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">#</th>
                                        <th class="border-bottom" scope="col">Title</th>
                                        <th class="border-bottom" scope="col">Body</th>
                                        <th class="border-bottom" scope="col">Category</th>
                                        <th class="border-bottom" scope="col">tags</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="fw-bolder text-gray-500">
                                                {{$article->title}}
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                {{ Str::limit($article->body, 40) }}
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                {{ $article->category->name }}
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                @foreach($article->tags as $tag)
                                                    <span class="badge bg-primary">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-xxl-6 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                                    <h2 class="fs-5 fw-bold mb-0">Categories List</h2>
                                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">See all</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="border-bottom" scope="col">#</th>
                                                <th class="border-bottom" scope="col">Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <th class="text-gray-900" scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="fw-bolder text-gray-500">
                                                    {{ $category->name }}
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-xxl-6 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                                    <h2 class="fs-5 fw-bold mb-0">Tags List</h2>
                                    <a href="{{ route('tags.index') }}" class="btn btn-sm btn-primary">See tasks</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="border-bottom" scope="col">#</th>
                                                <th class="border-bottom col-10" scope="col">Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tags as $tag)
                                            <tr>
                                                <th class="text-gray-900" scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="fw-bolder text-gray-500">
                                                    {{ $tag->name }}
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf

        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
            {{ __('Log Out') }}
        </button>
    </form>
@endsection


