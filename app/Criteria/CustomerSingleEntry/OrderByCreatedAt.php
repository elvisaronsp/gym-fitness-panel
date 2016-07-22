<?php

namespace App\Criteria\CustomerSingleEntry;   

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;
use Illuminate\Support\Str;

class OrderByCreatedAt implements CriteriaInterface {

    const SORT_ASC = 'asc';
    const SORT_DESC = 'desc';
    
    private $sortType = null;
    
    public function __construct($sortType = self::SORT_ASC)
    {
        $this->sortType = Str::lower($sortType);
        $this->checkOrderByType();
    }
    
    private function checkOrderByType()
    {
        $arrayWithTypes = [
            self::SORT_ASC, 
            self::SORT_DESC
        ];
        
        if (!in_array($this->sortType, $arrayWithTypes)) {
            throw new \RuntimeException('Order By type must be one off strings: ' . implode(', ', $arrayWithTypes));
        }
    }
    
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->orderBy(\DB::raw('DATE(customer_single_entry_created_at)'), $this->sortType);
        return $model;
    }
}