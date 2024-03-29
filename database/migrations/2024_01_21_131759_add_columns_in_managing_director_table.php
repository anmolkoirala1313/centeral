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
        Schema::table('managing_director', function (Blueprint $table) {
            $table->text('summary')->nullable()->after('description');
            $table->smallInteger('homepage_display')->nullable()->default(0)->after('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('managing_director', function (Blueprint $table) {
            $table->dropColumn('summary');
            $table->dropColumn('homepage_display');
        });
    }
};
