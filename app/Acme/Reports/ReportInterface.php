<?php

namespace App\Acme\Reports;

interface ReportInterface
{
    public function generate($startDate, $endDate, \App\Acme\Reports\ReportOutputInterface $output);
}