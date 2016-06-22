<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Customer\CustomerRepository;
use App\Criteria\Customer\DefaultOrderBy;
use App\Acme\Vouchers\VoucherAppManager;

class CustomerController extends Controller
{
    protected $customer = null;
    protected $customersPerPage = 35;
    protected $voucherManager = null;
    
    public function __construct(CustomerRepository $customer, VoucherAppManager $voucherManager)
    {
        $this->customer = $customer;
        $this->voucherManager = $voucherManager;
    }
    
    /**
     * 
     * @return type
     */
    public function index()
    {
        $this->customer->pushCriteria(new DefaultOrderBy());
        $customers = $this->customer->with('Voucher')->all();
        
        return view('panel.customer.index', compact('customers'));
    }
    
    /**
     * 
     * @return type
     */
    public function create()
    {
        $availableVouchers = $this->voucherManager->getAvailableVouchers(new \App\Acme\Vouchers\AvailableVoucherDropdown());
        
        return view('panel.customer.create', compact('availableVouchers'));
    }
    
    /**
     * 
     * @param \App\Http\Requests\StoreCustomerRequest $request
     * @return type
     */
    public function store(\App\Http\Requests\StoreCustomerRequest $request)
    {
        $voucher = $this->voucherManager->getVoucherObject($request->get('customer_voucher_type'));

        $this->customer->createWithAssignVoucher($request->all(), $voucher);
        
        return redirect(route('panel.customer.index'));
    }
    
    /**
     * 
     * @param type $id
     */
    public function edit($id)
    {
        $customer = $this->customer->with('Vouchers')->find($id);
        
        return view('panel.customer.edit', compact('customer', 'availableVouchers'));
    }
    
    /**
     * 
     * @param \App\Http\Requests\UpdateCustomerRequest $request
     * @param type $id
     * @return type
     */
    public function update(\App\Http\Requests\UpdateCustomerRequest $request, $id)
    {
        $this->customer->update($request->all(), $id);
        
        return back();
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function createRenewVoucher($id)
    {
        $customer = $this->customer->with('Voucher')->find($id);
        
        return view('panel.customer.createRenewVoucher', compact('customer'));
    }
    
    /**
     * 
     * @param Request $request
     * @return type
     */
    public function storeRenewVoucher(Request $request)
    {
        $voucher = $this->voucherManager->getVoucherObject($request->get('customer_voucher_type'));
        
        $this->customer->assignVoucher($request->all(), $voucher);
        
        return redirect(route('panel.customer.index'));
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function delete($id)
    {
        $this->customer->delete($id);
        
        return redirect(route('panel.customer.index'));
    }
}
