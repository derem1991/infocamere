<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldDocuments extends Migration
{
	public function up()
    {
	    Schema::table('documents', function (Blueprint $table) 
	    {
            $table->foreignId('wallet_id')->after('is_cfiscale')->constrained('statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('method')->nullable()->after('wallet_id');
        });
    }
}
