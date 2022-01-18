@extends('layouts.loginLayout')
@section('content')
       <!-- Sign in Start -->


       <section class="sign-in-page">
        <div class="container p-0">

            <div class="row no-gutters height-self-center">
              <div class="col-sm-12 align-self-center page-content rounded">
                <div class="row m-0">

                  <div class="col-sm-12 sign-in-page-data">
                  
                      <div class="sign-in-from bg-primary rounded">
                          <h3 class="mb-0 text-center text-white">Sign in</h3>
                          <p class="text-center text-white">Enter your username and password.</p>
                          <form method="POST" action="{{ route('login') }}">
                            @csrf
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Username</label>
                                  <input type="text" class="form-control mb-0  @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter username">
                                  @error('username')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>

                              <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="Password"  placeholder="Password">
                                  {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              <div class="d-inline-block w-100">
                                  <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                      {{-- <input type="checkbox" class="custom-control-input" id="customCheck1"> --}}
                                    <input class="custom-control-input" type="checkbox" name="remember" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>

                                      <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                  </div>
                              </div>
                              <div class="sign-info text-center">
                                  <button type="submit" class="btn btn-white d-block w-100 mb-2">Sign in</button>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
@endsection
