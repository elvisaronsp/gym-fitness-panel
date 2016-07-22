<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\CustomerVoucher\CustomerVoucherRepository;
use App\Acme\Vouchers\VoucherAppManager;
use App\Criteria\Voucher\HaveExpiredAtDate;

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
        
        $vouchers = $this->getAllVouchers();
        $availableVouchers = $this->removeVoucherFromVouchers($vouchers, $customer->Voucher->customer_voucher_type);;
        
        return view('panel.customer.editVoucher', compact('customer', 'availableVouchers'));
    }
    
    private function getAllVouchers()
    {
        return $this->voucherManager->getAvailableVouchers(new \App\Acme\Vouchers\AvailableVoucherDropdown());
    }
    
    private function removeVoucherFromVouchers(array $vouchers, $voucherToRemove)
    {
        unset($vouchers[$voucherToRemove]);
        
        return $vouchers;
    }
    
    
    /**
     * 
     * @param Request $request
     * @return type
     */
    public function update(Request $request)
    {
        $customer = $this->customer->with('Voucher')->find($request->get('id'));
        
        if ($this->isSelectedVoucherEqualCurrentVoucher($request->get('customer_voucher_type'), $customer->Voucher->customer_voucher_type)) {
            return back()->with('the_same_voucher_change', 'Selected voucher is the same as current customer voucher, select other voucher!!!');
        }            
                
        $voucher = $this->voucherManager->getVoucherObject($request->get('customer_voucher_type'));
        $this->customer->assignVoucher($request->all(), $voucher);
        
        return redirect(route('panel.customer.edit', $request->get('id')));
    }
    
    
    private function isSelectedVoucherEqualCurrentVoucher($selectedVoucher, $currentVoucher)
    {
        return $selectedVoucher == $currentVoucher;
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function editExpiredAt($id)
    {
        $this->customerVoucher->pushCriteria(new HaveExpiredAtDate());
        $voucher = $this->customerVoucher->with('Customer')->find($id);
        
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
        $voucher = $this->customerVoucher->find($id);
        $this->customerVoucher->update(['customer_voucher_payed_at' => date('Y-m-d H:i:s')], $id);
        
        return redirect(route('panel.customer.edit', $voucher->customer_voucher_customer_id));
    }
}
