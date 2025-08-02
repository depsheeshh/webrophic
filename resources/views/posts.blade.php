@extends('layouts.main')
@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold">{{ $title }}</h1>

    {{-- Search Bar --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-7 col-lg-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group search-bar">
                    <input type="text" class="form-control" placeholder="Cari artikel..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-info text-white" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    {{-- Featured Post --}}
    @if ($posts->count())
        <div class="card mb-5 shadow-sm featured-post-card border-0">
            <div class="featured-post-img-container">
                @if ($posts[0]->foto)
                    <img src="{{ asset('storage/' . $posts[0]->foto) }}" alt="{{ $posts[0]->category->name }}" class="post-card-img">
                @else
                    {{-- Fallback jika tidak ada gambar, lebih baik dari picsum --}}
                    <img src="https://via.placeholder.com/1200x400.png?text=Artikel+Utama" alt="Placeholder" class="post-card-img">
                @endif
            </div>
            <div class="card-body text-center p-4">
                <h3 class="card-title mb-2">
                    <a href="/posts/{{ $posts[0]->slug }}" class="post-card-title">{{ $posts[0]->title }}</a>
                </h3>
                <div class="post-card-meta mb-3">
                    Oleh <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>
                    dalam <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                    &middot; {{ $posts[0]->created_at->diffForHumans() }}
                </div>
                <p class="card-text post-card-excerpt">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary mt-2">Baca Selengkapnya <i class="bi bi-arrow-right-short"></i></a>
            </div>
        </div>

        {{-- Post Grid --}}
        <div class="row g-4">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card post-card h-100 shadow-sm">
                        <div class="post-card-img-container">
                             <a href="/posts?category={{ $post->category->slug }}" class="badge rounded-pill text-bg-info category-badge text-decoration-none">{{ $post->category->name }}</a>
                            @if ($post->foto)
                                <img src="{{ asset('storage/' . $post->foto) }}" alt="{{ $post->category->name }}" class="post-card-img">
                            @else
                                <img src="https://via.placeholder.com/500x400.png?text={{ $post->category->name }}" alt="Placeholder" class="post-card-img">
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="/posts/{{ $post->slug }}" class="post-card-title">{{ $post->title }}</a>
                            </h5>
                            <div class="post-card-meta mb-3">
                                <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                &middot; {{ $post->created_at->diffForHumans() }}
                            </div>
                            <p class="card-text post-card-excerpt flex-grow-1">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-outline-primary btn-sm mt-auto">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>

    @else
        <p class="text-center fs-3 mt-5">🚫 Tidak ada postingan yang ditemukan.</p>
    @endif
</div>
@endsection
