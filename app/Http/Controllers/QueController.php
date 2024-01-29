<?php

namespace App\Http\Controllers;

use App\Models\FeedItem;
use App\Models\Question;
use App\Models\QuestionAnswers;
use App\Models\Tag;
use App\Models\User;
use App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueController extends Controller
{
    public function index(Request $request){
        $idFeed = $request->route("idFeed");
        $Feed = FeedItem::select("id_feed", "title", "upvote", "downvote")->where("id_url", "=", $idFeed)->first();
        if(!$Feed)
            abort(404);
        $Question = Question::join("q_feed_item", "q_question.id_que", "=","q_feed_item.id_feed")
            ->select("*")->where("q_question.id_que", "=",$Feed->id_feed)
            ->where("q_feed_item.deleted", "=", 0)->first();
        if(!$Feed)
            abort(404);
        $QTags = Tag::join("q_feed_tag", "q_feed_tag.id_tag", "=", "q_tag.id_tag")
            ->select("q_tag.title", "q_tag.id_url", "q_tag.title", "q_tag.used_num")
            ->where("q_feed_tag.id_feed", "=", $Feed->id_feed)->get();
        $QUser = User::select("id_url", "id_user", "full_name", "image")
            ->where($Feed->id_user)->first();
            
        $QAns = QuestionAnswers::join("q_user", "q_user.id_user", "=", "q_que_ans.id_user")
            ->select("q_que_ans.id_ans", DB::raw("(upvote - downvote) vote_ord"), 
                "q_que_ans.ans_text", "q_que_ans.time_stamp", "q_que_ans.upvote", "q_que_ans.downvote", "q_user.full_name")
            ->where("q_que_ans.id_que", "=", $Question->id_que)
            ->where("q_que_ans.deleted", "=", 0)->limit(5)->get();
        //"q_que_ans.id_que = :idq AND q_que_ans.deleted = 0 $OrderBy LIMIT 1 OFFSET $AnsOffset",
        return view("show_que", 
            [
                "Feed" => $Feed,
                "Question" => $Question,
                "QTags" => $QTags,
                "QUser" => $QUser,
                "QAns" => $QAns
            ]
        );
    }
}
