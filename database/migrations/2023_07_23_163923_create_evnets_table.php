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
        Schema::create('evnets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('language')->nullable();
            $table->string('date_event')->nullable();
            $table->string('image')->nullable();
            $table->text('location_event')->nullable();
            $table->integer('total')->default('0');
            $table->double('ticketCost', 8, 2)->default('0.00');
            $table->integer('e_status')->default('0');
            $table->integer('rows')->default('0');
            $table->integer('cols')->default('0');
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('evnets');
    }
};
