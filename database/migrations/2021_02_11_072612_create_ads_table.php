<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('img_url')->nullable();
            $table->integer('user_id')->index();
            $table->integer('region_id')->index();
            $table->integer('city_id')->index();
            $table->integer('model_id');
            $table->integer('mark_id');
            $table->integer('color_id');
            $table->string('year')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->date('expire_date')->nullable();
            $table->float('amount', 8, 2)->default('0.00');
            $table->string('currency')->default('UZS');
            $table->tinyInteger('is_credit')->default(0);
            $table->string('lat_lon')->nullable();
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
        Schema::dropIfExists('ads');
    }
}
