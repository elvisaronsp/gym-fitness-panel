<?php

namespace App\Acme\Reports;

use App\Acme\Reports\ReportInterface;
use App\Acme\Reports\ReportOutputInterface;
use App\Repositories\CustomerVoucher\CustomerVoucherRepository;

class VoucherReport implements ReportInterface
{
    protected $customerVoucher = null;
    
    public function __construct(CustomerVoucherRepository $customerVoucher)
    {
        $this->customerVoucher = $customerVoucher;
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
        $vouchers = $this->getVouchers($startDate, $endDate); 
        $vouchersSummary = $this->getVouchersSummary($startDate, $endDate); 
        
        return $output->output('report.voucher', compact('startDate', 'endDate', 'vouchers', 'vouchersSummary'));
    }
    
    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getVouchers($startDate, $endDate)
    {
        return $this->customerVoucher->scopeQuery(function($query) use ($startDate, $endDate) {
        
            return $query->whereBetween(\DB::raw('DATE(customer_voucher_created_at)'), [$startDate, $endDate])
                    ->whereNotNull('customer_voucher_payed_at');
            
        })->with('Customer')->all();
    }
    
    /**
     * 
     * @param type $startDate
     * @param type $endDate
     * @return type
     */
    public function getVouchersSummary($startDate, $endDate)
    {
        return $this->customerVoucher->scopeQuery(function($query) use ($startDate, $endDate) {
        
            return $query->addSelect(\DB::raw('*, COUNT(customer_voucher_id) AS customer_voucher_summary'))
                    ->whereBetween(\DB::raw('DATE(customer_voucher_created_at)'), [$startDate, $endDate])
                    ->whereNotNull('customer_voucher_payed_at')
                    ->groupBy('customer_voucher_type');
            
        })->all();
    }
}
