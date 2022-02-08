<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('active')->nullable()->default(0); //  
            $table->boolean('is_piva')->nullable()->default(0); // input iva
            $table->boolean('is_cfiscale')->nullable()->default(0); // input codice fiscale
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
 
