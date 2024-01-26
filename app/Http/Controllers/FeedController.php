<?php

namespace App\Http\Controllers;

use App\Models\FeedItem;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class FeedController extends Controller
{
    private Request $request;
    private $limit;
    private $filter;
    private $OrderBy;
    private $cond;

    public function __construct(Request $request){
        $this->limit = 30;
        $this->request = $request;
        if($this->request->has("limit"))
        $this->limit = min(max($request->input("limit") , 10) , 50);
        
        $this->filter = env("FEED_FILTER_UN_ANS");
        $this->OrderBy = "q_feed_item.view_num DESC";
        $this->cond = "q_question.ans_num = 0";

        if(!$this->request->has("sort")){} 
        else if($this->request->input("sort") == env("FEED_FILTER_BEST")){
            $this->OrderBy = "vote DESC";
            $this->cond    =  "1";
            $this->filter  = env("FEED_FILTER_BEST");
        } else if($request->input("sort") == env("FEED_FILTER_OLD")){
            $this->OrderBy = "q_feed_item.time_stamp ASC";
            $this->cond    =  "1";
            $this->filter  = env("FEED_FILTER_OLD");
        } else if($request->input("sort") == env("FEED_FILTER_NEW")){
            $this->OrderBy = "q_feed_item.time_stamp DESC";
            $this->cond    =  "1";
            $this->filter  = env("FEED_FILTER_NEW");
        } else if($request->input("sort") == env("FEED_FILTER_WOREST")){
            $this->OrderBy = "vote ASC";
            $this->cond    =  "1";
            $this->filter  = env("FEED_FILTER_WOREST");
        }
    }

    public function index(){
        $FeedsQuery = FeedItem::join("q_question", "q_question.id_que", "=", "q_feed_item.id_feed")
                    ->join("q_user", "q_user.id_user", "=", "q_feed_item.id_user")
                    ->select(
                        "q_feed_item.*", 
                        DB::raw("(q_feed_item.upvote -  q_feed_item.downvote ) as vote"), 
                        DB::raw("SUBSTRING(q_question.content_text , 1,  250) AS brief"), 
                        "q_question.ans_num", "q_user.id_url AS user_url", "q_user.full_name", "q_user.image")
                    ->whereRaw($this->cond)->orderByRaw($this->OrderBy)->limit($this->limit);

        $paginator = $FeedsQuery->paginate()->withQueryString();
        return view("feeds", [
            "paginator" => $paginator,
            "filter" => $this->filter,
            "Feeds" => $FeedsQuery->get()
        ]);
    }

    public function indexForTag(){
        $filterTag = "";
        $Tag = Tag::select("id_tag", "title", "brief", "id_url")->where("id_url", "=", $this->request->route("idTag"))->first();
        if(!$Tag){
            return abort(404, 'Not Found');;
        }

        $filterTag = " AND q_feed_item.id_feed IN( SELECT id_feed FROM q_feed_tag WHERE id_tag = '{$Tag->id_tag}')";

        $FeedsQuery = FeedItem::join("q_question", "q_question.id_que", "=", "q_feed_item.id_feed")
                    ->join("q_user", "q_user.id_user", "=", "q_feed_item.id_user")
                    ->select(
                        "q_feed_item.*", 
                        DB::raw("(q_feed_item.upvote -  q_feed_item.downvote ) as vote"), 
                        DB::raw("SUBSTRING(q_question.content_text , 1,  250) AS brief"), 
                        "q_question.ans_num", "q_user.id_url AS user_url", "q_user.full_name", "q_user.image")
                    ->whereRaw($this->cond.$filterTag)->orderByRaw($this->OrderBy)->limit($this->limit);
        $TopTopic = Topic::join("q_topic_tag", "q_topic.id_topic", "=", "q_topic_tag.id_topic")
                    ->select("q_topic.title", "q_topic.id_url")
                    ->where("q_topic_tag.id_tag", "=", $Tag->id_tag)
                    ->first();
        $paginator = $FeedsQuery->paginate()->withQueryString();
        return view("feed4tag", [
            "paginator" => $paginator,
            "filter" => $this->filter,
            "Feeds" => $FeedsQuery->get(),
            "Tag" => $Tag->first(),
            "Topic" => $TopTopic ?? new Topic()
        ]);
    }
}
