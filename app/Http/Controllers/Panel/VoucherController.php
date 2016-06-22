<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\CustomerVoucher\CustomerVoucherRepository;
use App\Acme\Vouchers\VoucherAppManager;

class VoucherController extends Controller
{

    protected $customer = null;
    protected $customerVoucher = null;
    
    public function __construct(CustomerRepository $customer, CustomerVoucherRepository $customerVoucher, VoucherAppManager $voucherManager)
    {
        $this->customer = $customer;
        $this->customerVoucher = $customerVoucher;
        $this->voucherManager = $voucherManager;
    }
    
    /**
     * 
     * @param type $customerId
     * @return type
     */
    public function edit($customerId)
    {
        $customer = $this->customer->with('Voucher')->find($customerId);

        $availableVouchers = $this->voucherManager->getAvailableVouchers(new \App\Acme\Vouchers\AvailableVoucherDropdown());
        
        unset($availableVouchers[$customer->Voucher->customer_voucher_type]);
        
        return view('panel.customer.editVoucher', compact('customer', 'availableVouchers'));
    }
    
    /**
     * 
     * @param Request $request
     * @return type
     */
    public function update(Request $request)
    {
        $customer = $this->customer->with('Voucher')->find($request->get('id'));
        
        if ($request->get('customer_voucher_type') == $customer->Voucher->customer_voucher_type) {
            return back()->with('the_same_voucher_change', 'Selected voucher is the same as current customer voucher, select other voucher!!!');
        }            
                
        $voucher = $this->voucherManager->getVoucherObject($request->get('customer_voucher_type'));
        
        $this->customer->assignVoucher($request->all(), $voucher);
        
        return redirect(route('panel.customer.edit', $request->get('id')));
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function editExpiredAt($id)
    {
        $voucher = $this->customerVoucher->scopeQuery(function($query) {
            
            return $query->whereNotNull('customer_voucher_expired_at');
            
        })->with('Customer')->find($id);
        
        return view('panel.customer.editVoucherExpiredAt', compact('voucher'));
    }
    
    /**
     * 
     * @param Request $request
     */
    public function updateExpiredAt(Request $request)
    {
        $this->customerVoucher->update($request->except('id'), $request->get('id'));
        
        return back();
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function updatePayedAt($id)
    {
        $this->customerVoucher->update(['customer_voucher_payed_at' => date('Y-m-d H:i:s')], $id);
        
        return back();
    }
}
