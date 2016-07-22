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
    
    const FORM_CUSTOMER_ID_INDEX = 'id';
    const FORM_CUSTOMER_VOUCHER_PAYED_INDEX = 'customer_voucher_payed';
    
    public function allWithVoucher();
    public function allWithNotAvailableVouchers();
    public function createWithAssignVoucher($data, Voucher $voucher);
    public function createWithAssignVoucherTransaction($data, Voucher $voucher);
    public function assignVoucher($data, Voucher $voucher);
}
