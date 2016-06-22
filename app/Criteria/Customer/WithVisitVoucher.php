<?php

namespace App\Criteria\Customer;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;
use DB;

class WithVisitVoucher implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->join(DB::raw('(SELECT * FROM `customer_vouchers` WHERE customer_voucher_id IN (SELECT MAX(customer_voucher_id) AS maxid FROM `customer_vouchers` AS mcv GROUP BY customer_voucher_customer_id)) AS cv'), 'customers.customer_id', '=', 'cv.customer_voucher_customer_id');
        return $model;
    }
}