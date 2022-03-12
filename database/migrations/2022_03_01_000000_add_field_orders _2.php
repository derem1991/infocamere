<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldOrders2 extends Migration
{
	public function up()
    {
	    Schema::table('orders', function (Blueprint $table) 
	    {
            $table->text('xml')->nullable()->after('file_output');
        });
    }
}
