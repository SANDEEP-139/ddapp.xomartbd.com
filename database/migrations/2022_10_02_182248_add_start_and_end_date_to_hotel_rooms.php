<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartAndEndDateToHotelRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_rooms', function (Blueprint $table) {
            if (!Schema::hasColumn('hotel_rooms', 'start_date')){
           
           $table->date("start_date")->after('info')->nullable();
           }
            if (!Schema::hasColumn('hotel_rooms', 'end_date')){
          $table->date("end_date")->after('start_date')->nullable();
        }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_rooms', function (Blueprint $table) {
            //
        });
    }
}
