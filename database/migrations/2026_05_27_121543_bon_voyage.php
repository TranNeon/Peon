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
        Schema::create("drafts", function (Blueprint $table) {
            $table->id();
            $table->text("title");
            $table->longText("content");
            $table->timestamps();
            $table
                ->foreignIdFor(\App\Models\User::class)->constrained()->onDelete("cascade");
        });

        Schema::create("posts", function (Blueprint $table) {
            $table->id();
            $table->text("title");
            $table->longText("content");
            $table->timestamp("created_at");
            $table->timestamp("updated_at");
            $table
                ->foreignId("user_id")
                ->nullable()
                ->references("id")
                ->on("users");
        });

        Schema::create("post_requests", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum("status", ["pending", "accepted",  "declined"]);

            $table
                ->foreignId("draft_id")
                ->references("id")
                ->on("drafts");

            $table
                ->foreignId("post_id")
                ->nullable()
                ->references("id")
                ->on("posts");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_requests');
        Schema::dropIfExists('drafts');
        Schema::dropIfExists('posts');
    }
};
