@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if(session()->has('berhasil'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('berhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin w-100 m-auto">
                <form action="/login" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <img class="mb-4 rounded-circle " src="/img/login.png" alt="" width="100" height="100" />
                    </div>
                    <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror" name="email" id="email" placeholder="name@example.com" autofocus required
                            value="{{ old('email') }}" />
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control @error('password')
                            is-invalid
                        @enderror" name="password" id="password" placeholder="Password" required />
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault" />
                        <label class="form-check-label" for="checkDefault">Remember me</label>
                    </div> --}}

                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                    {{-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2025</p> --}}
                </form>
                <small class="d-block text-center mt-4">Belum Register? <a href="/register">Register Dulu!</a></small>
            </main>
        </div>
    </div>
@endsection
