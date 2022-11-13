<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartEndDateJoinedByCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->date('campaign_start_date')->default(NOW())->after('campaign_date');
            $table->date('campaign_end_date')->default(NOW())->after('campaign_start_date');
            $table->text('joined_users')->nullable()->after('campaign_end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('campaign_start_date');
        $table->dropColumn('campaign_end_date');
        $table->dropColumn('joined_users');
    }
}
