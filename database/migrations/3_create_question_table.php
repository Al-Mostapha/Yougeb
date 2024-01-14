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
        Schema::create('q_question', function (Blueprint $table) {
            $table->uuid("id_que")->primary();
            $table->text("content_delta");
            $table->text("content_text");
            $table->text("content_html");
            $table->integer("ans_num");
        });

        Schema::create("q_que_ans", function(Blueprint $table){
            $table->uuid("id_ans")->primary();
            $table->uuid("id_que");
            $table->uuid("id_user");
            $table->foreign("id_que")->references("id_que")->on("q_question");
            $table->foreign("id_user")->references("id_user")->on("q_user");
            $table->text("ans_text");
            $table->text("ans_delta");
            $table->text("ans_html");
            $table->integer("upvote");
            $table->integer("downvote");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->ipAddress("ip");
            $table->boolean("deleted");
        });

        Schema::create("q_que_ans_edit", function(Blueprint $table){
            $table->uuid("id_edit")->primary();
            $table->uuid("id_ans");
            $table->uuid("id_user");
            $table->foreign("id_user")->references("id_user")->on("q_user");
            $table->foreign("id_ans")->references("id_ans")->on("q_que_ans");
            $table->text("old_html");
            $table->text("old_delta");
            $table->text("old_text");
            $table->text("new_html");
            $table->text("new_delta");
            $table->text("new_text");
            $table->text("diff_html");
            $table->timestamp("time_stamp");
        });

        Schema::create("q_que_ans_vote", function(Blueprint $table){
            $table->uuid("id_user");
            $table->uuid("id_ans");
            $table->boolean("vote");
            $table->primary(["id_user", "id_ans"]);
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->ipAddress("ip");
        });

        Schema::create("q_signup_ip", function(Blueprint $table){
            $table->uuid("id_user");
            $table->ipAddress("ipAdd");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
