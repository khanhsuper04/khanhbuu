<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Issues extends Migration
{
    public function up()
{
    Schema::create('issues', function (Blueprint $table) {
        $table->id(); // Mã vấn đề
        $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade');
        $table->string('reported_by', 50);
        $table->datetime('reported_date');
        $table->text('description');
        $table->enum('urgency', ['Low', 'Medium', 'High']);
        $table->enum('status', ['Open', 'In Progress', 'Resolved']);
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('issues');
    }
}

