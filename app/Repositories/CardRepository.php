<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Card;

class CardRepository
{        
    private $Card;

    public function __construct(
        Card $Card
    )
    {
        $this->Card = $Card;
    }
    
    
    public function findAll()
    {
        return $this->Card::all();
    }

    public function findById($id)
    {
        return $this->Card::find($id);
    }

    public function findByType($type)
    {
        return $this->Card::where('type','=',$type)->get();
    }
}
