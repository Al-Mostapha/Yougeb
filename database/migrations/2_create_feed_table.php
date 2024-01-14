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
        Schema::create("q_draft", function(Blueprint $table){
            $table->uuid("id_draft")->primary();
            $table->uuid("id_user");
            $table->foreign("id_user")->references("id_user")->on("q_user")->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("content");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create('q_feed_item', function (Blueprint $table) {
            $table->uuid("id_feed");
            $table->primary("id_feed");
            $table->uuid("id_user");
            $table->foreign("id_user")->references("id_user")->on("q_user");
            $table->string("id_url", 225);
            $table->text("title");
            $table->integer("feed_type");
            $table->integer("view_num");
            $table->integer("fav");
            $table->integer("upvote");
            $table->integer("downvote");
            $table->integer("reshare");
            $table->integer("comment");
            $table->integer("share_out");
            $table->boolean("active");
            $table->boolean("comment_lock");
            $table->boolean("share_lock");
            $table->boolean("reshare_lock");
            $table->boolean("deleted");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("time_updated")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_feed_item_ip", function(Blueprint $table){
            $table->uuid("id_feed");
            $table->ipAddress("ip_addr");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_feed_tag", function(Blueprint $table){
            $table->uuid("id_feed");
            $table->uuid("id_tag");
            $table->primary(["id_feed", "id_tag"]);
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_feed_vote", function(Blueprint $table){
            $table->uuid("id_feed");
            $table->uuid("id_user");
            $table->primary(["id_feed", "id_user"]);
            $table->boolean("vote");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->ipAddress("ip");
        });

        Schema::create("q_f_body_edit", function(Blueprint $table){
            $table->uuid("id_edit");
            $table->primary("id_edit");
            $table->uuid("id_feed");
            $table->uuid("id_user");
            $table->text("old_html");
            $table->text("old_text");
            $table->text("old_delta");
            $table->text("new_html");
            $table->text("new_text");
            $table->text("new_delta");
            $table->text("diff_html");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        Schema::create("q_f_title_edit", function(Blueprint $table){
            $table->uuid("id_edit");
            $table->primary("id_edit");
            $table->uuid("id_feed");
            $table->uuid("id_user");
            $table->text("old_title");
            $table->text("new_title");
            $table->text("title_diff");
            $table->timestamp("time_stamp")->default(DB::raw("CURRENT_TIMESTAMP"));
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed');
    }
};
