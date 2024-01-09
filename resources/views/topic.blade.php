<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <title>يُجيب  -  <?=$topic["title"]?></title>
      @include("partial._css")
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "{{$Topic->title}}",
          "item": "{{url("/topic/$Topic->id_url")}}"
        }]
      }
      </script>
      <meta property="og:type" content="website">
      <meta property="og:url" content="{{url("/topic/$Topic->id_url")}}">
      <meta property="og:site_name" content="يُجيب - Yougeb">
      <meta property="og:image" itemprop="image primaryImageOfPage" content="{{asset("/image/logo/logo.svg")}}">
      <meta name="twitter:card" content="summary">
      <meta name="twitter:domain" content="www.yougeb.com">
      <meta name="twitter:title" property="og:title" itemprop="name" content="{{$Topic->title}}">
      <meta name="twitter:description" property="og:description" itemprop="description" content="{{$Topic->long_brief}}">
      <meta name="description" content="{{$Topic->long_brief}}">
      <meta name="keywords" content="{{implode(",", array_column($TopicTags, "title"))}}">
  </head>
  <body>
    @include("partial._header")
    <div id="glo-container" data-page="topicDetail" data-id-topic="{{$alphaID}}">
      <div id="profile-header"> </div>
      <div id="body-wrapper" class="dir">
        <div id="left-col">
          <div class="left-col-wrapper">
            <div class="title">
              <h1 class="text">اشهر عناوين "{{$Topic->title}}"</h1>
            </div>
            <div class="list-wrapper">
              <div id="related-tags" class="tag-list"></div>
            </div>
          </div>
          <div class="left-col-wrapper">
            <div class="title">
              <h1 class="text">مواضيع مشابهة</h1>
            </div>
            <div class="list-wrapper">
              <div id="similar-topics"></div>
            </div>
          </div>
        </div>
        <div id="mid-col">
          <div class="mid-wrapper">
            <div id="topic-cover" class="glo-unit mid-unit">
              <div class="cover-wrapper">
                <div class="cover">
                  <div class="cover-image" style="background-image: url('{{asset("/$Topic->cover")}}');"></div>
                </div>
                <div class="image-wrapper">
                  <div class="image">
                    <img src="{{asset("/$Topic->image")}}">
                  </div>
                </div>
                <div class="topic-detail">
                  <div class="title-wrapper">
                    <div class="title"> 
                      <h1>
                        <a class="deco-non" href="{{url("/topic/$Topic->id_url")}}">
                          {{$Topic->title}}
                        </a>
                      </h1>
                    </div>
                  </div>
                  <div class="brief-s-wrapper">
                    <h1>{{$Topic->brief}}</h1>
                  </div>
                  <div class="brief-l-wrapper">
                    <p>{{$Topic->long_brief}}</p>
                  </div>
                </div>
              </div>
              <div class="option-bar">
                <div class="wrapper flex">
                  <div class="right flex">
                    <div class="list flex">
                      <div class="follow">
                        <button class="flex easy-bg-color {{$isFollower ? "topic-home-unfollow" : "topic-home-follow"}}" id="topic-follow-home">
                          <div class="icon"></div>
                          <div class="txt">{{$isFollower ?  "الغاء المتابعة" : "متابعة"}}</div>
                        </button>
                      </div>
                      <div class="notif">
                        <button class="flex easy-bg-color">
                          <div class="icon"></div>
                          <div class="txt">الاشعار</div>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="left">
                    <div class="menu">
                      <button class="flex easy-bg-color">
                        <div class="icon"></div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="topic-header" class="glo-unit mid-unit">
              <div class="top-wrapper">
                <div class="top flex">
                  <div class="ans-num" style="flex-grow: 2;"><?= $totalTopicCount ?> سؤال</div>
                  <div class="blank" style="flex-grow: 20; "></div>
                  <div class="arrange" style="flex-grow: 5;">
                    <div class="flex ltr">
                      <div class="tabs flex">
                        <div class="unit-arrange {{$filter == env("TOPIC_QUE_FILTER_BEST") ? "selected" : ""}}">
                          <div class="text">
                            <a href="{{url()->current()}}" class="easy-bg-color">تصويت</a>
                          </div>
                        </div>
                        <div class="unit-arrange {{$filter == env("TOPIC_QUE_FILTER_OLD") ? "selected" : ""}}">
                          <div class="text">
                            <a href="{{url()->current()."?sort=".env("TOPIC_QUE_FILTER_OLD")}}" class="easy-bg-color">الاقدم</a>
                          </div>
                        </div>
                        <div class="unit-arrange {{$filter == env("TOPIC_QUE_FILTER_NEW") ? "selected" : ""}}">
                          <div class="text">
                            <a href="{{url()->current()."?sort=".env("TOPIC_QUE_FILTER_NEW")}}" class="easy-bg-color">الاحدث</a>
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
            <div class="glo-unit mid-unit">
                <div  id="Que-List">
                    @foreach($Feeds as $oneFeed)
                    <div class="ans-wrapper feed-unit">
                      <div class="ans-content flex">
                          <div class="stats-container">
                              <div class="stats flax">
                                  <div class="up">
                                      <div class="vote">
                                          <div class="bold">{{$oneFeed->upvote - $oneFeed->downvote}}</div>
                                          <div class="sml">تصويت</div>
                                      </div>
                                      <div class="ans">
                                          <div class="bold">{{$Que->ans_num}}</div>
                                          <div class="sml">اجابة</div>
                                      </div>
                                  </div>
                                  <div class="view">
                                      <div>{{$oneFeed->view_num}}<div class="sml">مشاهدة</div></div>
                                  </div>
                              </div>
                          </div>
                          <div class="ans-cont-wrapper">
                              <div class="question-title-wrapper">
                                  <h1>
                                      <a href="{{url("/$oneFeed->id_url")}}">{{$oneFeed->title}} ؟</a>
                                  </h1>
                              </div>
                              <div class="question-summary">
                                  <p>{{mb_substr($Que->content_text, 0, 150)}}.....</p>
                              </div>
                              <div class="asked-by-wrapper">
                                  <div class="tag-list">
                                      <ul class="flex">  
                                        '.$tagList.'
                                        @foreach($tags as $oneTag)
                                        <li>
                                          <a href="{{url("/feed/$oneTag->id_url")}}" class="tag-txt">$oneTag->title</a>
                                        </li>
                                        @endforeach
                                      </ul>
                                  </div>
                                  <div class="asked-by-box">
                                      <div class="ask-date">سئل  {{formatTime($oneFeed["time_stamp"])}} </div>
                                      <div class="user-box">
                                          <div class="image">
                                              <img src="{{asset("/$user->image")}}">
                                          </div>
                                            <div class="data">
                                              <div class="full-name">
                                                <a href="{{url("/@$user->id_url")}}">{{$user->full_name}}</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    @endforeach
                </div>
                <div class="last-raw">
                    <div class="page-list">
                        <?=$pageList?>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="over-layer-wrapper"></div>
    @include("partial._js")
    <script src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
    <script src="{{asset("/js/lib/base.js")}}"></script>
    <script src="{{asset("/js/user.js")}}"></script>
    <script src="{{asset("/js/feed.js")}}"></script>
    <script src="{{asset("/js/topic.js")}}"></script>
  </body>
</html>
