<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('content')->nullable();
            $table->foreignIdFor(Category::class)
                    ->nullable()
                    ->constrained()
                    ->onUpdate('cascade')
                    ->nullOnDelete();
            $table->boolean('status')->default(true);
            $table->string('type_of')->default('standart');    
            $table->integer('sort')->default(500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
