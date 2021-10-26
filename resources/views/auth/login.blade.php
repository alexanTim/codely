@extends('layouts.app')

@section('content')

<div class="container h-100">
    <div class="mt-5 row h-100 justify-content-center align-items-center">
        <div class="loginform">
            <h3 class="card-title text-left title-login">Codely</h3>
            <div class="card-text">
                <!--
                <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>				
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>

                    <div class="form-group row">
                        <div class="col-md-7 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div>
                           
                            </div>
                        </div>
                    </div>
                    <div class="sign-up">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                    </div>
                    <div class="sign-up">
                        Don't have an account? <a href="{{ route('register') }}">Create One</a>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</div>

@endsection
