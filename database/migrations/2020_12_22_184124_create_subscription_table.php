<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('uuid')->nullable();
            $table->integer('user_id');
            $table->integer('member_id');
            $table->dateTime('start_date',0)->nullable();
            $table->dateTime('end_date',0)->nullable();
            $table->string('status',100);
            $table->string('payment_method',100);
            $table->string('payment_status',100);
            $table->decimal('amount',10,2);
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
