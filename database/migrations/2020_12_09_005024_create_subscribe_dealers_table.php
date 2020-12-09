<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribeDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_dealers', function (Blueprint $table) {

            $table->id();
            $table->string('category');
            $table->integer('seller_person_id');
            $table->foreign('seller_person_id')->references('id')->on('add_seller_people');
            $table->string('package');
            $table->string('budget');
            $table->string('dealerId');
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
        Schema::dropIfExists('subscribe_dealers');
    }
}
