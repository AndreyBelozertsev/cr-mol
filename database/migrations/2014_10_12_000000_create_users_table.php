<?php

use App\Models\City;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('patronymic')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('password');
            $table->foreignIdFor(City::class)
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->string('vkontakte_id');
            $table->rememberToken();
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
