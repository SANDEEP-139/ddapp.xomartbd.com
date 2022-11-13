<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('restaurant_menu_id')->constrained('restaurant_menus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('restaurant_menu_food_id')->constrained('restaurant_menu_foods')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal("price",8,2);
            $table->decimal("delivery_charge",8,2);
            $table->decimal("total_price",8,2);
             $table->enum('order_status', ['Pending', 'Confirmed']);  
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
        Schema::dropIfExists('restaurant_orders');
    }
}
