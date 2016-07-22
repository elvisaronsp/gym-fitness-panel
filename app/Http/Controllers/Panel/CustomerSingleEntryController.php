<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CustomerSingleEntry\CustomerSingleEntryRepository;

    use App\Criteria\CustomerSingleEntry\SumEntries;
    use App\Criteria\CustomerSingleEntry\GroupByCreatedAtMonth;
    use App\Criteria\CustomerSingleEntry\OrderByCreatedAt;

class CustomerSingleEntryController extends Controller
{
    
    const DEFALUT_ENTRY_QUANTITY = 1;
    const PER_PAGE = 31;
    
    protected $customerSingleEntry = null;
    
    public function __construct(CustomerSingleEntryRepository $customerSingleEntry)
    {
        $this->customerSingleEntry = $customerSingleEntry;
    }
    
    public function index()
    {
        $this->customerSingleEntry->summary();
        $this->customerSingleEntry->groupByCreatedAtMonth();
        $this->customerSingleEntry->orderByCreatedAt();
        $entries = $this->customerSingleEntry->paginate(self::PER_PAGE);

        return view('panel.singleEntry.index', compact('entries'));
    }
    
    public function store(Request $request)
    {
        $this->customerSingleEntry->create([
            'customer_single_entry_quantity' => self::DEFALUT_ENTRY_QUANTITY
        ]);
        
        return back();
    }
}
