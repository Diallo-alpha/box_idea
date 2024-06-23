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
        Schema::table('idees', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id')->nullable()->after('description');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('idees', function (Blueprint $table) {
            //
            $table->dropForeign(['categories_id']);
            $table->dropColumn('categories_id');
        });
    }
};
