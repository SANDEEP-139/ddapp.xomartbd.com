<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartDateEndDateToRestaurantMenuFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurant_menu_foods', function (Blueprint $table) {
                if (!Schema::hasColumn('restaurant_menu_foods', 'start_date')){
               
               $table->date("start_date")->after('delivery_charge')->nullable();
               }
                if (!Schema::hasColumn('restaurant_menu_foods', 'end_date')){
            
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
        Schema::table('restaurant_menu_foods', function (Blueprint $table) {
            //
        });
    }
}
