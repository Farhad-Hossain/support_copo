<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnqueryTrashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquery_trashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->tinyInteger('board');
            $table->integer('eiin')->nullable()->comment('Institute Number');
            $table->string('service');
            $table->text('message');
            $table->text('feedback_message')->nullable()->comment('feedback message to client');
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0.Pending 1.Sms Sended 2.Solved');
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
        Schema::dropIfExists('enquery_trashes');
    }
}
