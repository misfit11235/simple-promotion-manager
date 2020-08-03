<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion Manager</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    
    <div class='d-flex flex-column text-center'>
        @foreach($promos as $promo)
            <div class='mx-auto py-4'>
            <form action='/optin' method='post'>
                @csrf
                <h1>{{$promo->name}}</h1>
                <input id='{{$promo->id}}' type='number' name='promo_id' value='{{$promo->id}}' hidden>
                <input type='text' name='username' placeholder='Join with username!'>
                <button class='btn btn-success'>Opt In</a>
            </form>
            </div>
        @endforeach
    </div>
</body>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist) alert(msg);
</script>
</html>