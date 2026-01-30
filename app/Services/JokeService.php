<?php

namespace App\Services;

use GuzzleHttp\Client;

class JokeService
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://official-joke-api.appspot.com',
            'timeout'  => 5,
        ]);
    }

    public function getRandomJoke($limit)
    {
        try {
            $response = $this->client->get('jokes/programming/ten');
            $jokeData = json_decode($response->getBody(), true);

            $joke = collect($jokeData)->random($limit);

            return [
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Jokes fetched successfully',
                'data' => $joke
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'failed',
                'status_code' => 500,
                'message' => 'Error: failed to fetch jokes - ' . $e->getMessage(),
                'data' => []
            ]; 
        }
        

    }
}