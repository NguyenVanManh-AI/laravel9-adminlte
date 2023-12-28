@extends('user.layouts.simple')
@section('title', 'Login')
@section('sub-title', 'Login')
@section('content-simple')
    <link rel="stylesheet" href="{{ asset('css/user/auth/register.css') }}">
    <div class="container">
        <div class="register-box">
            <div class="register-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <form method="POST" action="{{ route('user.register.post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                    placeholder="Full name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                    placeholder="Email">
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
                                <input id="password" type="password" value="{{ old('password') }}" name="password"
                                    class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text show-password-toggle" data-target="password">
                                        <i class="fa-solid fa-eye"></i>
                                        {{-- <span class="fas fa-lock"></span> --}}
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <input id="confirm-password" type="password" value="{{ old('confirm-password') }}"
                                    name="confirm-password" class="form-control" placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text show-password-toggle" data-target="confirm-password">
                                        <i class="fa-solid fa-eye"></i>
                                        {{-- <span class="fas fa-lock"></span> --}}
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('confirm-password'))
                                <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
                            @endif
                        </div>


                        <div class="mb-3">
                            <div class="col-8 pb-2 d-flex justify-content-end">
                                <div id="dropbox">
                                    <input type="file" name="avatar" id="image" accept="image/*">
                                    <p>
                                        <img id="upload_img" src="{{ asset('image/icon/upload-file.png') }}">
                                    </p>
                                </div>
                                <div id="image-container">
                                    <img id="image-preview" src="#" alt="Preview">
                                    <img id="cancel-btn" src="{{ asset('image/icon/error.png') }}">
                                </div>
                            </div>
                            @if ($errors->has('avatar'))
                                <span class="text-danger">{{ $errors->first('avatar') }}</span>
                            @endif
                        </div>



                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#image-container').css('display', 'inline-block');
                                        $('#image-preview').attr('src', e.target.result);
                                        $('#image-preview').show();
                                        $('#dropbox').hide();
                                        $('#cancel-btn').show();
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $("#image").change(function() {
                                readURL(this);
                            });

                            $("#cancel-btn").click(function() {
                                $('#image-container').hide();
                                $('#image-preview').hide();
                                $('#dropbox').val('').show();
                                $('#cancel-btn').hide();
                                $('#image').val('');
                            });
                        </script>
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
                                    <input name="remember" type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Sign up using Facebook
                        </a>
                        <a href="{{ route('user.login.google') }}" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Sign up using Google+
                        </a>
                    </div>

                    <a href="login.html" class="text-center">I already have a membership</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>

    <script src="{{ asset('js/user/auth/register.js') }}"></script>
@endsection

@push('styles-page')
@endpush

@push('scripts-page')
@endpush
