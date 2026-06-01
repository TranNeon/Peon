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
        Schema::table('post_requests', function (Blueprint $table) {
            $table
                ->foreignId("reviewer_id")
                ->nullable()
                ->references("id")
                ->on("users");
            //nullable means  not approved
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_requests', function (Blueprint $table) {
            $table->dropColumn('reviewer_id');
        });
    }
};
