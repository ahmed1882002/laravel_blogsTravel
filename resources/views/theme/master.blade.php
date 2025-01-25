
<!DOCTYPE html>
<html lang="en">

@include('theme.partials_theme.head')

<body>
  <!--================Header Menu Area =================-->
 @include('theme.partials_theme.header')
  <!--================Header Menu Area =================-->
  

@yield('contant')

  <!--================ Start Footer Area =================-->
  @include('theme.partials_theme.footer')
 
  <!--================ End Footer Area =================-->
@include('theme.partials_theme.script')

</body>
</html>