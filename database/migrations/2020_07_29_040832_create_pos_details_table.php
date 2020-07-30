<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_details', function (Blueprint $table) {
						$table->increments('id');
						$table->integer('pos_header_id')->unsigned();
						$table->foreign('pos_header_id')->references('id')->on('pos_headers');
						$table->integer('product_id')->unsigned();
						$table->foreign('product_id')->references('id')->on('products');
						$table->double('qty');
						$table->double('price');
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
        Schema::dropIfExists('pos_details');
    }
}
