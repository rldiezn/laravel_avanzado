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
        Schema::table('exercises', function (Blueprint $table) {
            $table->string('thumbnail_path')->nullable()->after('image_local_path');
            $table->string('tablet_path')->nullable()->after('thumbnail_path');
            $table->string('desktop_path')->nullable()->after('tablet_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropColumn(['thumbnail_path', 'tablet_path', 'desktop_path']);
        });
    }
};
