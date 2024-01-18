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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status',['ativo','inativo'])->default('ativo');
           
            $table->foreignId('category_id');
            $table->foreignId('modality_id');
            $table->unsignedTinyInteger('teacher_id');
            $table->foreignId('locals_id');
            $table->integer('year');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('teacher_id')
            ->references('id')
            ->on('teachers')
            ->onDelete('cascade');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

            $table->foreign('modality_id')
            ->references('id')
            ->on('modalities')
            ->onDelete('cascade');

            $table->foreign('locals_id')
            ->references('id')
            ->on('locals')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
