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
            $table->date('dateVente')->nullable();
            $table->date('dateLancement')->nullable();
            $table->string('dealerId')->nullable();
            $table->string('newClient')->nullable();
            $table->string('upsellerAd360')->nullable();
            $table->string('oldPrice')->nullable();
            $table->string('newPrice')->nullable();
            $table->string('upgradePackage')->nullable();
            $table->string('benifit')->nullable();
            $table->integer('seller_person_id');
            $table->foreign('seller_person_id')->references('id')->on('add_seller_people');
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
