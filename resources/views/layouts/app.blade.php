<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://kit.fontawesome.com/cfa8aa938f.js" crossorigin="anonymous"></script>
    @stack('css')
</head>
<body>
    <div>
        @include('partials.navbar')
        <main class="mt-5 py-4">
           <div class="container">
                @yield('content')
           </div>
        </main>
        @include('partials.footer')
        @include('partials.modal')
    </div>
     <!-- Bootstrap core JS-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
     <!-- Third party plugin JS-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
     <!-- Contact form JS-->
     <script src="{{ asset('assets/assets/mail/jqBootstrapValidation.js') }}"></script>
     <script src="{{ asset('assets/assets/mail/contact_me.js') }}"></script>
     <!-- Core theme JS-->
     <script src="{{ asset('assets/js/scripts.js') }}"></script>
     <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

     {!! Toastr::message() !!}
@stack('scripts')


</body>
</html>
