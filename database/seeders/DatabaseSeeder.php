<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         \App\Models\User::factory(10)->create();
        Admin::create([
            'name'=>'area',
            'phone'=>'0951231232',
            'email'=>'area@gmail.com',
            'type'=>'admin',
            'password'=>bcrypt('asdasdasd'),
        ]);
    

        for ($i = 1; $i <= 15; $i++) {     
            Invoice::create([
                'username'=>'Khant Min Kyi',
                'phone'=>'(+95)09951978176',
                'email'=>'area@gmail.com',
                'facetoken'=>'BNB',
                'basetoken'=>'BOND',
                'amount'=>'1',
                'paymentmethod'=>'Kpay',
                'referenceno'=>'3465342632457435734657',
                'transaction_id'=>'13245134532451324',
                'order'=>'confirmed',
            ]);
        }
    }
}


