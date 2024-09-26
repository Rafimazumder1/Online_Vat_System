<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.head')
    </head>
    <body class="sb-nav-fixed">
        @include('includes.navber')
        <div id="layoutSidenav">
            @include('includes.sideber')
            <div id="layoutSidenav_content">
                <main>
                    {{-- index page --}}
                   @yield('content')    
                </main>
                @include('includes.footer')
            </div>
        </div>
        @include('includes.script')      
    </body>
</html>
