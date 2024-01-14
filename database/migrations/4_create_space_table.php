<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('q_space', function (Blueprint $table) {
            $table->uuid("id_space");
            $table->primary("id_space");
            $table->string("id_url", 64);
            $table->text("cover_image");
            $table->text("logo_image");
            $table->string("title", 64);
            $table->text("brief");
            $table->integer("follower");
            $table->integer("question");
            $table->integer("article");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_tag", function(Blueprint $table){
            $table->uuid("id_tag");
            $table->primary("id_tag");
            $table->string("title", 32);
            $table->string("id_url", 64);
            $table->uuid("id_creator");
            $table->integer("used_num")->default(0);
            $table->text("brief");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('space');
    }
};
