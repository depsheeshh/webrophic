@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Category</h1>
        <hr>
    </div>

    <div class="col-lg-7 mx-4">
        <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <input type="text" class="form-control @error('name')
                    is-invalid
                @enderror" id="name" name="name" required autofocus value="{{ old('name', $category->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug')
                    is-invalid
                @enderror" id="slug" name="slug" required readonly value="{{ old('slug', $category->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
        name.addEventListener('change', function () {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        // document.addEventListener('trix-file-accept', (e) => e.preventDefault())

        // function lihatFoto() {
        //     const img = document.getElementById('foto');
        //     const fotoPreview = document.querySelector('.img-preview');

        //     fotoPreview.style.display = 'block';
        //     const oFReader = new FileReader();
        //     oFReader.readAsDataURL(img.files[0]);

        //     oFReader.onload = (oFREvent) => fotoPreview.src = oFREvent.target.result;
        // }
    </script>
@endsection