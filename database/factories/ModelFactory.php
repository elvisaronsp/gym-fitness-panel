<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->defineAs(App\User::class, 'defaultUser', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => 'demo@somedomain.com',
        'password' => bcrypt('demodemo'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Customer\Customer::class, function (Faker\Generator $faker) {
    return [
        'customer_name' => $faker->firstName,
        'customer_surname' => $faker->lastName,
        'customer_phone' => $faker->phoneNumber,
    ];
});

$factory->defineAs(App\Entities\CustomerVoucher\CustomerVoucher::class, 'tenVisitVoucher', function (Faker\Generator $faker) {
    return [
        'customer_voucher_name' => 'Karnet 10 wizyt',
        'customer_voucher_customer_id' => 1,
        'customer_voucher_type' => 1,
        'customer_voucher_visit_limit' => 10,
        'customer_voucher_visit_used' => 0,
        'customer_voucher_created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
        'customer_voucher_payed_at' => null,
        'customer_voucher_expired_at' => null
    ];
});

$factory->defineAs(App\Entities\CustomerVoucher\CustomerVoucher::class, 'thirtyDaysLengthVoucher', function (Faker\Generator $faker) {
    return [
        'customer_voucher_name' => 'Karnet 30 dni',
        'customer_voucher_customer_id' => 1,
        'customer_voucher_type' => 2,
        'customer_voucher_visit_limit' => null,
        'customer_voucher_visit_used' => null,
        'customer_voucher_created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
        'customer_voucher_payed_at' => null,
        'customer_voucher_expired_at' => \Carbon\Carbon::now()->addDays(30)->format('Y-m-d')
    ];
});

$factory->define(App\Entities\Product\Product::class, function (Faker\Generator $faker) {
    return [
        'product_name' => "Produkt " . $faker->firstName,
        'product_created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Entities\ProductWarehouse\ProductWarehouse::class, function (Faker\Generator $faker) {
    return [
        'product_warehouse_quantity' => rand(-1, 55),
        'product_warehouse_created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});