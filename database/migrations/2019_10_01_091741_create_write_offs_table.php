<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWriteOffsTable extends Migration
{

    public function up()
    {
        Schema::create('write_offs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('loan_id');
            $table->string('reason',255)->default("Payment default");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('write_offs');
    }
}
