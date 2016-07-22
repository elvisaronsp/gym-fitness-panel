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

        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerRepository $customer, VisitVoucher $voucher)
    {
        return $this->r->generate('2016-04-03', '2016-04-30', new \App\Acme\Reports\HtmlOutput());
        
        
        
        //$r->
        
        /*
        $o = $customer->getVoucherObject('visitVoucher');
        dd($o);
        
        $voucher->setPayedAt('2016-04-22 21:00:00');
        $customer->createWithAssignVoucher(['customer_name' => 'David von V', 'customer_surname' => 'Smith', 'customer_phone' => '600 900 800'], $voucher);
        
        dd();
                
        DB::transaction(function () use ($customer){
            $c = $customer->create(['customer_name' => 'David von V', 'customer_surname' => 'Smith', 'customer_phone' => '600 900 800']);

            $this->v->assignToCustomer($c->customer_id);
        });
        
        dd();
        
        $customer->update(['customer_surname' => 'Smith', 'customer_phone' => '600 900 899'], $c->customer_id);
        var_dump($customer->all());
         * 
         */
    }
    
    public function user()
    {
        return User::create([
            'name' => 'Bartłomiej',
            'email' => 'organbartlomiej@gmail.com',
            'password' => bcrypt('zalogujsie'),
        ]);
    }
}
