@extends('theme.master')
@section('title', 'login')
@section('contant')
    <!--================ Hero sm banner start =================-->
    @include('theme.partials_theme.hero', ['title' => 'login'])

    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="{{ route('login') }}" class="form-contact contact_form" action="contact_process.php"
                        method="post" novalidate="novalidate">
                        @csrf
                        <div class="form-group">
                            <input class="form-control border" name="email" type="email" value="{{ old('email') }}"
                                placeholder="Enter email address">
                                @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="password" type="password"
                                placeholder="Enter your password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror

                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <a href="{{ route('register') }}">Aready have acount ?</a>
                            <button type="submit" class="button button--active button-contactForm">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
