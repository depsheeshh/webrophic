@extends('layouts.main')
@section('content')

   <div class="container-fluid p-0">
    <header class="article-header">
        {{-- KELAS BOOTSTRAP: .container, .row, .justify-content-center, .col-lg-10, .col-xl-8 --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    {{-- KELAS BOOTSTRAP: .badge, .text-bg-primary, .mb-3, .text-decoration-none, .fs-6 --}}
                    <h1 class="article-title mb-2">{{ $post->title }}</h1>
                    <div class="article-meta">
                         {{-- KELAS BOOTSTRAP: .mx-2 --}}
                        <span class="mx-2">&middot;</span>
                        <span>{{ $post->created_at->format('d F Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- KELAS BOOTSTRAP: .container, .row, .justify-content-center, .col-lg-10, .col-xl-8 --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                @if ($post->foto)
                    <div class="article-image-container">
                        {{-- KELAS BOOTSTRAP: .img-fluid --}}
                        <img src="{{ asset('storage/' . $post->foto) }}" alt="..." class="img-fluid">
                    </div>
                @endif

                <article class="article-body">
                    {!! $post->body !!}
                </article>

                {{-- KELAS BOOTSTRAP: .my-5, .text-center, .btn, .btn-outline-secondary --}}
                <hr class="my-5">
                <div class="text-center">
                    <a href="/posts" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
