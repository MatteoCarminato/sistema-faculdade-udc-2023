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
        Schema::create('group_hours', function (Blueprint $table) {
            $table->id();
            $table->string('weekday');
            $table->string('hour');
            $table->integer('year');
            $table->unsignedTinyInteger('teacher_id');
            $table->foreignId('locals_id');
            $table->foreignId('groups_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('teacher_id')
            ->references('id')
            ->on('teachers')
            ->onDelete('cascade');

            $table->foreign('locals_id')
            ->references('id')
            ->on('locals')
            ->onDelete('cascade');

            $table->foreign('groups_id')
            ->references('id')
            ->on('groups')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_hours');
    }
};
