<?php

namespace App\Criteria;   

use Illuminate\Support\Str;

abstract class OrderByCriteria
{
    
    const SORT_ASC = 'asc';
    const SORT_DESC = 'desc';
    
    protected $sortType = null;
    
    public function __construct($sortType)
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
}