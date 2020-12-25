<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('name');
            $table->string('email');
            $table->string('business_name');
            $table->text('business_address');
            $table->tinyInteger('isRegistered');
            $table->text('about')->nullable();
            $table->text('summary')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('votes')->default(0);
            $table->tinyInteger('isWinner')->default(0);
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
        Schema::dropIfExists('brands');
    }
}
