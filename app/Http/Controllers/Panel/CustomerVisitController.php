<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\CustomerVisit\CustomerVisitRepository;
use App\Acme\Vouchers\VoucherAppManager;
use App\Criteria\Customer\WithVisitVoucher;
use App\Criteria\Customer\DefaultOrderBy;

class CustomerVisitController extends Controller
{
    protected $customer = null;
    protected $customersPerPage = 35;
    protected $voucherManager = null;
    protected $customerVisit = null;
    
    public function __construct(CustomerRepository $customer, VoucherAppManager $voucherManager, CustomerVisitRepository $customerVisit)
    {
        $this->customer = $customer;
        $this->voucherManager = $voucherManager;
        $this->customerVisit = $customerVisit;
    }
    
    /**
     * 
     * @return type
     */
    public function index()
    {
        $this->customer->pushCriteria(new DefaultOrderBy());
        $this->customer->pushCriteria(new WithVisitVoucher());    
        $customers = $this->customer->scopeQuery(function($query) {
            
            return $query->where('customer_voucher_visit_limit', '>', 0);
            
        })->with('VisitVoucher')->all();

        return view('panel.customerVisit.index', compact('customers'));
    }
    
    /**
     * 
     * @param Request $request
     * @return type
     */
    public function store(Request $request)
    {
        $this->customerVisit->insertVisit($request->all());
        
        return back();
    }
    
    /**
     * 
     * @param Request $request
     * @return type
     */
    public function cancel(Request $request)
    {
        $this->customerVisit->cancelVisit($request->all());
        
        return back();
    }
}
