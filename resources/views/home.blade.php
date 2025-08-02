@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="p-5 mb-4 hero-gradient text-white rounded-3 shadow-lg">
                <div class="container-fluid py-4 text-center">
                    <h1 class="display-4 fw-bold mb-3">Selamat Datang di Webrophic! 🖋️</h1>
                    <p class="fs-5 mb-4">Ruang Anda untuk menemukan artikel, panduan, dan inspirasi seputar teknologi, pengembangan diri, dan kreativitas.</p>
                    <a href="/posts" class="btn btn-light btn-lg px-4 me-md-2"><i class="bi bi-collection"></i> Lihat Semua Post</a>
                    <a href="/about" class="btn btn-outline-light btn-lg px-4 mt-2 mt-md-0"><i class="bi bi-person-circle"></i> Tentang Penulis</a>
                </div>
            </div>

            <div class="row text-center mt-4 g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 card-feature">
                        <div class="card-body p-4">
                            <i class="bi bi-pencil-fill display-4 text-primary mb-3"></i>
                            <h5 class="card-title fw-bold">Artikel Mendalam</h5>
                            <p class="card-text">Jelajahi berbagai topik yang dibahas secara lengkap dan mudah untuk dipahami oleh siapa saja.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 card-feature">
                        <div class="card-body p-4">
                            <i class="bi bi-lightbulb-fill display-4 text-warning mb-3"></i>
                            <h5 class="card-title fw-bold">Tips & Inspirasi</h5>
                            <p class="card-text">Dapatkan wawasan baru, tips praktis, dan percikan inspirasi untuk menemani hari-hari Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 card-feature">
                        <div class="card-body p-4">
                            <i class="bi bi-folder-fill display-4 text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Ragam Kategori</h5>
                            <p class="card-text">Temukan tulisan berdasarkan kategori favorit Anda, mulai dari teknologi hingga gaya hidup.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
