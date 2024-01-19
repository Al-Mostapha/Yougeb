<?php

namespace App\Http\Controllers;

use App\Models\FeedItem;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{
    public function index(Request $request){
        $limit = 30;
        $offset = 0;
        if($request->has("limit"))
            $limit = min(max($request->input("limit") , 10) , 50);
        
        $currentPage = 1;
        if($request->has("page")){
            $currentPage = max($request->input("page") , 1);
            $offset    = ($currentPage - 1)*$limit;
        }
        $filter = env("FEED_FILTER_UN_ANS");
        $OrderBy = "q_feed_item.view_num DESC";
        $cond = "q_question.ans_num = 0";

        if(!$request->has("sort")){} 
        else if($request->input("sort") == env("FEED_FILTER_BEST")){
            $OrderBy = "vote DESC";
            $cond    =  "1";
            $filter  = env("FEED_FILTER_BEST");
        } else if($request->input("sort") == env("FEED_FILTER_OLD")){
            $OrderBy = "q_feed_item.time_stamp ASC";
            $cond    =  "1";
            $filter  = env("FEED_FILTER_OLD");
        } else if($request->input("sort") == env("FEED_FILTER_NEW")){
            $OrderBy = "q_feed_item.time_stamp DESC";
            $cond    =  "1";
            $filter  = env("FEED_FILTER_NEW");
        } else if($request->input("sort") == env("FEED_FILTER_WOREST")){
            $OrderBy = "vote ASC";
            $cond    =  "1";
            $filter  = env("FEED_FILTER_WOREST");
        }
        
        $filterTag = "";
        if($request->route("idTag")){
            $Tag = Tag::select("id_tag", "title", "brief", "id_url")->where("id_url", "=", $request->route("idTag"));
            if($Tag->count() > 0){
                $filterTag = " AND q_feed_item.id_item IN( SELECT id_feed FROM q_feed_tag WHERE id_tag = '{$Tag->first()->id_tag}')";
            }
        }

        $FeedsQuery = FeedItem::join("q_question", "q_question.id_que", "=", "q_feed_item.id_feed")
                    ->join("q_user", "q_user.id_user", "=", "q_feed_item.id_user")
                    ->select(
                        "q_feed_item.*", 
                        DB::raw("(q_feed_item.upvote -  q_feed_item.downvote ) as vote"), 
                        DB::raw("SUBSTRING(q_question.content_text , 1,  250) AS brief"), 
                        "q_question.ans_num", "q_user.id_url AS user_url", "q_user.full_name", "q_user.image")
                    ->whereRaw($cond.$filterTag)->orderByRaw($OrderBy)->limit($limit)->offset($offset);



        
        // $totalFeedCount = selectFromTable("COUNT(*) AS num", 
        //         "q_feed_item JOIN q_question ON q_question.id_que = q_feed_item.id_item",
        //         "$cond $filterTag AND q_feed_item.deleted = 0", [])[0]["num"];
        
        // function currentUrl(){
        //     global $idTag;
        //     global $tagIdUrl;
        //     return BASE_URL."/feed".($idTag > 0 ? "/".$tagIdUrl : "");
        // }
        
        // $pageList  = "";
        
        // if($totalFeedCount <= $limit){
        //     $pageList = "";
        // }else{
            
        //     $baseUrl =
        //          currentUrl()."?"
        //         .($filter != FEED_FILTER_UN_ANS ? "sort=".$filter."&" : "")
        //         .($limit != 30 ? "limit=".$limit."&" : "");
        //     $maxPage = ceil($totalFeedCount/$limit);
        //     $next = "";
        //     $prev = "";
            
        //     $first = '<li><a href="'.trim(trim($baseUrl , "&") , "?").'" class="'.($currentPage == 1 ? "selected" : "").' easy-bg-color">1</a></li>';
        //     $last = '<li><a href="'.$baseUrl."page=".$maxPage.'" class="'. ($currentPage == $maxPage ? "selected" : "").' easy-bg-color">'.($maxPage).'</a></li>';
            
            
        //     if($currentPage > 2){
        //         $prev = '<li>
        //                     <a href="'.$baseUrl.("page=".($currentPage - 1)).'" class="easy-bg-color">السابق</a>
        //                 </li>';
        //     }else{
        //         $prev = '<li>
        //                     <a href="'. trim(trim($baseUrl , "&") , "?").'" class="easy-bg-color">السابق</a>
        //                 </li>';
        //     }
            
            
        //     if($maxPage > $currentPage){
        //         $next = '<li>
        //                     <a href="'.$baseUrl.("page=".($currentPage + 1)).'" class="easy-bg-color">التالى</a>
        //                 </li>';
        //     }
        //     $mid = "";
        //     $iii = max($currentPage - 2, 2);
        //     for(; $iii <= min($currentPage + 2, $maxPage - 1) ; $iii++){
        //         $mid .= '<li><a href="'.$baseUrl."page=".$iii.'" class="easy-bg-color '.($currentPage == $iii ? "selected" : "").'">'.$iii.'</a></li>';
        //     }
            
        //     $pageList = '<div class="list-wrapper">
        //                         <ul class="flex">'
        //                             .$prev
        //                             . $first 
        //                             .($currentPage > 4 ? '<li>.......</li>' : "")
        //                             .$mid
        //                             .($maxPage - $currentPage  > 4 ? '<li>.......</li>' : "")
        //                             . $last 
        //                             . $next.'
        //                         </ul>
        //                     </div>';
            
        // }

        return view("feeds", [
            "paginator" => $FeedsQuery->paginate(),
            "filter" => $filter,
            "Feeds" => $FeedsQuery->get()
        ]);
    }
}
