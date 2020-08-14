<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');

            $table->date('orden_date')->nullable();
            $table->date('arrived_date')->nullable();
            $table->string('status'); // Active(Carrito de Compras), Oredenes -> Pending, Approved, Cancelled, Finished

            // user_id (FK)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            
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
        Schema::dropIfExists('carts');
    }
}
