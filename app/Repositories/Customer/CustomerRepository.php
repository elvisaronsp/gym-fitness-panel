<?php

namespace App\Repositories\Customer;

use Prettus\Repository\Contracts\RepositoryInterface;
use App\Acme\Vouchers\Voucher;

/**
 * Interface CustomerRepository
 * @package namespace App\Repositories\Customer;
 */
interface CustomerRepository extends RepositoryInterface
{
    public function allWithNotAvailableVouchers();
    public function createWithAssignVoucher($data, Voucher $voucher);
    public function assignVoucher($data, Voucher $voucher);
}
