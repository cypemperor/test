<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Rick And Morty</title>
    </head>
    <body>
        <div class="w-full bg-slate-700 text-white p-2 h-20">
            <a href="{{url('./')}}">
                <img class="h-16" src="{{asset('images/rickandmortylogo.png')}}" />
            </a>
        </div>

        <div class="w-full p-4">

            <div class="max-w-3xl mx-auto border border-gray-300 p-6 rounded">
                <form id="search-form" name="search" action="{{url('characters/1')}}" method="get">

                    <input id="name" name="name" class="w-full rounded border border-gray-200 p-2 focus:outline-none" type="text" placeholder="Search by character name..." />

                    <div class="w-full flex justify-around mt-5">
                        <div class="flex space-x-2 justify-center items-center">
                            <div>Status</div>
                            <div>
                                <select id="status" name="status" class="p-2 border border-gray-200 focus:outline-none rounded">
                                    <option value="all">All</option>
                                    <option value="alive">Alive</option>
                                    <option value="dead">Dead</option>
                                    <option value="unknown">Unknown</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex space-x-2 justify-center items-center">
                            <div>Gender</div>
                            <div>
                                <select id="gender" name="gender" class="p-2 border border-gray-200 focus:outline-none rounded">
                                    <option value="all">All</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                    <option value="genderless">Genderless</option>
                                    <option value="unknown">Unknown</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex items-center justify-center mt-5">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white shadow-lg rounded">Search</button>
                        <a href="./characters" class="ml-4 px-4 py-2 rounded bg-blue-600 text-white shadow-lg">Browse Characters</a>
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>
