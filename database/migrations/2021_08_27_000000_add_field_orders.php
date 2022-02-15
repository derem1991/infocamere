<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldOrders extends Migration
{
	public function up()
    {
	    Schema::table('orders', function (Blueprint $table) 
	    {
            $table->string('file_output')->nullable()->after('price');
        });
    }
}
