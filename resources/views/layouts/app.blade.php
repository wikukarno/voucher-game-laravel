<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>@yield('title')</title>

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <div class="wrapper">
       
        @include('includes.sidebar')

        <div class="main">
            @include('includes.navbar')

            
            <main class="content">
                @yield('content')
            </main>

            @include('includes.footer')
        </div>
    </div>

    @include('sweetalert::alert')
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')

</body>

</html>