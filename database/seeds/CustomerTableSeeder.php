<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    private $customerRepository = null;
    
    public function __construct(\App\Repositories\Customer\CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    
    private function getVoucher()
    {
        $voucherLookup = config('voucherLookup');
        $voucherId = array_rand($voucherLookup, 1);
        $voucherClass = $voucherLookup[$voucherId];
        
        return app($voucherClass, ['voucherId' => $voucherId]);
    }
    
    private function getPayedState()
    {
        return rand(0, 1);
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerRepository = $this->customerRepository;
        factory(App\Entities\Customer\Customer::class, 50)->create()->each(function($u) use($customerRepository) {
            //assign voucher to customer
            $voucher = $this->getVoucher();
            
            $data = [
                'id' => $u->customer_id,
                'customer_voucher_payed' => $this->getPayedState()
            ];
            
            $customerRepository->assignVoucher($data, $voucher);
        });
    }
}
