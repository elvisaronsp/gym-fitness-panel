<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CustomerSingleEntry\CustomerSingleEntryRepository;

class CustomerSingleEntryController extends Controller
{
    protected $customerSingleEntry = null;
    
    public function __construct(CustomerSingleEntryRepository $customerSingleEntry)
    {
        $this->customerSingleEntry = $customerSingleEntry;
    }
    
    public function index()
    {
        $entries = $this->customerSingleEntry->scopeQuery(function($query) {

            return $query->addSelect(\DB::raw('*, SUM(customer_single_entry_quantity) AS customer_single_entry_sum'))
                    ->groupBy(\DB::raw('DATE(customer_single_entry_created_at)'))
                    ->orderBy('customer_single_entry_created_at', 'DESC');

        })->paginate(60);
        
        return view('panel.singleEntry.index', compact('entries'));
    }
    
    public function store(Request $request)
    {
        $this->customerSingleEntry->create(['customer_single_entry_quantity' => 1]);
        
        return back();
    }
}
