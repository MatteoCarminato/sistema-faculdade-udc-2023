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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->date('birth_date')->nullable(); 
            $table->string('phone')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('email')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->string('sex')->nullable();
            $table->enum('type', ['aluno', 'responsavel'])->default('aluno');
            $table->enum('blood_types', ['a+','b+','o+','ab+','a-','b-','o-','ab-'])->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('school')->nullable();
            $table->enum('shift', ['manha', 'tarde', 'noite'])->nullable();
            $table->string('address')->nullable();
            $table->unsignedTinyInteger('city_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('number')->nullable();
            $table->string('complements')->nullable();
            $table->string('district')->nullable();
            $table->boolean('active')->default(true);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('cascade');    

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
