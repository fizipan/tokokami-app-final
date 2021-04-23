<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta --}}
    @include('includes.meta')

    <title>@yield('title')</title>

    @stack('start-style')
    @include('includes.style')
    @stack('end-style')
</head>

<body>
    <div class="d-flex page-auth">
        <div class="ilustration-auth">
            <img src="/images/auth-ilustration.svg" alt="" />
        </div>
        <div class="form-auth">
            {{-- Page Content --}}
            @yield('content')
        </div>
    </div>

    {{-- script --}}
    @stack('start-script')
    @include('includes.script')
    @stack('end-script')
</body>

</html>
