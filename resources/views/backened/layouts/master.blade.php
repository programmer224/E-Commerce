
<!doctype html>
<html lang="en">

<head>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@include('backened.layouts.head')
</head>
<body class="theme-blue">



<div id="wrapper">

  @include('backened.layouts.nav')

@include('backened.layouts.sidebar')


@yield('content')


</div>

@include('backened.layouts.footer')



@yield('script')


</body>
</html>

