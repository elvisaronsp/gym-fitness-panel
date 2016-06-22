<?php

namespace App\Repositories\CustomerVoucher;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerVoucher\CustomerVoucherRepository;
use App\Entities\CustomerVoucher\CustomerVoucher;
use App\Validators\CustomerVoucher\CustomerVoucherValidator;

/**
 * Class CustomerVoucherRepositoryEloquent
 * @package namespace App\Repositories\CustomerVoucher;
 */
class CustomerVoucherRepositoryEloquent extends BaseRepository implements CustomerVoucherRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerVoucher::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
