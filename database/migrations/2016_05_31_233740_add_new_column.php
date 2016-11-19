<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string("credit_card_type",30)->after('card_exp_date');
            $table->string("customer_profile_id",50)->after('card_exp_date');
            $table->string("customer_payment_profile_id",50)->after('card_exp_date');
            $table->string("customer_address_id",50)->after('card_exp_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('credit_card_type');
            $table->dropColumn('customer_profile_id');
            $table->dropColumn('customer_payment_profile_id');
            $table->dropColumn('customer_address_id');
        });
    }
}
