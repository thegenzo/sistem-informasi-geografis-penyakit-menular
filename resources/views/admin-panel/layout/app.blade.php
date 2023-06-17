<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') &mdash; Admin Panel Web Kelurahan Kaobula</title>

    @include('admin-panel.include.style')

    @stack('addon-style')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('admin-panel.include.navbar')

            @include('admin-panel.include.sidebar')

            @yield('content')

            @include('admin-panel.include.footer')
        </div>
    </div>

    @include('admin-panel.include.script')

    @stack('addon-script')

    @if($message = Session::get('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                title: "Sukses!",
                html: "{{ $message }}",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                icon: "success"
            });
        })
    </script>
    @elseif($message = Session::get('failed'))
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                title: "Gagal!",
                html: "{{ $message }}",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-danger",
                icon: "error"
            });
        })
    </script>
    @endif
</body>

</html>
