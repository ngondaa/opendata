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
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider_id')->nullable()->after('password');
            $table->string('provider')->nullable()->after('provider_id');
            $table->string('provider_token')->nullable()->after('provider');
            $table->string('provider_refresh_token')->nullable()->after('provider_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('provider_id');
            $table->dropColumn('provider');
            $table->dropColumn('provider_token');
            $table->dropColumn('provider_refresh_token');
        });
    }
};
