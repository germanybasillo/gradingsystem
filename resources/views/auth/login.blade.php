 
 @extends('template.auth')
 @include('link.auth')
 @section('content')

 <!-- Sing in  Form -->
 <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="auth/images/signin-image.jpg" alt="sing up image"></figure>
                <a href="/register" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign in</h2>
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" placeholder="Your Email" class="form-control rounded-left @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                        @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" placeholder="Password" class="form-control rounded-left @error('pass') is-invalid @enderror" value="{{ old('pass') }}"/>
                        @if ($errors->has('pass'))
                                <span class="text-danger">{{ $errors->first('pass') }}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection