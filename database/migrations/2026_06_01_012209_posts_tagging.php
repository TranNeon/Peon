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

        Schema::create("tags", function (Blueprint $table) {
            $table->id()->primary();
            $table->string("name")->unique();
            $table->timestamps();
        });



        Schema::create("tag_posts", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("post_id")
                ->references("id")
                ->on("posts");

            $table
                ->foreignId("tag_id")
                ->references("id")
                ->on("tags");

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tag_posts');
    }
};

