<?php

namespace App\Criteria\Customer;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class WasMoreThan implements CriteriaInterface 
{
    
    private $moreThan = 0;
    
    public function __construct($moreThan)
    {
        $this->moreThan = (int)$moreThan;
    }
    
    
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('customer_voucher_visit_limit', '>', $this->moreThan);
        
        return $model;
    }
}