<?php

namespace App\Http\Controllers;

use App\Models\FeedItem;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    function index() {
        $Topics  = Topic::paginate(15);
        $filter = env("TOPIC_FILTER_BEST");
        return view("topics", [
            "Topics" => $Topics,
            "filter" => $filter,
            "aFollower" => false
        ]);
    }

    function indexForTopic(string $idTopic){
        $Topic = Topic::where("id_url", "=", $idTopic)->first() ?? abort(404);
        $TopicTags = Tag::join("q_topic_tag", "q_topic_tag.id_tag", "=", "q_tag.id_tag")
            ->select("q_tag.title")
            ->where("q_topic_tag.id_topic", "=", $Topic->id_topic)
            ->orderBy("q_tag.used_num")
            ->limit(15)
            ->get();

        // $Feeds = selectFromTable(
        //     "q_feed_item.*",
        //     "q_feed_tag.id_tag IN () AND q_feed_item.deleted = 0 "
        //     . " GROUP BY q_feed_item.id_item  ORDER BY q_feed_item.upvote DESC LIMIT ".TOPIC_FEED_SHOW_LIMIT." OFFSET $offset", 
        //     ["idt"=>$topic["id_topic"]]);
        DB::statement("SET SQL_MODE=''");
        $Feeds = FeedItem::join("q_feed_tag", "q_feed_tag.id_feed", "=", "q_feed_item.id_feed")
            ->select("q_feed_item.*")
            ->whereRaw("q_feed_tag.id_tag IN (SELECT id_tag FROM q_topic_tag WHERE id_topic = ?)")
            ->where("q_feed_item.deleted", "=")
            ->groupBy("q_feed_item.id_feed")
            ->orderBy("q_feed_item.upvote", "DESC")
            ->limit(env("TOPIC_FEED_SHOW_LIMIT"))
            ->setBindings([$Topic->id_topic, 0])
            ->paginate();
        $filter = env("TOPIC_QUE_FILTER_BEST");
        return view("topic", [
            "Topic" => $Topic,
            "TopicTags" => $TopicTags,
            "isFollower" => false,
            "Feeds" => $Feeds,
            "filter" => $filter
        ]);
    }
}
