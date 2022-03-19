<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchsTable extends Migration
{
    public function up()
    {
        Schema::create('researchs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('wallet_id')->constrained('wallets')->onUpdate('cascade')->onDelete('cascade');
            $table->text('xml')->nullable();
            $table->float('cost')->default(0.00); //costo 
            $table->float('price')->default(0.00); // prezzo
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('researchs');
    }
} 
