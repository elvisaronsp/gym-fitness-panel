<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Customer\CustomerRepository;
use App\Repositories\CustomerVisit\CustomerVisitRepository;
use App\Criteria\Customer\DefaultOrderBy;

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
        $this->customer->pushCriteria(new DefaultOrderBy());
        $customers = $this->customer->allWithNotAvailableVouchers();
        
        $visits = $this->customerVisit->scopeQuery(function($query) {
            
            return $query->orderBy('customer_visit_id', 'DESC');
            
        })->with('Voucher')->all();
        
        return view('panel.dashboard.index', compact('customers', 'visits'));
    }
    
    public function makeAppCategories()
    {
        //kategorie cecha
        $cecha = Category::find(1);
        dd($cecha);
    }
}
