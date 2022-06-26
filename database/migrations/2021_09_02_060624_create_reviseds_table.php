<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviseds', function (Blueprint $table) {
            $table->id();
            $table->string('name') -> nullable();
            $table->string('title') -> nullable();
            $table->text('content') -> nullable();
            $table->dateTime('start_date') -> nullable();
            $table->dateTime('finish_date') -> nullable();
            $table->string('material_name') -> nullable();
            $table->string('path') ->nullable();
            $table->boolean('is_deleted')->default(0);
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
        Schema::dropIfExists('reviseds');
    }
}
