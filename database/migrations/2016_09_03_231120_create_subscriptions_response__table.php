<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions_response', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->integer('reason_code');
            $table->string('auth_code');
            $table->string('trans_id');
            $table->string('reason_text');
            $table->integer('subscription_id');
            $table->integer('subscription_paynum');
            $table->text('meta');
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
        Schema::drop('subscriptions_response');
    }
}
