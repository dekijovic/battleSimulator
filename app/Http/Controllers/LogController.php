<?php
namespace App\Http\Controllers;

use App\Commands\Games\RestartGame;
use App\Commands\Logs\CreateLog;
use App\Storage\Logs\LogInterface;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *@param int $gameId
     * @return \Illuminate\Http\Response
     */
    public function index(int $gameId)
    {
         $result = app(LogInterface::class)->all($gameId);

         return $this->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $gameId
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, int $gameId)
    {
        $result = dispatch_now(new CreateLog($request->all(), $gameId));
        return $this->json($result);
    }
}
