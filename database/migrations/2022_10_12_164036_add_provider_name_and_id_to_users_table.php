<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProviderNameAndIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             if (!Schema::hasColumn('users', 'provider_name')){
            $table->string('provider_name')->nullable()->after('taka_saved_traveling');
            }
            if (!Schema::hasColumn('users', 'avatar')){
            $table->string('avatar')->nullable()->after('provider_name');
            }
            if (!Schema::hasColumn('users', 'profile_url')){
            $table->string('profile_url')->nullable()->after('avatar');
            }
            if (!Schema::hasColumn('users', 'provider_id')){
            $table->string('provider_id')->nullable()->after('profile_url');
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
             Schema::dropIfExists('provider_name');
             Schema::dropIfExists('avatar');
             Schema::dropIfExists('profile_url');
             Schema::dropIfExists('provider_id');
        });
    }
}
