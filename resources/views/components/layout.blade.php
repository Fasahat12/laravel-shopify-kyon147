@props(['titleBar'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    @extends('shopify-app::layouts.default')
    @section('scripts')
        @parent
    
        <script>
            const titleBar = {!! isset($titleBar) ? json_encode($titleBar) : json_encode('Default Title') !!};;
        </script>
    @endsection

    <x-flash-message />

        {{ $slot }}
        </script>
        <script type="module" src="{{ asset('js/shopify.js') }}"></script>
</body>
</html>
