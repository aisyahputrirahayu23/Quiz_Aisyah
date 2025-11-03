<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Index Mahasiswa</title>

    <!-- CSS -->
    @include('admin.layouts.css')

</head>

<body class="sb-nav-fixed">
    {{-- sidebar --}}
    @include('admin.layouts.sidebar')

    <main class="content">
        {{-- header --}}
        @include('admin.layouts.header')
        {{-- content --}}
        @yield('content')

        {{-- footer --}}
        @include('admin.layouts.footer')
    </main>

    <!-- JS -->
    @include('admin.layouts.js')
</body>

</html>
