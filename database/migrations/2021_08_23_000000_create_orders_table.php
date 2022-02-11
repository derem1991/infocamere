<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('document_id')->constrained('documents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('wallet_id')->constrained('wallets')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->float('cost')->default(0.00); //costo 
            $table->float('price')->default(0.00); // prezzo
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('orders');
    }
} 
