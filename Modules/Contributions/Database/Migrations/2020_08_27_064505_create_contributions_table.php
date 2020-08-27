<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributions', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('member_id');
            $table->date('contribution_date')->nullable();
            $table->text('particulars')->nullable();
            $table->string('type')->nullable();
            $table->decimal('debit_amount',12, 2)->nullable();
            $table->decimal('credit_amount',12, 2)->nullable();
            $table->decimal('balance',12, 2)->nullable();

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
        Schema::dropIfExists('contributions');
    }
}
