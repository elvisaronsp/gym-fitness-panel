<?php

namespace App\Acme\Reports;

interface ReportOutputInterface
{
    public function output($view, $data);
}
