@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <img src="img/{{ $image }}" alt="{{ $image }}" width="150" class="img-thumbnail rounded-circle mb-3 border border-primary">
                    <h2 class="card-title mb-2">{{ $name }}</h2>
                    <h5 class="text-muted mb-3">NIM: {{ $NIM }}</h5>
                    <p class="mb-3"><i class="bi bi-envelope"></i> {{ $email }}</p>
                    <hr>
                    <p class="card-text">Halo! Saya {{ $name }}, mahasiswa dengan NIM {{ $NIM }}. Silakan kontak saya melalui email di atas untuk diskusi atau kolaborasi.</p>
                    <a href="mailto:{{ $email }}" class="btn btn-primary mt-2"><i class="bi bi-send"></i> Kirim Email</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
