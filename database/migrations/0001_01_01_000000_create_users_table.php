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
            $table->string('id', 36)->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->enum('role', ['ADMINISTRADOR', 'USUÁRIO'])->default('USUÁRIO');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('user_id', 36);
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('country')->default('BRASIL');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('user_id', 36);
            $table->string('address_id', 36);
            $table->string('title');
            $table->text('description');
            $table->decimal('monthly_rent', 10, 2);
            $table->integer('number_of_rooms');
            $table->integer('number_of_bathrooms');
            $table->enum('status', ['DISPONÍVEL', 'ALUGADO', 'INDISPONÍVEL'])->default('DISPONÍVEL');
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
        });

        Schema::create('property_photos', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('property_id', 36);
            $table->string('path');
            $table->enum('type', [
                'frontal', 
                'banheiro', 
                'cozinha', 
                'quarto', 
                'sala', 
                'área_externa', 
                'garagem', 
                'jardim', 
                'varanda'
            ])->default('frontal');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('property_id')->references('id')->on('properties');
        });

        Schema::create('leases', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('property_id', 36);
            $table->string('tenant_id', 36);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('monthly_rent', 10, 2);
            $table->enum('status', ['ATIVO', 'CONCLUÍDO', 'RESCINDIDO'])->default('ATIVO');
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('tenant_id')->references('id')->on('users');
        });
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id', 36)->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_photos');
        Schema::dropIfExists('leases');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
