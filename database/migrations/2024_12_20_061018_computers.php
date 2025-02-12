<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Computers extends Migration
{
    public function up()
{
    Schema::create('computers', function (Blueprint $table) {
        $table->id(); // Mã máy tính
        $table->string('computer_name', 50);
        $table->string('model', 100);
        $table->string('operating_system', 50);
        $table->string('processor', 50);
        $table->integer('memory');
        $table->boolean('available')->default(true);
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
