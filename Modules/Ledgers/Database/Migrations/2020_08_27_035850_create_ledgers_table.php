<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('member_id');
			$table->decimal('thrift_savings',12, 2)->nullable();
			$table->decimal('share_capital',12, 2)->nullable();
			$table->decimal('loan_balance',12, 2)->nullable();
			$table->decimal('loan_interest',12, 2)->nullable();
            $table->date('start_date')->nullable();;
            $table->date('end_date')->nullable();;

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
        Schema::dropIfExists('ledgers');
    }
}
