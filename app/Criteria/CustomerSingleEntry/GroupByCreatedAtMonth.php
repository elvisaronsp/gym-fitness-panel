<?php

namespace App\Criteria\CustomerSingleEntry;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;
use DB;

class GroupByCreatedAtMonth implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->addSelect(DB::raw('DATE_FORMAT(customer_single_entry_created_at, "%Y-%m") AS customer_single_entry_date'))
                ->groupBy(DB::raw('YEAR(customer_single_entry_created_at)'))
                ->groupBy(DB::raw('MONTH(customer_single_entry_created_at)'));
        
        return $model;
    }
}