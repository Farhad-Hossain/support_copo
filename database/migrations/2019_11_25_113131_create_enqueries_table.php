<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnqueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enqueries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->tinyInteger('board');
            $table->integer('eiin')->nullable()->comment('Institute Number');
            $table->string('eiin_password')->nullable()->comment('Institute Password');
            $table->string('student_reg')->nullable()->comment('Registration Number');            
            $table->string('service');
            $table->text('message');
            $table->text('feedback_message')->nullable()->comment('feedback message to client');
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->tinyInteger('enquery_from')->comment('1:Institute 2:Board');
            $table->tinyInteger('actioned_by')->default('0')->comment('Who has made action in this query');
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
        Schema::dropIfExists('enqueries');
    }
}
