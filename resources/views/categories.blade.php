@extends('layouts.main')
@section('content')

<h1 class="mb-5 text-center fw-bold">Post Categories</h1>

<div class="container">
    <div class="row justify-content-center">
        @foreach($categories as $index => $category)
            @php
                $colors = ['primary', 'success', 'warning', 'danger', 'info', 'secondary'];
                $color = $colors[$index % count($colors)];
            @endphp
            <div class="col-md-4 mb-4">
                <a href="/posts?category={{ $category->slug }}" class="text-decoration-none">
                    <div class="card shadow-lg border-0 overflow-hidden">
                        <img src="{{ asset('img/unsplash.jpg') }}" class="card-img" alt="{{ $category->name }}">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center p-0" style="background: linear-gradient(180deg, rgba(0,0,0,0.5), rgba(0,0,0,.7));">
                            <div class="rounded-circle bg-{{ $color }} mb-3 d-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                                <i class="bi bi-folder-fill text-white fs-2"></i>
                            </div>
                            <h5 class="card-title text-white fw-bold px-3 py-2 rounded" style="background-color: rgba(0,0,0,.5)">
                                {{ $category->name }}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
