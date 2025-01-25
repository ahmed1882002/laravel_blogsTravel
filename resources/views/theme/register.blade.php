
@extends('theme.master')
@section('title','Register')
@section('contant')
  <!--================ Hero sm banner start =================-->  
  @include('theme.partials_theme.hero',['title'=>'Register'])
  
  <!--================ Hero sm banner end =================-->  

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('register.post') }}" class="form-contact contact_form" action="contact_process.php" method="post" novalidate="novalidate">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="name" value="{{ old('name') }}" type="text" placeholder="Enter your name">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input class="form-control border" name="email" value="{{ old('email') }}" type="email" placeholder="Enter email address">
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="password" type="password" placeholder="Enter your password">
                  @error('password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                  @error('password_confirmation')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <a href="{{ route('login') }}">Aready have acount ?</a>
              <button type="submit" class="button button--active button-contactForm">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
@endsection