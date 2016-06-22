<?php

namespace App\Repositories\CustomerSingleEntry;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerSingleEntry\CustomerSingleEntryRepository;
use App\Entities\CustomerSingleEntry\CustomerSingleEntry;
use App\Validators\CustomerSingleEntry\CustomerSingleEntryValidator;

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
}
