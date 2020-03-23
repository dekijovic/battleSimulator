<?php

namespace App\Http\Controllers;

use App\Commands\Games\CreateGame;
use App\Commands\Games\RestartGame;
use App\Commands\Games\UpdateGame;
use App\Storage\GamesInterface;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = app(GamesInterface::class)->all();

        return $this->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = dispatch_now(new CreateGame($request->all()));
        return $this->json($result);
    }

    /**
     * Update resource.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $result = dispatch_now(new UpdateGame($id, $request->all()));
        return $this->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = app(GamesInterface::class)->get($id);

        return $this->json($result);
    }

    /**
     * Restart game.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restart(Request $request, int $id)
    {

        $result = dispatch_now(new RestartGame($id,$request->all()));
        return $this->json($result);
    }
}
