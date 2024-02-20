<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @extends('shopify-app::layouts.default')

    @section('content')
        <!-- You are: (shop domain name) -->
        <p>You are: {{  Auth::user()->name }}</p>
    @endsection
    
    @section('scripts')
        @parent
    
        <script>
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;
    
            actions.TitleBar.create(app, { title: 'Welcome' });
        </script>
    @endsection

    <main>
        <section>
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><img src="https://picsum.photos/100/100?random={{ $loop->index }}" alt=""></td>
                                <td>{{ $product['title'] }}</td>
                                <td><a href="" class="secondary icon-trash"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>    
</body>
</html>
