<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Rick And Morty - Character List</title>
</head>
<body>

<div class="w-full bg-slate-700 text-white p-2 h-20">
    <a href="{{url('./')}}">
        <img class="h-16" src="{{asset('images/rickandmortylogo.png')}}" />
    </a>
</div>

<div class="w-full p-4">
{{--    <a href="./characters" class="px-4 py-2 rounded bg-blue-600 text-white shadow-lg">Browse Characters</a>--}}
    Total Characters: {{ $characterList->info->count }}

    <div class="max-w-3xl mx-auto">
        <div class="w-full justify-between flex items-center mb-5">
            <div>
                @if ($page > 1)
                    <a class="p-2 bg-gray-300 rounded text-sm" href="{{url('characters/' . $page-1 . '?' . $queryParams)}}">Previous Page</a>
                @endif
            </div>
            <div class="font-bold">
                Page {{ $page }}/{{$characterList->info->pages}}
            </div>
            <div>
                @if ($page < $characterList->info->pages)
                    <a class="p-2 bg-gray-300 rounded text-sm" href="{{url('characters/' . $page+1 . '?' . $queryParams)}}">Next Page</a>
                @endif
            </div>
        </div>

        <div class="flex space-x-4">
            @foreach ($characterList->results as $characterColumn)
                <div class="w-full flex flex-col">
                    @foreach ($characterColumn as $character)
                        <div class="w-full flex p-2 space-x-4 items-center">
                            <div class="h-24 w-24 rounded-full overflow-hidden">
                                <img class="" alt="{{$character->name}}" src="{{$character->image}}" />
                            </div>
                            <div class="flex flex-col">
                                <div>
                                    {{ $character->name }}, {{$character->gender}}
                                </div>
                                <div>
                                    {{$character->species}}
                                </div>
                                <div>
                                    <a class="mt-2 px-2 py-1 bg-green-600 text-white shadow-lg rounded" href="{{url('profile/'.$character->id)}}">Visit Profile</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="w-full justify-between flex items-center mt-5">
            <div>
                @if ($page > 1)
                    <a class="p-2 bg-gray-300 rounded text-sm" href="{{url('characters/' . $page-1 . '?' . $queryParams)}}">Previous Page</a>
                @endif
            </div>
            <div class="font-bold">
                Page {{ $page }}
            </div>
            <div>
                @if ($page < $characterList->info->pages)
                    <a class="p-2 bg-gray-300 rounded text-sm" href="{{url('characters/' . $page+1 . '?' . $queryParams)}}">Next Page</a>
                @endif
            </div>
        </div>
    </div>


</div>
</body>
</html>
