<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade')->onUpdate('cascade');
            $table->text("title");
            $table->text("subtitle");
            $table->text("description");
            $table->string('beds');
            $table->string('baths');
            $table->decimal("discount",8, 2);
            $table->decimal('price', 8, 2);
            $table->decimal("discount_price", 8, 2);
            $table->string('total');
            $table->text('private_policy');
            $table->text('info');
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
        Schema::dropIfExists('hotel_rooms');
    }
}
