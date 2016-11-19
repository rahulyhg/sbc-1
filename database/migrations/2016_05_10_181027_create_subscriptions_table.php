<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('authorizenet_subscription_id', 13); // The payment gateway assigned identification number for the subscription. 
			$table->string('authorizenet_subscription_status'); // Contains information about the subscription status. Values include: active, expired, suspended, cancelled, or terminated.
			$table->string('card_last_four', 4);
			$table->tinyInteger('active')->default(0); // does the user have active subscription		
            $table->date('purchase_date');
            $table->date('renewal_date');
            $table->timestamps();
            
            $table->foreign('user_id')
            	->references('id')
            	->on('users')
            	->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscriptions');
    }
}
