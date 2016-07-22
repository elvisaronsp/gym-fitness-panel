<?php

namespace App\Criteria\CustomerSingleEntry;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;
use DB;

class CreatedAtBetweenAnd implements CriteriaInterface {

    private $dateStart = null;
    private $dateStop = null;
    
    public function __construct($dateStart, $dateStop)
    {
        $this->dateStart = $dateStart;
        $this->dateStop = $dateStop;
    }
    
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->whereBetween(DB::raw('DATE(customer_single_entry_created_at)'), [$this->dateStart, $this->dateStop]);
        
        return $model;
    }
}