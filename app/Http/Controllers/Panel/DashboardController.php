<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\CustomerVisit\CustomerVisitRepository;

use App\Criteria\Customer\DefaultOrderBy;
use App\Criteria\CustomerVisit\OrderById;

class DashboardController extends Controller
{
    protected $customer = null;
    protected $customerVisit = null;
    
    public function __construct(CustomerRepository $customer, CustomerVisitRepository $customerVisit)
    {
        $this->customer = $customer;
        $this->customerVisit = $customerVisit;
    }
    
    public function index()
    {
        $customers = $this->getCustomers();
        $visits = $this->getCustomersVisits();
        
        return view('panel.dashboard.index', compact('customers', 'visits'));
    }
    
    private function getCustomers()
    {
        $this->customer->pushCriteria(new DefaultOrderBy());
        return $this->customer->allWithNotAvailableVouchers();
    }
    
    private function getCustomersVisits()
    {
        $this->customerVisit->pushCriteria(new OrderById(OrderById::SORT_DESC));
        return $this->customerVisit->with('Voucher')->all();
    }
}
