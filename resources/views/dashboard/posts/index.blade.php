@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Post Saya</h1>
        <hr>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-7 ms-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="d-flex justify-content-end">
            <a href="/dashboard/posts/create" class="btn btn-success mx-3 mt-3 col-lg-2">Create New Posts</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Postingan?')"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                    {{-- <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection