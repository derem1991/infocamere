<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;
 

class CreateStatusSeeder extends Seeder
{ 
    public function run()
    {
        $status = Status::create([
        	'name'             => 'In attesa',
            'slug'             => 'pending',
            'color'            => '#5e72e4',
            'background'       => '#5e72e4',
        ]);

        $status = Status::create([
        	'name'             => 'Completato',
            'slug'             => 'completed',
            'color'            => '#2dce89',
            'background'       => '#2dce89',
        ]);

        $status = Status::create([
        	'name'             => 'Rifiutato',
            'slug'             => 'rejected',
            'color'            => '#f5365c',
            'background'       => '#f5365c',
        ]);
    }
}
 