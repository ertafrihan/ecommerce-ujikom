<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('poscode')->nullable();
            $table->string('address');
            $table->string('nama_provinsi');
            $table->string('nama_kota');
            $table->string('kurir');
            $table->string('service');
            $table->float('totalberat');
            $table->float('totalongkir');
            $table->float('totalbelanja');
            $table->float('totalbayar');
            $table->string('payment_method');
            $table->string('resi')->nullable();
            $table->string('order_number')->nullable();
            $table->string('invoice_number');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('order_status');
            $table->string('shipping_status');
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
        Schema::dropIfExists('orders');
    }
}
