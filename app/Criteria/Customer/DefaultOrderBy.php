<?php

namespace App\Criteria\Customer;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;
use DB;

class DefaultOrderBy implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->orderBy('customer_surname');
        return $model;
    }
}