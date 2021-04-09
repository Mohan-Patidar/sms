@extends('layouts.authlayout')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--<div class="login-page">-->
<!--        <div class="login-box">-->
<!--            <div class="logo-box">-->
<!--                <a href="#">-->
<!--                    <img src="{{url('/')}}/assets/image/letter-head.png" alt="">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="login-bg">-->
<!--                <form method="POST" action="{{ route('register') }}" id="register-form">-->
<!--                @csrf-->
<!--                    <h3 class="login-heading">Register</h3>-->
<!--                    <div class="form-group">-->
<!--                        <label>Name</label>-->
<!--                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>-->
<!--                        @error('name')-->
<!--                        <span class="invalid-feedback" role="alert">-->
<!--                            <strong>{{ $message }}</strong>-->
<!--                        </span>-->
<!--                    @enderror-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label>E-Mail Address</label>-->
<!--                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">-->
<!--                        @error('email')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label>Password</label>-->
<!--                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">-->

<!--                        @error('password')-->
<!--                            <span class="invalid-feedback" role="alert">-->
<!--                                <strong>{{ $message }}</strong>-->
<!--                            </span>-->
<!--                        @enderror-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label>Confirm Password</label>-->
<!--                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">-->
<!--                    </div>-->
<!--                    <input type="submit" class="login-btn"  value="Register">-->
<!--                </form>-->
<!--                <div class="text-center">-->
<!--                    <p>Already have an account ! <a href="{{ route('login') }}"> Login Here </a></p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
@endsection
@section('additionalscripts')
    <script>
        $("#register-form").validate();
    </script>
@endsection