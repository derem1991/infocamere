<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wallet;
 

class CreateWalletSeeder extends Seeder
{ 
    public function run()
    {
        $wallet = Wallet::create([
        	'name'             => 'wallet',
        	'description'      => 'wallet description',
            'budget'           => 1000,
            'budget_remaining' => 1000,
        ]);
         
    }
}
