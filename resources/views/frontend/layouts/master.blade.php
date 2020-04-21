<html>
<head>
    <title>Ecommerce</title>
    @include('frontend.partials.style')
</head>

<body>
<div class="wrapper">
    {{--    Nevigation Start--}}
    @include('frontend.partials.navbar')
    {{--    Nevigation End--}}

    {{--Sidebar Start--}}
    {{--        @include('frontend.partials.sidebar')--}}
    {{--Sidebar End--}}

    @yield('main')

    {{--Footer Start--}}
    @include('frontend.partials.footer')
    {{--Footer End--}}
</div>

{{--Link Start--}}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/3b279c875e.js"></script>
{{--Link End--}}
</body>
</html>
