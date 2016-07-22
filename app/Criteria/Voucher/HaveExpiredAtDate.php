<?php

namespace App\Criteria\Voucher;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class HaveExpiredAtDate implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->whereNotNull('customer_voucher_expired_at');
        
        return $model;
    }
}