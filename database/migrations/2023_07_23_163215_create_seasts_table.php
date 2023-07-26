<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasts', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->default('0');
            $table->integer('group_id')->default('0');
            $table->string('seats_name')->nullable();
            $table->integer('user_id')->default('0');
            $table->integer('status')->default('0');
            $table->integer('status_order')->default('0');
            $table->integer('status_checkin')->default('0');
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
        Schema::dropIfExists('seasts');
    }
};
