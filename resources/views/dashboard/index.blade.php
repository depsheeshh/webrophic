@extends('dashboard.layouts.main')

@section('content')
<div class="container-fluid px-4 py-4">
    {{-- Header Sambutan --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
        <a href="/dashboard/posts/create" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Buat Postingan Baru
        </a>
    </div>

    {{-- Kartu Statistik (Disesuaikan dengan data yang ada) --}}
    <div class="row g-4 mb-4">
        <div class="col-lg-6 col-md-6">
            <div class="card bg-primary text-white stat-card shadow-sm">
                <div class="card-body">
                    <div>
                        <div class="fs-6 text-uppercase">Total Postingan Anda</div>
                        <div class="fs-2 fw-bold">{{ $totalUserPosts }}</div>
                    </div>
                    <i class="bi bi-file-post stat-card-icon"></i>
                </div>
                <a href="/dashboard/posts" class="card-footer text-white d-flex justify-content-between align-items-center text-decoration-none">
                    <span>Lihat Semua Postingan</span>
                    <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card bg-success text-white stat-card shadow-sm">
                <div class="card-body">
                    <div>
                        <div class="fs-6 text-uppercase">Total Kategori</div>
                        <div class="fs-2 fw-bold">{{ $totalCategories }}</div>
                    </div>
                    <i class="bi bi-tags stat-card-icon"></i>
                </div>
                @can('admin')
                <a href="/dashboard/categories" class="card-footer text-white d-flex justify-content-between align-items-center text-decoration-none">
                   <span>Kelola Kategori</span>
                   <i class="bi bi-arrow-right-circle"></i>
               </a>
                @endcan
            </div>
        </div>
    </div>

    {{-- Chart dan Aktivitas Terbaru --}}
    <div class="row g-4">
        {{-- Grafik Postingan --}}
        <div class="col-xl-8">
            <div class="card shadow-sm h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold text-primary">Postingan Dibuat (7 Hari Terakhir)</h6>
                    <i class="bi bi-bar-chart-line-fill text-gray-400"></i>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="myPostsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Postingan Terbaru Anda --}}
        <div class="col-xl-4">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                     <h6 class="m-0 fw-bold text-primary">Postingan Terbaru Anda</h6>
                </div>
                <div class="card-body">
                     <ul class="list-group list-group-flush">
                        @forelse($recentPosts as $post)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ Str::limit($post->title, 25) }}</a>
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </li>
                        @empty
                        <li class="list-group-item">Anda belum membuat postingan.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myPostsChart');
        const labels = @json($chartLabels);
        const data = @json($chartData);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Postingan',
                data: data,
                backgroundColor: 'rgba(23, 162, 184, 0.7)',
                borderColor: 'rgba(23, 162, 184, 1)',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endpush
