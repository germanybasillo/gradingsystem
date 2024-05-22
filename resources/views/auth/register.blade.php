  
 @extends('template.auth')
 @include('link.auth')
 @section('content')
 
 <!-- Sign up form -->
 <section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" placeholder="Your Name" class="form-control rounded-left @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                        @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" placeholder="Your Email" class="form-control rounded-left @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                        @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" placeholder="Password" class="form-control rounded-left @error('password') is-invalid @enderror" value="{{ old('password') }}"/>
                        @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_password" placeholder="Repeat your password"/>
                    </div>
                   
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="auth/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="/login" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>

@endsection