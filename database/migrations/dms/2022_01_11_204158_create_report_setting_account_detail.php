<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportSettingAccountDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_setting_account_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_setting_account_id');
            $table->unsignedBigInteger('account_id');
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('report_setting_account_id', 'fk_report_setting_account_detail_report')->references('id')->on('report_setting_account');
            $table->foreign('account_id', 'fk_report_setting_account_detail_account')->references('id')->on('account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_setting_account_detail');
    }
}
