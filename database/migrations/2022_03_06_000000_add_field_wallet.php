<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldWallet extends Migration
{
	public function up()
    {
	    Schema::table('wallets', function (Blueprint $table) 
	    {
            $table->float('cost_research')->default(0.00); //costo 
            $table->float('price_research')->default(0.00); // prezzo
        });
    }
}
 