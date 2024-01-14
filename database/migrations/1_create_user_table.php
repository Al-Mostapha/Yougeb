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

        Schema::create("ayat_quran", function(Blueprint $table){
            $table->uuid("id")->primary();
            $table->integer("sura");
            $table->string("sura_name", 64);
            $table->integer("aya");
            $table->text("aya_text");
            $table->text("aya_text_clean");
        });
        
        Schema::create("page", function(Blueprint $table){
            $table->string("id_url")->primary();
            $table->text("page_con");
            $table->text("ba");
            $table->text("cat");
            $table->text("title");
            $table->integer("v");
            $table->integer("visited");
        });

        Schema::create('q_user', function (Blueprint $table) {
            $table->uuid("id_user")->primary();
            $table->string("id_url", 64)->index();
            $table->string("mention_name", 32);
            $table->string("full_name", 36);
            $table->text("brief")->nullable();
            $table->smallInteger("user_group")->default(0);
            $table->string("email", 128)->index();
            $table->string("enc_pass", 128);
            $table->string("md5_pass", 32);
            $table->text("image");
            $table->integer("follower")->default(0);
            $table->integer("following")->default(0);
            $table->integer("score")->default(0);
            $table->integer("question")->default(0);
            $table->integer("answer")->default(0);
            $table->integer("article")->default(0);
            $table->string("remember_token")->nullable();
            $table->timestamp("time_stamp")->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create("q_user_addr", function(Blueprint $table){
            $table->uuid("id_user");
            $table->foreign("id_user")->cascadeOnUpdate()->references("id_user")->on("q_user");
            $table->string("user_city", 24);
            $table->string("user_country", 24);
        });
        
        Schema::create("q_user_edu", function(Blueprint $table){
            $table->uuid("id_user");
            $table->foreign("id_user")->cascadeOnUpdate()->references("id_user")->on("q_user")  ;
            $table->string("edu_place", 64);
            $table->string("edu_space", 64);
            $table->string("edu_degree", 32);
            $table->integer("edu_end_year");
        });

        Schema::create("q_user_follower", function(Blueprint $table){
            $table->uuid("id_user");
            $table->foreign("id_user")->cascadeOnUpdate()->references("id_user")->on("q_user");
            $table->uuid("id_follower");
            $table->foreign("id_follower")->cascadeOnUpdate()->references("id_user")->on("q_user");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_user_jop", function(Blueprint $table){
            $table->uuid("id_user");
            $table->foreign("id_user")->cascadeOnUpdate()->references("id_user")->on("q_user");
            $table->string("jop_place", 64);
            $table->string("jop_title", 32);
            $table->integer("jop_start");
            $table->integer("jop_end");
        });

        Schema::create("q_user_topic", function(Blueprint $table){
            $table->uuid("id_user");
            $table->foreign("id_user")->cascadeOnUpdate()->references("id_user")->on("q_user");
            $table->uuid("id_topic");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_visitor", function(Blueprint $table){
            $table->ipAddress("ipAddr");
            $table->text("id_url");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->uuid("id_user");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
