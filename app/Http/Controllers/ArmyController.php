<?php

namespace App\Http\Controllers;

use App\Commands\Armies\CreateArmy;
use App\Commands\Armies\UpdateArmy;
use App\Storage\Armies\ArmyInterface;
use Illuminate\Http\Request;

class ArmyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $gameId)
    {
        $result = app(ArmyInterface::class)->all($gameId);

        return $this->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $gameId)
    {
        $result = dispatch_now(new CreateArmy($request->all(), $gameId));
        return $this->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $gameId, int $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $gameId, int $id)
    {
        $result = dispatch_now(new UpdateArmy($request->all(), $id));
        return $this->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
