<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">
  <title>News</title>

  <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">


  @include('front.layout.styles')

  @include('front.layout.scripts')


</head>

<body>

  {{-- topnav --}}
  @include('front.layout.topnav')
  {{-- endtopnav --}}

  {{-- navbar --}}
  @include('front.layout.nav')
  {{-- endnav --}}

  {{-- main --}}
  @yield('main_content')
  {{-- endmain --}}

  {{-- footer --}}
  @include('front.layout.footer')
  {{-- endfooter --}}

  <div class="scroll-top">
    <i class="fas fa-angle-up"></i>
  </div>

  @include('front.layout.scripts_footer')

</body>

</html>
