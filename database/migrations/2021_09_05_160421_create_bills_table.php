<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('host_id');
            $table->string('room_id');
            $table->string('room_name');
            $table->string('month_year')->unique();
            $table->string('room_price')->nullable();;
            $table->string('elec_price')->nullable();;
            $table->string('water_price')->nullable();;
            $table->string('internet_price')->nullable();;
            $table->string('other_price')->nullable();;
            $table->string('total_price')->nullable();;
            $table->string('paid');
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
        Schema::dropIfExists('bills');
    }
}
