@extends('backend.layout.auth_master')

@section('title', 'Register Page')

@section('main-content')
  <div class="card-body register-card-body">
          <p class="register-box-msg">Register a new membership</p>
          <form action="{{ route('backend.register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" />
              <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>

            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
             @error('password_confirmation')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            <!--begin::Row-->
            <div class="row">
              <div class="col-8">
                <!-- <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree to the <a href="#">terms</a>
                  </label>
                </div> -->
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
          <!-- <div class="social-auth-links text-center mb-3 d-grid gap-2">
            <p>- OR -</p>
            <a href="#" class="btn btn-primary">
              <i class="bi bi-facebook me-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-danger">
              <i class="bi bi-google me-2"></i> Sign in using Google+
            </a>
          </div> -->
          <!-- /.social-auth-links -->
          <p class="mb-0">
            <a href="{{ route('backend.showLogin') }}" class="text-center"> I already have a membership </a>
          </p>
        </div>
@endsection