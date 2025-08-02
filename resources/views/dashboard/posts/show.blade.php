@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="row mx-5 my-4">
            <div class="col-lg-8">
                <h2 class="mb-4">{{ $post->title }}</h2>

                <a href="/dashboard/posts" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Kembali ke semua
                    post saya</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i
                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Postingan?')"><i
                            class="fa-solid fa-trash"></i> Hapus</button>
                </form>

                @if ($post->foto)
                    <div style="max-height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->foto) }}" alt="{{ $post->category->name }}"
                            class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://picsum.photos/1200/400/" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-7">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection