<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payout_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('recent_views');
            $table->integer('is_approved');
            $table->bigInteger('billed_views')->nullable();
            $table->text('receipt_path')->nullable();
            $table->text('approved_by')->nullable();
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
        Schema::dropIfExists('payout_histories');
    }
}
