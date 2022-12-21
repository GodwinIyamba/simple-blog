<!DOCTYPE HTML>
<!--
	ZeroFour by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>StoryVilla - Home of stories</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css')}}" />
</head>
<body class="homepage is-preload">
<div id="page-wrapper">

    <!-- Header -->

    <!-- Header -->
    @include('frontend.body.header')

    <!-- Main Wrapper -->
    @yield('content')

    <!-- Footer Wrapper -->
    @include('frontend.body.footer')

</div>

<!-- Scripts -->
<script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/jquery.dropotron.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/browser.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/breakpoints.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/util.js')}}"></script>
<script src="{{ asset('frontend/assets/js/main.js')}}"></script>

</body>
</html>
