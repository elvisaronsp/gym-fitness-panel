<?php

namespace App\Repositories\CustomerVisit;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerVisit\CustomerVisitRepository;
use App\Entities\CustomerVisit\CustomerVisit;
use App\Validators\CustomerVisit\CustomerVisitValidator;

/**
 * Class CustomerVisitRepositoryEloquent
 * @package namespace App\Repositories\CustomerVisit;
 */
class CustomerVisitRepositoryEloquent extends BaseRepository implements CustomerVisitRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerVisit::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function insertVisit(array $data)
    {
        $data['customer_visit_quantity'] = 1;
        
        return $this->create($data);
    }
    
    public function cancelVisit(array $data)
    {
        $data['customer_visit_quantity'] = -1;
        
        return $this->create($data); 
    }
}
