<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\CustomerVisit\CustomerVisitRepository;

use App\Criteria\Customer\WithVisitVoucher;
use App\Criteria\Customer\WasMoreThan;
use App\Criteria\Customer\DefaultOrderBy;

class CustomerVisitController extends Controller
{
    
    const PER_PAGE = 35;
    const REQUIRED_VISIT_COUNT = 0;
    
    protected $customer = null;
    protected $voucherManager = null;
    protected $customerVisit = null;
    
    public function __construct(CustomerRepository $customer, CustomerVisitRepository $customerVisit)
    {
        $this->customer = $customer;
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
        $this->customer->pushCriteria(new WasMoreThan(self::REQUIRED_VISIT_COUNT));
        $customers = $this->customer->with('VisitVoucher')->all();

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
