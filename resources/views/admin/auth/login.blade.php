@extends('user.layouts.simple')
@section('title', 'Login')
@section('sub-title', 'Login')
@section('content-simple')
<link rel="stylesheet" href="{{ asset('css/user/auth/login.css') }}">
    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form method="POST" action="{{ route('admin.login.post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <input name="password" id="passwordInput" value="{{ old('password') }}" type="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text" id="showPasswordToggle">
                                      <i class="fa-solid fa-eye"></i>
                                      {{-- <span class="fas fa-lock"></span> --}}
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input value="{{ old('remember') }}" name="remember" type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>



                    </form>
                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>

<script src="{{ asset('js/user/auth/login.js') }}"></script>
@endsection

@push('styles-page')
@endpush

@push('scripts-page')
@endpush
