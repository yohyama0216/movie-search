<?php

namespace App\Http\Controllers;

use App\Services\BattleService;
use Illuminate\Http\Request;

class BattleController extends Controller
{
    private $BattleService = null;

    public function __construct(
        BattleService $BattleService
    )
    {
        $this->BattleService = $BattleService;
    }
    
    public function index(Request $request)
    {
        $battles = $this->BattleService->findAll();
        return view('battle.index', compact('battles'));
    }
}
