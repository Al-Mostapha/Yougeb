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
        Schema::create('q_topic', function (Blueprint $table) {
            $table->uuid("id_topic");
            $table->primary("id_topic");
            $table->string("id_url", 64);
            $table->string("title", 64);
            $table->text("brief");
            $table->text("long_brief");
            $table->text("image");
            $table->string("cover", 250)->default("space/cover/1.jpeg");
            $table->integer("follower")->default(0);
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_topic_follower", function(Blueprint $table){
            $table->uuid("id_topic");
            $table->uuid("id_user");
            $table->primary(["id_topic", "id_user"]);
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_topic_tag", function(Blueprint $table){
            $table->uuid("id_topic");
            $table->uuid("id_tag");
            $table->primary(["id_topic", "id_tag"]);
            $table->integer("weight")->default(0);
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_trigraph", function(Blueprint $table){
            $table->uuid("id")->primary();
            $table->string("id_url", 64);
            $table->string("title", 64);
            $table->text("body");
            $table->text("keyword");
            $table->tinyInteger("type")->default(1);
            $table->uuid("id_ref");
            $table->integer("score")->default(0);
            $table->tinyInteger("deleted")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic');
    }
};
