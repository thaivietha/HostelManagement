<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->string('host_id');
            $table->string('room_id');
            $table->string('bill_id');
            $table->string('service_id');
            $table->string('service_name')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
