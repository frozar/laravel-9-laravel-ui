@extends('layouts.app')

@section('content')
    <script>
        function copyPasteLoginPassword(button) {
            const disabledForm = button.parentElement.parentElement.children.item(1);
            const login = disabledForm.children.item(0).value;
            const password = disabledForm.children.item(1).value;
            document.getElementById('email').value = login;
            document.getElementById('password').value = password;
        }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>

                        <ul class="list-group mt-5">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="input-group flex-nowrap flex-column">
                                        <div class="d-flex flex-row justify-content-between pb-2">
                                            <div class="fw-bold"><span>Normal User<span></div>
                                            <button class="btn btn-primary" type="button"
                                                onclick="copyPasteLoginPassword(this)">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" placeholder="Login"
                                                aria-label="Login" aria-describedby="addon-wrapping"
                                                value="user@tutsmake.com" disabled></input>
                                            <input type="text" class="form-control" placeholder="Password"
                                                aria-label="Password" aria-describedby="addon-wrapping" value="123456"
                                                disabled></input>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="input-group flex-nowrap flex-column">
                                        <div class="d-flex flex-row justify-content-between pb-2">
                                            <div class="fw-bold"><span>Admin User<span></div>
                                            <button class="btn btn-primary" type="button"
                                                onclick="copyPasteLoginPassword(this)">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" placeholder="Login"
                                                aria-label="Login" aria-describedby="addon-wrapping"
                                                value="admin@tutsmake.com" disabled></input>
                                            <input type="text" class="form-control" placeholder="Password"
                                                aria-label="Password" aria-describedby="addon-wrapping" value="123456"
                                                disabled></input>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="input-group flex-nowrap flex-column">
                                        <div class="d-flex flex-row justify-content-between pb-2">
                                            <div class="fw-bold"><span>Manager User<span></div>
                                            <button class="btn btn-primary" type="button"
                                                onclick="copyPasteLoginPassword(this)">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex">
                                            <input type="text" class="form-control" placeholder="Login"
                                                aria-label="Login" aria-describedby="addon-wrapping"
                                                value="manager@tutsmake.com" disabled></input>
                                            <input type="text" class="form-control" placeholder="Password"
                                                aria-label="Password" aria-describedby="addon-wrapping" value="123456"
                                                disabled></input>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </ul>
                    </div>
                </div>
            </div>

            <div>

            </div>
        </div>
    </div>
@endsection
