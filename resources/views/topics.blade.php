<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>يُجيب  - كافة المواضيع</title>
    <?php require_once 'template/css.tpl';?>
    @include('partial._css')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url("/feed")}}">
    <meta property="og:site_name" content="يُجيب - Yougeb">
    <meta property="og:image" itemprop="image primaryImageOfPage" content="{{asset("/image/logo/logo.svg")}}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:domain" content="www.yougeb.com">
    <meta name="twitter:title" property="og:title" itemprop="name" content="يُجيب - جميع المواضيع">
    <meta name="twitter:description" property="og:description" itemprop="description" content="جميع المجالات والموضويع والاقسام داخل مجتمع يُجيب">
    <meta name="description" content="جميع المجالات والموضويع والاقسام داخل مجتمع يُجيب"> 
    <meta name="keywords" content="جميع المجالات والموضويع والاقسام داخل مجتمع يُجيب">
  </head>
    <body>
      @include('partial._header')
      <div id="glo-container">
          <div id="profile-header"> </div>
        <div id="body-wrapper" class="dir">
          @include('partial._left_col')
          <div id="mid-col">
            <div class="mid-wrapper">
              <div id="topic-list-header" class="glo-unit mid-unit">
                <div class="top-wrapper">
                  <div class="top flex">
                    <div class="ans-num" style="flex-grow: 2;">{{$totalTopicCount}} موضوع</div>
                    <div class="blank" style="flex-grow: 20; "></div>
                    <div class="arrange" style="flex-grow: 5;">
                      <div class="flex ltr">
                        <div class="tabs flex">
                          <div class="unit-arrange {{$filter == env("TOPIC_FILTER_BEST") ? "selected" : ""}}">
                            <div class="text">
                              <a href="{{url()->current()}}" class="easy-bg-color">الاشهر</a>
                            </div>
                          </div>
                          <div class="unit-arrange {{$filter == env("TOPIC_FILTER_OLD") ? "selected" : ""}}">
                            <div class="text">
                              <a href="{{url()->current()."?".http_build_query(["filter"=>env("TOPIC_FILTER_OLD")])}}" class="easy-bg-color">الاقدم</a>
                            </div>
                          </div>
                          <div class="unit-arrange{{$filter == env("TOPIC_FILTER_NEW") ? "selected" : ""}}">
                            <div class="text">
                              <a href="{{url()->current()."?".http_build_query(["filter"=>env("TOPIC_FILTER_NEW")])}}" class="easy-bg-color">الاحدث</a>
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
              <div id="recomened-space-wrapper" class="glo-unit mid-unit recommend-space">
                <div>
                  <div id="topic-list-wrapper" class="flex">
                    @foreach($topics as $oneTopic)
                      @auth
                        {{-- $aFollower = selectFromTable(
                          "COUNT(*) AS num",
                          "q_topic_follower",
                          "id_user = :idu AND id_topic = :idt",
                          ["idu"=>$idU, "idt"=>$oneTopic["id_topic"]]) [0]["num"]
                          == 0? FALSE : TRUE ;    --}}
                      @endauth
                      <div class="recommend-unit" data-id-topic="{{alphaID($oneTopic->id_topic)}}">
                        <div class="header">
                          <div class="header-wrapper flex">
                            <div class="left">
                              <div class="wrapper">
                                <button class="easy-bg-color pull-l"></button>
                              </div>
                            </div>
                            <div class="right">
                              <div class="wrapper">
                                <button class="easy-bg-color pull-r">&times;</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="cover-image">
                          <div class="bg-image" style="background-image: url('{{asset("/".$oneTopic->cover)}}');"></div>
                        </div>
                        <div class="image">
                          <a href="{{url("/topic/$oneTopic->id_url")}}">
                            <img src="{{asset("/$oneTopic->image")}}"/>
                          </a>
                        </div>
                        <div class="about">
                          <div class="title">
                            <h1>
                              <a href="{{url("/topic/$oneTopic->id_url")}}">{{$oneTopic->title}}</a>
                            </h1>
                          </div>
                          <div class="bio">
                            <p>{{mb_substr($oneTopic->brief, 0, 100)}}</p>
                          </div>
                          <div class="follow-btn">
                            <button class="{{$aFollower ? "topic-unfollow" : "topic-follow"}}" data-id-topic="{{alphaID($oneTopic->id_topic)}}">
                                <label>{{$aFollower ? "الغاء المتابعة" : "متابعة"}}</label>
                                <span></span>
                            </button>
                          </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="page-list flex">
                  <?=$pageList?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="over-layer-wrapper"></div>
      @include('partial._js')
      <script src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
      <script src="{{asset("/js/lib/base.js")}}"></script>
      <script src="{{asset("/js/user.js")}}"></script>
      <script src="{{asset("/js/topic.js")}}"></script>
    </body>
</html>
