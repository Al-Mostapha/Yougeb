<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>يُجيب  - {{$Feed->title}} ؟</title>
        @include('partial._css')
        <script type="application/ld+json">
          {
            "@context": "https://schema.org",
            "@type": "QAPage",
            "mainEntity": {
              "@type": "Question",
              "name": "{{$Feed->title}} ؟",
              @if($Que->content_text == "")
                "text": "{{$Feed->title}}",
              @else
                "text": "{{mb_substr($Que->content_text, 0, 250)}}",
              @endif
              "answerCount": {{$Que->ans_num}},
              "upvoteCount": {{$Feed->upvote - $Feed->downvote}},
              "dateCreated": "{{date(DATE_ISO8601, $Feed->time_stamp)}}",
              "author": {
                "@type": "Person",
                "name": "{{$QUser->full_name}}"
              }
              @if(isset($Qans))
                ,
                "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{addslashes($Qans->ans_text)}}",
                "dateCreated": "{{date(DATE_ISO8601 , $Qans->time_stamp)}}",
                "upvoteCount": {{$Qans->upvote - $Qans->downvote}},
                "url": "{{url()->current("#acceptedAnswer")}}",
                "author": {
                  "@type": "Person",
                  "name": "{{$Qans->full_name}}"
                }
              }
              @endif
              '.$acceptedAns.'
            }
          }
        </script>
        
        @if(isset($topTopic))
        <script type="application/ld+json">
          {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
              "@type": "ListItem",
              "position": 1,
              "name": "{{addslashes($topTopic->title)}}",
              "item": "{{url("/topic/$topTopic->id_url")}}"
            },{
              "@type": "ListItem",
              "position": 2,
              "name": "{{addslashes($topTag[0]->title)}}",
              "item": "{{url("/feed/$topTag[0]->id_url")}}"
            },{
              "@type": "ListItem",
              "position": 3,
              "name": "{{addslashes($Feed->title)}}",
              "item": "{{url("/$Feed->id_url")}}"
            }]
          }
        </script>
        @endif
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{url("/$Feed->id_url")}}">
        <meta property="og:site_name" content="يُجيب - Yougeb">
        <meta property="og:image" itemprop="image primaryImageOfPage" content="{{asset("/image/logo/logo.svg")}}">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:domain" content="www.yougeb.com">
        <meta name="twitter:title" property="og:title" itemprop="name" content="{{$Feed->title}} ؟">
        <meta name="twitter:description" property="og:description" itemprop="description" content="{{mb_substr($Que->content_text, 0, 160)}}">
        <meta name="description" content="{{mb_substr($Que->content_text, 0, 160)}}"> 
        <meta name="keywords" content="{{implode(", ", array_column($QTags, "title"))}}">
    </head>
    <body>
        @include('partial._header')
        <div id="glo-container" 
            data-page="showQ" data-idQue = "{{$alphaID}}" 
            data-ans-offset="{{$AnsOffset}}"
            data-ans-ord="{{$AnsOrder}}">
            <div id="profile-header"></div>
            <div id="body-wrapper" class="dir">
                @include("partial._left_col")
                <div id="mid-col">
                    <div class="mid-wrapper">
                        <div id="q-show-title" class="glo-unit mid-unit">
                            <div class="question-title-wrapper flex">
                                <h1 class="q-title">
                                    {{$Feed->title}}؟
                                </h1>
                                <div id="edite-que-title">
                                    <button class="tag-txt settings-btn edit-btn"></button>
                                </div>
                                <div id="delete-que" class="flex">
                                    <button class="tag-txt settings-btn delete-btn"></button>
                                </div>
                            </div>
                            <div class="q-data">
                                <div class="q-data-wrapper">
                                    <div class="seg">
                                        <label>مشاهدات:</label> <span>{{$Feed->view_num}}</span>
                                    </div>
                                    <div class="seg">
                                        <label>تاريخ:</label> <span>{{formatTime($Feed->time_stamp)}}</span>
                                    </div>
                                    <div class="seg">
                                        <label>اخر تحديث:</label> <span>{{formatTime($Feed->time_updated)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="br"></div>
                        </div>
                        <div id="q-show-desc" class="glo-unit mid-unit ans-card">
                            <div class="ans-wrapper">
                                <div class="ans-content">
                                    <div class="v-icon-wrapper">
                                        <div class="v-icon">
                                            <div class="wrapper">
                                                <div class="btn-wrapper">
                                                    <button id="{{$alphaID}}-up" class="vote-btn vote-que {{$QueVote == env("VOTE_UP") ? "voted" : ""}}"  data-vote="up" data-id-feed="{{$alphaID}}">
                                                        <svg aria-hidden="true" width="36" height="36" viewBox="0 0 36 36"><path d="M2 26h32L18 10 2 26z"></path></svg>
                                                    </button>
                                                </div>
                                                <div class="score">
                                                    <div id="{{$alphaID}}-vote-num">
                                                        {{$Feed->upvote - $Feed->downvote}}
                                                    </div>
                                                </div>
                                                <div class="btn-wrapper">
                                                    <button id="{{$alphaID}}-down" class="vote-btn vote-que {{$QueVote == env("VOTE_DOWN") ? "voted" : ""}}" data-vote="down" data-id-feed="{{$alphaID}}">
                                                        <svg aria-hidden="true" class="svg-icon m0 iconArrowDownLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 10h32L18 26 2 10z"></path></svg>
                                                    </button>
                                                </div>
                                                <div class="btn-wrapper">
                                                    <button>
                                                        <svg aria-hidden="true" class="svg-icon iconStar" width="18" height="18" viewBox="0 0 18 18">
                                                            <path d="M9 12.65l-5.29 3.63 1.82-6.15L.44 6.22l6.42-.17L9 0l2.14 6.05 6.42.17-5.1 3.9 1.83 6.16L9 12.65z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="follower">
                                                    <div>{{$Feed->fav}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ans-cont-wrapper ql-snow">
                                        <div id="QueSummary" class="question-summary ql-editor rich-text">
                                            {{$Que->content_html}}
                                            <button id="update-que-content" class="tag-txt edit-btn" title="تعديل وصف السؤال"></button>
                                        </div>
                                        <div class="asked-by-wrapper">
                                            <div class="tag-list">
                                                <ul class="flex">
                                                @foreach($QTags as $oneTag)
                                                    <li>
                                                        <a href="{{url("/feed/$oneTag->id_url")}}" target = "blank" class="tag-txt">{{$oneTag->title}}</a>
                                                    </li>
                                                    @auth
                                                        @if($Feed->id_user == auth()->user()->id_user)
                                                            <li>
                                                                <button id="update-que-tag" class="tag-txt edit-btn"></button>
                                                            </li>
                                                        @elseif(auth()->user()->user_group == env("USER_GROUP_MODER"))
                                                            <li>
                                                                <button id="update-que-tag" class="tag-txt edit-btn"></button>
                                                            </li>
                                                        @endif
                                                    @endauth
                                                @endforeach
                                                </ul>
                                            </div>
                                            <div class="asked-by-box">
                                                <div class="ask-date">سئل {{formatTime($Feed->time_stamp)}}</div>
                                                <div class="user-box">
                                                    <div class="image">
                                                        <img src="{{asset("/$QUser->image")}}"/>
                                                    </div>
                                                    <div class="data">
                                                        <div class="full-name">
                                                            <a href="{{url("/@$QUser->id_url")}}" target="_blank">{{$QUser->full_name}}</a>
                                                        </div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ans-footer">
                                    <div class="footer-wrapper">
                                        <div class="right pull-r">
                                            <ul>
                                                <li class="share-in pull-r">
                                                    <div class="icon pull-r"></div>
                                                    <div class="number pull-l">{{numberToStr($Feed->reshare)}}</div>
                                                </li>
                                                <li class="comment pull-r">
                                                    <div class="icon pull-r"></div>
                                                    <div class="number pull-l">{{numberToStr($Feed->comment)}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mid pull-r"></div>
                                        <div class="left pull-l">
                                            <ul>
                                                <li class="share-out pull-l">
                                                    <div class="icon pull-r"></div>
                                                    <div class="number pull-l">{{numberToStr($Feed->share_out)}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div id="q-answers-header" class="glo-unit mid-unit">
                            <div class="container">
                                <div class="top-wrapper">
                                    <div class="top flex">
                                        <div class="ans-num" style="flex-grow: 2;">{{$Que->ans_num}} اجابة</div>
                                        <div class="blank" style="flex-grow: 20; "></div>
                                        <div class="arrange" style="flex-grow: 5;">
                                            <div class="flex ltr">
                                                <div class="tabs flex">
                                                    <div class="unit-arrange {{$AnsOrder == env("ANS_ORD_VOTE") ? "selected" :""}}">
                                                        <div class="text">
                                                            <a href="{{ url()->current() }}" class="easy-bg-color">تصويت</a>
                                                        </div>
                                                    </div>
                                                    <div class="unit-arrange {{$AnsOrder == env("ANS_ORD_OLD") ? "selected" :""}}">
                                                        <div class="text">
                                                            <a href="{{url()->current()."?".http_build_query(["sort"=>env("ANS_ORD_OLD")])}}" class="easy-bg-color">الاقدم</a>
                                                        </div>
                                                    </div>
                                                    <div class="unit-arrange {{$AnsOrder == env("ANS_ORD_NEW") ? "selected" :""}}">
                                                        <div class="text">
                                                            <a href="{{url()->current()."?".http_build_query(["sort"=>env("ANS_ORD_NEW")])}}" class="easy-bg-color">الاحدث</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="page-list">
                                        <?=$pageList?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div id="Que-Ans-Wrapper">
                            @foreach($Qans as $oneAns)
                                {{(new Ans($oneAns["id_ans"]))->getHtml()}}
                            @endforeach
                        </div>
                        <div class="glo-unit mid-unit">
                            <div class="container"> 
                                @include("partial._toolbar")
                                <div id="editor"></div>
                                <div id="add-new-answer">
                                    <div class="q-btns">
                                        <div class="q-btn-wrapper">
                                            <div class="middel-btns">
                                                @auth
                                                    <button id="add-que-ans" data-id-que="{{$alphaID}}" class="btn">أضف اجابة</button>
                                                @else
                                                <button class="btn signup">
                                                    <a class="deco-non" href="{{url("/signup")}}">
                                                        <span>انشاء حساب</span>
                                                    </a>
                                                </button>
                                                <button class="login">
                                                    <a class="deco-non" href="{{url("/login")}}">
                                                        <span>تسجيل الدخول</span>
                                                    </a>
                                                </button>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partial._right_col')
            </div>
        </div>
        <div id="over-layer-wrapper"></div>
        @include('partial._js')
        <script  type="text/javascript" src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/lib/heighlight.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/lib/katex.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/lib/quill.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/lib/mathquill.min.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/lib/mathquill4quill.min.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/lib/base.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/quran.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/user.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/editor.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/addQ.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/feed.js")}}"></script>
        <script  type="text/javascript" src="{{asset("/js/answer.js")}}"></script>
    </body>
</html>
