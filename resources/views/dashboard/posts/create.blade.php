@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create New Post</h1>
        <hr>
    </div>

    <div class="col-lg-7 mx-4">
        <form action="/dashboard/posts" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title')
                    is-invalid
                @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                @error('title')
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
                @enderror" id="slug" name="slug" required readonly value="{{ old('slug') }}">
                @error('slug ')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Gambar Post</label>
                <img class="img-preview img-fluid mb-3 col-sm-4">
                <input class="form-control @error('foto')
                    is-invalid
                @enderror" type="file" id="foto" name="foto" onchange="lihatFoto()">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function () {
            fetch('/dashboard/post/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', (e) => e.preventDefault())

        function lihatFoto() {
            const img = document.getElementById('foto');
            const fotoPreview = document.querySelector('.img-preview');

            fotoPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(img.files[0]);

            oFReader.onload = (oFREvent) => fotoPreview.src = oFREvent.target.result;
        }
    </script>
@endsection