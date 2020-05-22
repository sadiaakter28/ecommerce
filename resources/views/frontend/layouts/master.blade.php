<html>
<head>
    <title>
        @yield('title','Ecommerce')
    </title>
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
    @include('frontend.partials.messages')
    @yield('main')

    {{--Footer Start--}}
    @include('frontend.partials.footer')
    {{--Footer End--}}
</div>

{{--Link Start--}}
@include('frontend.partials.scripts')
@yield('scripts')
{{--Link End--}}
</body>
</html>
