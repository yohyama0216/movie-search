<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\BattleRepository;

class BattleService
{
    private $BattleRepository = null;

    public function __construct(
        BattleRepository $BattleRepository
    )
    {
        $this->BattleRepository = $BattleRepository;
    }
    
    public function findAll()
    {
        return $this->BattleRepository->findByCardIdList([]);
    }

    public function findByCardId($cardId)
    {
        return $this->BattleRepository->findByCardIdList([$cardId]);
    }

    public function findByCardIdList($cardIdList)
    {
        return $this->BattleRepository->findByCardIdList($cardIdList);
    }

    public function findWin()
    {
        return $this->BattleRepository->findByCardIdList([],'win');
    }

    public function findLose()
    {
        return $this->BattleRepository->findByCardIdList([],'lose');
    }
}
