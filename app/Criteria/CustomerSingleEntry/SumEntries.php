<?php

namespace App\Criteria\CustomerSingleEntry;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;
use DB;

class SumEntries implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->addSelect(\DB::raw('SUM(customer_single_entry_quantity) AS customer_single_entry_sum'));
        return $model;
    }
}