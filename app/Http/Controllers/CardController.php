<?php

namespace App\Http\Controllers;

use App\Services\CardService;
use Illuminate\Http\Request;

class CardController extends Controller
{
    private $CardService;
    
    public function __construct(
        CardService $CardService
    )
    {
        $this->CardService = $CardService;
    }
    
    public function index(Request $request)
    {
        $cards = $this->CardService->findAll();
        return view('card.index', compact('cards'));
    }
}
