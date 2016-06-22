<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Acme\Reports\VoucherReport;

class ReportController extends Controller
{
    
    protected $voucherReport = null;
    
    public function __construct(VoucherReport $voucherReport)
    {
        $this->voucherReport = $voucherReport;
    }
    
    /**
     * 
     * @param type $reportType
     * @return \App\Acme\Reports\ReportInterface
     * @throws \RuntimeException
     */
    protected function getReportObject($reportType)
    {
        $reportLookupArray = config('reportLookup');
        
        if( ! array_key_exists($reportType, $reportLookupArray)) {
            throw new \RuntimeException('Incorrect report type, pass one from: ' .implode(', ', array_keys($reportLookupArray)));
        }

        $className = $reportLookupArray[$reportType];

        return ( app($className) ); 
    }
    
    /**
     * 
     * @return type
     */
    public function index()
    {
        $now = \Carbon\Carbon::now();
        
        $starDate = $now->firstOfMonth()->format('Y-m-d');
        $endDate = $now->lastOfMonth()->format('Y-m-d');
        
        return view('panel.report.voucherReport', compact('starDate', 'endDate'));
    }
    
    /**
     * 
     * @param Request $request
     * @param type $reportType
     * @return type
     */
    public function generateReport(Request $request)
    {
        $report = $this->getReportObject($request->get('type'));
  
        return $report->generate($request->get('start_date'), $request->get('end_date'), new \App\Acme\Reports\PdfOutput());
    }
}
