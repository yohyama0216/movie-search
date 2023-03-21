<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\CardRepository;

class CardService
{
    private $CardRepository = null;

    public function __construct(
        CardRepository $CardRepository
    )
    {
        $this->CardRepository = $CardRepository;
    }
    
    public function findAll()
    {
        return $this->CardRepository->findAll();
    }

    public function findById($cardId)
    {
        return $this->CardRepository->findById($cardId);
    }

    public function findSpell()
    {
        return $this->CardRepository->findByType('spell');
    }

    public function findBuildings()
    {
        return $this->CardRepository->findByType('buildings');
    }

    public function findTroop()
    {
        return $this->CardRepository->findByType('troop');
    }
}
