{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
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
</div> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('frontend/css/myCSS/register.css')}}" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{route('daftar.user')}}" class="sign-in-form" method="POST">
              @csrf
            <h2 class="title">Daftar - Pencari Kerja</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="password-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" class="form-password" name="password" />
              <i class="far fa-eye"><input type="checkbox" class="form-checkbox"></i>
            </div>
            <div class="password-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm-Password" class="form-password" name="password_confirmation" />
              <i class="far fa-eye"><input type="checkbox" class="form-checkbox"></i>
            </div>
            
            <button type="submit" class="btn solid">Registrasi</button>

            <a href="/">Kembali</a>
          </form>



          <form action="{{route('daftar.perusahaan')}}" class="sign-up-form" method="POST">
              @csrf
              <h2 class="title">Daftar - Perusahaan</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" />
              </div>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" name="email" />
              </div>
              <div class="password-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" class="form-password" name="password" />
                <i class="far fa-eye"><input type="checkbox" class="form-checkbox"></i>
              </div>
              <div class="password-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm-Password" class="form-password" name="password_confirmation" />
                <i class="far fa-eye"><input type="checkbox" class="form-checkbox"></i>
              </div>
            <button type="submit" class="btn">registrasi</button>

            <a href="/">Kembali</a>
          </form>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>From User</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              for company?
            </button>
          </div>
          <!-- <img src="../img/vektor/businessman-with-laptop.png" class="image" alt="" /> -->
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Registrasion For Companies</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              For User
            </button>
          </div>
          <!-- <img src="img/register.svg" class="image" alt="" /> -->
        </div>
      </div>
    </div>

    <script src="{{asset('frontend/js/myJS/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function(){		
        $('.form-checkbox').click(function(){
          if($(this).is(':checked')){
            $('.form-password').attr('type','text');
          }else{
            $('.form-password').attr('type','password');
          }
        });
      });
    </script>
  </body>
</html>


