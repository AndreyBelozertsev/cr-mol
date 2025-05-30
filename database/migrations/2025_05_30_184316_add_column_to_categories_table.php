<?php

use App\Models\CategoryDirection;
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
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignIdFor(CategoryDirection::class)
                ->after('content')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['category_direction_id']); // Laravel автоматически формирует имя столбца
            $table->dropColumn('category_direction_id');
        });
    }
};
