<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Rick And Morty - 404</title>
</head>
<body>
<div class="w-full bg-slate-700 text-white p-2 h-20">
    <a href="{{url('./')}}">
        <img class="h-16" src="{{asset('images/rickandmortylogo.png')}}" />
    </a>
</div>

<div class="w-full p-4">

    <div class="max-w-3xl mx-auto flex flex-col space-y-4 items-center justify-center">
        <span class="text-3xl text-slate-400">404</span>
        <h1>{{ $exception->getMessage() }}</h1>
        <a href="{{url('./')}}" class="px-4 py-2 rounded bg-blue-600 text-white shadow-lg">Return Home</a>
    </div>

</div>
</body>
</html>
