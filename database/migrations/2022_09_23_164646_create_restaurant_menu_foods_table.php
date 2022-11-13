<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantMenuFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_menu_foods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('restaurant_menu_id')->constrained('restaurant_menus')->onDelete('cascade')->onUpdate('cascade');
            $table->text("name");
            $table->text("description");
            $table->text("list");
            $table->decimal("price",8,2);
            $table->integer("discount");
            $table->decimal("discount_price",8,2);
            $table->decimal("delivery_charge",8,2);
            $table->tinyInteger("is_active")->default(1);
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
        Schema::dropIfExists('restaurant_menu_foods');
    }
}
