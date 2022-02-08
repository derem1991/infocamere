<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentHasWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('document_has_wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('document_id')->constrained('documents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('wallet_id')->constrained('wallets')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->float('cost')->default(0.00); //costo 
            $table->float('price')->default(0.00); // prezzo
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('document_has_wallets');
    }
}
 
