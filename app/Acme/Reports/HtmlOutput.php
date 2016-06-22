<?php

namespace App\Acme\Reports;

use App\Acme\Reports\ReportOutputInterface;

class HtmlOutput implements ReportOutputInterface 
{
    
    /**
     * 
     * @param type $data
     * @return type
     */
    public function output($view, $data)
    {
        return view($view, $data);
    }
    
}