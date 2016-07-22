<?php

namespace App\Acme\Reports;

use App\Acme\Reports\ReportInterface;
use App\Acme\Reports\ReportOutputInterface;
use App\Repositories\CustomerSingleEntry\CustomerSingleEntryRepository;

class SingleEntryReport implements ReportInterface
{
    protected $customerSingleEntry = null;
    
    public function __construct(CustomerSingleEntryRepository $customerSingleEntry)
    {
        $this->customerSingleEntry = $customerSingleEntry;
    }
    
    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @param ReportOutputInterface $output
     * @return type
     */
    public function generate($startDate, $endDate, ReportOutputInterface $output) 
    {
        $entries = $this->getEntries($startDate, $endDate); 
        
        return $output->output('report.singleEntry', compact('startDate', 'endDate', 'entries'));
    }
    
    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getEntries($startDate, $endDate)
    {
        $this->customerSingleEntry->summary();
        $this->customerSingleEntry->betweenCreatedAtDatesRange($startDate, $endDate);
        $this->customerSingleEntry->groupByCreatedAtMonth();
        $this->customerSingleEntry->orderByCreatedAt();
        
        return $this->customerSingleEntry->all();
    }
}
