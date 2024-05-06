@extends('layouts.master')

@section('top-styles')
<style type="text/css">
    #google{
        background-image: url('{{url('')}}/assets/img/googlelogo.png');
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: 10%;
        background-size: 40px;
        width: 100%;
        text-align: center;
        padding: 20px 30px;
    }

    #google:hover{
        background-color: #4888f4;
        border: 1px solid #4888f4;
    }

    @media only screen and (max-width: 767px){
        #google{
            background-position-x: 20%;
        }
    }

    /* Style for the form-group container */
#form-group {
  display: flex;
  align-items: center;
  position: relative;
}

/* Style for the password input field */
.password-input {
  padding: 10px;
  font-size: 16px;
  flex: 1;
}

/* Style for the eye icon */
.eye-icon {
  cursor: pointer;
  position: absolute;
  right: 10px;
  font-size: 24px;
}

/* Adjust the height of the input field container to create space for the eye icon */
#form-group input[type="password"] {
  padding-right: 40px;
}
#eye-open
{
    display: none;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login.jpg')">
                <div class="container">
                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                    <form class="login-form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-group">
                                            <label for="singin-email-2">Username or email address *</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="singin-email-2" placeholder="Username or email address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="password">Password *</label>
                                            <div id="form-group">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                                <span class="eye-icon" onclick="togglePasswordVisibility()">
                                                    <i class="fa fa-eye-slash" aria-hidden="true" id="eye-close"></i>
                                                    <i class="fa fa-eye" aria-hidden="true" id="eye-open"></i>

                                                </span>
                                            </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                                <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>
                                            @endif
                                        
                                        </div><!-- End .form-footer -->
                                    </form><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                    <form class="login-form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <div class="form-group">
                                            <label for="register-name-1">First Name *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="register-name-1" value="{{ old('name') }}" placeholder="First Name" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-name-2">Last Name *</label>
                                            <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" id="register-name-2" value="{{ old('lname') }}" placeholder="Last Name" required autocomplete="lname">

                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-date">Date *</label>
                                            <input type="date" class="form-control" placeholder="Date" id="register-date" name="date_of_birth">
                                        </div><!-- End .form-group -->

                                        <h5>Sign-in Information</h5>

                                        <div class="form-group">
                                            <label for="register-email-1">Email *</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="register-email-1" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-number">Mobile Number *</label>
                                            <input type="text" class="form-control" placeholder="Mobile Number" id="register-number" name="phone">
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password-1">Password *</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="register-password-1" name="password" required autocomplete="new-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password-2">Confirm Password *</label>
                                            <input type="password" class="form-control" id="register-password-2" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                                <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

<script>
    function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var eyeCloseIcon = document.getElementById("eye-close");
  var eyeOpenIcon = document.getElementById("eye-open");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeCloseIcon.style.display = "none";
    eyeOpenIcon.style.display = "inline";
  } else {
    passwordInput.type = "password";
    eyeOpenIcon.style.display = "none";
    eyeCloseIcon.style.display = "inline";
  }
}

</script>
@endsection
