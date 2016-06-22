<?php

namespace App\Acme\Reports;

use App\Acme\Reports\ReportOutputInterface;
use PDF;

class PdfOutput implements ReportOutputInterface 
{
    
    /**
     * 
     * @param type $data
     * @return type
     */
    public function output($view, $data)
    {
        $pdf = PDF::loadView($view, $data);
        
        return $pdf->stream('report.pdf');
    }
    
}