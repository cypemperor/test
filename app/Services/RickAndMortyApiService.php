<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RickAndMortyApiService
{
    private const API_URL = 'https://rickandmortyapi.com/api/';

    /**
     * Gets All Characters
     * @param int $page
     * @param string|null $searchParams
     * @return object|null
     */
    public function getCharacters(int $page, string $searchParams = null) : ?object
    {
        $url = self::API_URL . 'character/?page='.$page;

        if ($searchParams) {
            $url .= '&'.$searchParams;
        }

        $response = Http::get($url);
        $results = $response->object();

        if (isset($results->error)) {
            return null;
        }
        return $results;
    }

    /**
     * Gets Single Character Data
     * @param int $characterId
     * @return object
     */
    public function getCharacter(int $characterId) : ?object
    {
        $response = Http::get(self::API_URL . 'character/'.$characterId);

        if ($response->status() === 404) {
            return null;
        }

        $profile = $response->object();

        $profile->episodesAppeared = $this->formatEpisodes($profile);

        return $profile;
    }

    /**
     * Gets Episode Numbers From the end of Episode URL String in Episode Array of the Result.
     * @param object $profile
     * @return array
     */
    private function formatEpisodes(object $profile) : array
    {
        $episodes = [];

        if ($profile->episode) {
            foreach ($profile->episode as $episode) {
                preg_match('/\/(\d+)/', $episode, $matches);
                $episodes[] = $matches[1];
            }
        }

        return $episodes;
    }
}
