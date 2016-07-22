<?php

namespace App\Criteria\CustomerVisit;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

use App\Criteria\OrderByCriteria;

class OrderById extends OrderByCriteria implements CriteriaInterface {

    public function __construct($sortType = self::SORT_ASC)
    {
        parent::__construct($sortType);
    }
    
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->orderBy('customer_visit_id', $this->sortType);
        
        return $model;
    }
}