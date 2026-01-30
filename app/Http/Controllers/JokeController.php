<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JokeController extends Controller
{

    protected $JokeService;

    public function __construct(\App\Services\JokeService $JokeService)
    {
        $this->JokeService = $JokeService;
    }

    public function getRandomJoke(Request $request)
    {

        $limit = $request->input('limit', 3);

        $response = $this->JokeService->getRandomJoke($limit);

        return response()->json($response, $response['status_code']);
    }
}