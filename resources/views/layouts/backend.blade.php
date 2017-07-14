<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Movies for Linka">
    <meta name="author" content="Piero Berni">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Movies') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">    
  </head>

  <body>

    @include('layouts._navbar', ['section' => 'backend'])
    
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/backend.js') }}"></script>   
   
    <script>
      @if(Session::has('toastr'))
        var type = "{{ Session::get('toastr.alert-type', 'info') }}";
        var message = "{{ Session::get('toastr.message', 'no message') }}";
        switch(type){
          case 'info':
            toastr.info(message);
            break;
        
        case 'warning':
            toastr.warning(message);
            break;

        case 'success':
            toastr.success(message);
            break;

        case 'error':
            toastr.error(message);
            break;
        }
      @endif

    </script>

  </body>
</html>