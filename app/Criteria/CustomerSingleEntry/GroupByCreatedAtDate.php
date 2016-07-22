<?php

namespace App\Criteria\CustomerSingleEntry;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;
use DB;

class GroupByCreatedAtDate implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->addSelect(DB::raw('DATE(customer_single_entry_created_at) AS customer_single_entry_date'))
                ->groupBy(\DB::raw('DATE(customer_single_entry_created_at)'));
        
        return $model;
    }
}