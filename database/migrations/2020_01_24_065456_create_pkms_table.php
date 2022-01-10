<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkms', function (Blueprint $table) {
            //tabel pkm yang dibuat ketua

            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('title');
            $table->string('type');
            $table->string('lecturer_id');
            $table->string('class');
            $table->string('member_1_nim');
            $table->string('member_1_nama');
            $table->string('member_2_nim');
            $table->string('member_2_nama');
            $table->string('status');
            $table->date('created');
            $table->date('uploaded')->nullable();
            $table->date('revision')->nullable();
            $table->text('comment')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkms');
    }
}
