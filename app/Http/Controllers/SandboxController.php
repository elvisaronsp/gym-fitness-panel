<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Repositories\Customer\CustomerRepository;
use App\Acme\Vouchers\VisitVoucher;
use DB;

class SandboxController extends Controller
{
    protected $v = null;
    protected $r = null;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VisitVoucher $v, \App\Acme\Reports\VoucherReport $r)
    {
        $this->v = $v;
        $this->r = $r;

    }
}
