<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('content');
            $table->foreignId('thread_id')->onCascade('delete');
            $table->foreignId('user_id')->onCascade('delete');
            $table->softDeletes();
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
        Schema::dropIfExists('thread_questions');
    }
};
