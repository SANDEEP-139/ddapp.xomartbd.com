<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("location");
            $table->text("description");
            $table->decimal('price', 8, 2);
            $table->decimal("offer_price", 8, 2);
            $table->decimal("discount",8, 2);
            $table->decimal("latitude");
            $table->decimal("longitude");
            $table->string('contact_no');
            $table->tinyInteger("is_active")->default(1);
            $table->string('email');
            $table->text('fb_page');
            $table->text('website');
            $table->text("youtube_link");
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
        Schema::dropIfExists('hotels');
    }
}
