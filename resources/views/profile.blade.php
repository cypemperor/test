<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Rick And Morty - {{ $profile->name }}</title>
    </head>
    <body>
        <div class="w-full bg-slate-700 text-white p-2 h-20">
            <a href="{{url('./')}}">
                <img class="h-16" src="{{asset('images/rickandmortylogo.png')}}" />
            </a>
        </div>

        <div class="w-full p-4">
            <div class="max-w-3xl mx-auto">
                @if ($referer = request()->headers->get('referer'))
                    <a class="px-4 py-2 rounded bg-blue-600 text-white shadow-lg" href="{{$referer}}">Back To Results</a>
                @endif

                <div class="flex space-x-4 mt-10">

                    <div class="w-full flex flex-col">

                        <div class="w-full flex p-2 space-x-4 items-start">
                            <div class="">
                                <img class="" alt="{{$profile->name}}" src="{{$profile->image}}" />
                            </div>
                            <div class="flex flex-col flex-grow">
                                <div class="flex flex-row space-x-2">
                                    <div class="font-bold">Name:</div>
                                    <div>{{ $profile->name }}</div>
                                </div>
                                <div class="flex flex-row space-x-2">
                                    <div class="font-bold">Status:</div>
                                    <div>{{ $profile->status }}</div>
                                </div>
                                <div class="flex flex-row space-x-2">
                                    <div class="font-bold">Gender:</div>
                                    <div>{{ $profile->gender }}</div>
                                </div>
                                <div class="flex flex-row space-x-2">
                                    <div class="font-bold">Species:</div>
                                    <div>{{$profile->species}}</div>
                                </div>
                                <div class="flex flex-row space-x-2">
                                    <div class="font-bold">Origin:</div>
                                    <div>{{$profile->origin->name}}</div>
                                </div>
                                <div class="flex flex-row space-x-2">
                                    <div class="font-bold">Episodes Appeared:</div>
                                    <div>
                                        {{implode(', ', $profile->episodesAppeared)}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
