@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Posts Categories</h1>
        <hr>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-7 ms-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="d-flex justify-content-end">
            <a href="/dashboard/categories/create" class="btn btn-success mx-3 mt-3 col-lg-3">Create New Categories</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="text-center">
                                    {{-- <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-info"><i
                                            class="fa-solid fa-eye"></i></a> --}}
                                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Kategori?')"><i
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