<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('worker', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('task_id')->unique();
            $table->boolean('done');
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('worker');
    }
};
