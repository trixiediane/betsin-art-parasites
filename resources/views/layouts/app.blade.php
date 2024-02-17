<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- JQuery Plugin -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        @php
            // Get only specific data from user. Null safe.
            $user = auth()->check() ? json_encode(Illuminate\Support\Arr::only(auth()->user()->toArray(), ['id', 'name', 'username'])) : null;
        @endphp
        @if (auth()->check())
            //if(localStorage.getItem('user_data') === null) {
            $.ajax({
                type: "POST",
                url: "{{ route('me') }}",
                async: false,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    localStorage.setItem('user_data', JSON.stringify(response));
                }
            });
            //}
        @else
            window.location.href = "{{ route('login') }}";
        @endif
        // Load user_data to a variable
        var user_data = JSON.parse(localStorage.getItem('user_data'));
        console.log(user_data.id);
    </script>

    <!-- Custom page scripts stack -->
    @stack('styles')
    @stack('scripts')

</head>

<body class="font-sans antialiased">

    @include('layouts.navigation')

    <div class="bg-gray-100">

        {{-- <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="p-4">
                    {{ $header }}
                </div>
            </header>
        @endif --}}

        <!-- Page Content -->
        <main>
            {{-- @yield('content') --}}
            {{ $slot }}
        </main>
    </div>

    {{-- @include('layouts.footer') --}}

</body>

</html>
