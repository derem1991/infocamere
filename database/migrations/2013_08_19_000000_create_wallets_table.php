<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('budget')->default(0.00); // budget disponibile per ogni wallet
            $table->float('budget_remaining')->default(0.00); // budget disponibile per ogni wallet
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
 
