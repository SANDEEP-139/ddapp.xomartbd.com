<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDaysDiscountTravelerToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'no_of_days_remaining')){
            $table->integer('no_of_days_remaining')->after('profile_pic');
            }
            if (!Schema::hasColumn('users', 'discounts_claimed')){
            $table->integer('discounts_claimed')->after('no_of_days_remaining');
            }
            if (!Schema::hasColumn('users', 'taka_saved_traveling')){
            $table->integer('taka_saved_traveling')->after('discounts_claimed');
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
