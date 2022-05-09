<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RickAndMortyApiService;
use Illuminate\Support\Facades\Cache;

class RickAndMortyController extends Controller
{
    private RickAndMortyApiService $rickAndMorty;

    public function __construct(RickAndMortyApiService $rickAndMortyApiService)
    {
        $this->rickAndMorty = $rickAndMortyApiService;
    }

    /**
     * @param Request $request
     * @param int $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function characterList(Request $request, int $page = 1)
    {
        $searchParams = [];
        if ($request->name) {
            $searchParams['name'] = filter_var($request->name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        }

        if ($request->status && $request->status !== 'all') {
            $searchParams['status'] = filter_var($request->status, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        }

        if ($request->gender && $request->gender !== 'all') {
            $searchParams['gender'] = filter_var($request->gender, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        }

        $queryParams = http_build_query($searchParams);

        // Cache results for 60 seconds by page and query params.
        $cacheKey = 'character_list_'.$page.'_'.$queryParams;
        $characterList = Cache::remember($cacheKey, 60, function() use ($page, $queryParams) {
            return $this->rickAndMorty->getCharacters($page, $queryParams);
        });

        abort_if(is_null($characterList), 404, 'There is nothing here...');

        $characterList->results = array_chunk($characterList->results, round(count($characterList->results) / 2));

        return view('character_list', compact('characterList', 'page', 'queryParams'));
    }

    /**
     * @param int $characterId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function characterDetail(int $characterId)
    {
        $profile = Cache::remember('character_profile_'.$characterId, 60, function() use ($characterId) {
           return $this->rickAndMorty->getCharacter($characterId);
        });

        abort_if(is_null($profile), 404, 'There is nothing here...');

        return view('profile', compact('profile'));
    }

}
