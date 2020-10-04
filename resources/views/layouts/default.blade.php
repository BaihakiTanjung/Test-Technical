<!doctype html>
<html lang="en">
@include('includes.head')

<body>
    @include('layouts.app')
    <div class="container">
        @yield('content')
    </div>
    @include('includes.foot')
    @yield('script');
</body>

</html>
