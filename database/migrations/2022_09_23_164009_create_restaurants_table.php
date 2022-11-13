<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("location");
            $table->text("description");
            $table->decimal("latitude");
            $table->decimal("longitude");
            $table->text("youtube_link");
            $table->decimal("discount",8, 2)->nullable();
            $table->text("contact_no");
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
        Schema::dropIfExists('restaurants');
    }
}
