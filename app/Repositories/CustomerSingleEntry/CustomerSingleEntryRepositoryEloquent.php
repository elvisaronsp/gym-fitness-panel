<?php

namespace App\Repositories\CustomerSingleEntry;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerSingleEntry\CustomerSingleEntryRepository;
use App\Entities\CustomerSingleEntry\CustomerSingleEntry;
use App\Validators\CustomerSingleEntry\CustomerSingleEntryValidator;

use App\Criteria\CustomerSingleEntry\SumEntries;
use App\Criteria\CustomerSingleEntry\CreatedAtBetweenAnd;
use App\Criteria\CustomerSingleEntry\GroupByCreatedAtMonth;
use App\Criteria\CustomerSingleEntry\OrderByCreatedAt;

/**
 * Class CustomerSingleEntryRepositoryEloquent
 * @package namespace App\Repositories\CustomerSingleEntry;
 */
class CustomerSingleEntryRepositoryEloquent extends BaseRepository implements CustomerSingleEntryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerSingleEntry::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function summary()
    {
        $this->pushCriteria(new SumEntries());
        
        return $this;
    }
    
    public function betweenCreatedAtDatesRange($start, $stop)
    {
        $this->pushCriteria(new CreatedAtBetweenAnd($start, $stop));
        
        return $this;
    }
    
    public function groupByCreatedAtMonth()
    {
        $this->pushCriteria(new GroupByCreatedAtMonth());
        
        return $this;
    }
    
    public function orderByCreatedAt()
    {
        $this->pushCriteria(new OrderByCreatedAt(OrderByCreatedAt::SORT_DESC));
        
        return $this;
    }
}
