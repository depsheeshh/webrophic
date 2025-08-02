@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <form action="/register" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <img class="mb-4 rounded-circle " src="/img/login.png" alt="" width="100" height="100" />
                    </div>
                    <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('name')
                            is-invalid
                        @enderror" name="name" id="name" placeholder="Nama" required value='{{ old('name') }}' />
                        <label for="name">Nama</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('username')
                            is-invalid
                        @enderror" name="username" id="username" placeholder="Username" required
                            value='{{ old('username') }}' />
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror" name="email" id="email" placeholder="Email" required value='{{ old('email') }}' />
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-bottom @error('password')
                            is-invalid
                        @enderror" id="password" placeholder="Password" required />
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

                    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                    {{-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2025</p> --}}
                </form>
                <small class="d-block text-center mb-5 mt-3">Udah Punya Akun? <a href="/login">Login!</a></small>
            </main>
        </div>
    </div>
@endsection