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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();#Impide duplicados
            $table->timestamp('email_verified_at')->nullable();#Vacio hasta que el usuario confirme su correo
            $table->string('password')->nullable(); #Permite registros sin contraseña local
            $table->rememberToken();
            $table->foreignId('career_id')->nullable()->constrained('careers');#Opcional al momento de registro
            $table->boolean('terms_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
