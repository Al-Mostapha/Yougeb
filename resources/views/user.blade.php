<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>يُجيب  - {{$User->full_name}}</title>
    @include("partial._css")
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "@{{$User->full_name}}",
          "item": "{{url("/@$User->id_url")}}"
        }]
      }
    </script>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url("/@$User->id_url")}}">
    <meta property="og:site_name" content="يُجيب - Yougeb">
    <meta property="og:image" itemprop="image primaryImageOfPage" content="{{asset("/image/logo/logo.svg")}}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:domain" content="www.yougeb.com">
    <meta name="twitter:title" property="og:title" itemprop="name" content="يُجيب - {{$User->full_name}}">
    <meta name="twitter:description" property="og:description" itemprop="description" content="{{mb_substr($User->brief, 0, 160)}}">
    <meta name="description" content="{{mb_substr($User->brief, 0, 160)}}"> 
  </head>
  <body>
    @include("partial._header")
    <div id="glo-container" data-page="profile" data-id-user="{{$User->id_user}}">
      <div id="profile-header">
          <div class="profile">
            <div class="profile-wrapper dir">
              <div class="user-avatar"> 
                <div class="avatar">
                  <img src="{{asset("/$User->image")}}" alt="{{$User->full_name}}"/>
                  @if($User->id_user == auth()->user()->id_user)
                  <div class="avatar-edit">
                    <div class="bg-black">
                      <button></button>
                    </div>
                  </div>
                  @endif
                </div>
                <div class="user-profiles">
                  <ul>
                    <li style="background-image: url('{{asset("/image/icon/social/001-youtube.svg")}}')"></li>
                    <li style="background-image: url('{{asset("/image/icon/social/004-wikipedia.svg")}}')"></li>
                    <li style="background-image: url('{{asset("/image/icon/social/008-twitter.svg")}}')"></li>
                    <li style="background-image: url('{{asset("/image/icon/social/009-tumblr.svg")}}')"></li>
                    <li style="background-image: url('{{asset("/image/icon/social/001-youtube.svg")}}')"></li>
                    <li style="background-image: url('{{asset("/image/icon/social/001-youtube.svg")}}')"></li>
                    <li style="background-image: url('{{asset("/image/icon/plus.svg")}}')"></li>
                  </ul>
                </div>
              </div>
                <div class="user-text">
                  <div class="data-wrapper">
                    <div class="wrapper">
                      <div class="name flex vc">
                        <h1 id="old-full-name"><?=$User[0]["full_name"]?></h1>
                        @if($User->id_user == auth()->user()->id_user)
                        <label id="edite-full-name-wr" class="edit-btn">
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <img id="edite-full-name" src="{{asset("image/icon/edit.svg")}}"/>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        @endif
                      </div>
                      <div class="mintion-name">
                          <h2>@{{$User->id_url}}</h2>
                      </div>
                      <div class="cridental flex vc"> 
                          <h3>Engineer, Musician, Photo/Videographer</h3>
                          @if($User->id_user == auth()->user()->id_user)
                          <label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="{{asset("/image/icon/edit.svg")}}"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                          </label>
                          @endif
                      </div>
                      <div class="bio">
                        <p>
                          Hi folks! I'm an Engineer by profession -- I design computer systems, soup to nuts (architecture, circuits, PCB), these days mostly for rugged mobile communications. Outdoor networks used for all sorts of things.. even the National Football League!
                          For fun and sanity, I play guitar and write the occasional song ......
                        </p>
                        <a href="#">(قراءة المزيد)</a>
                        @if($User->id_user == auth()->user()->id_user)
                        <label>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <img src="{{asset("/image/icon/edit.svg")}}"/>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="icon-wrapper">
                    <div class="icon-list">
                        @if($User->id_user == auth()->user()->id_user)
                        <div class="icon-unit pull-r"> 
                          <button class="easy-bg-color">
                            <label class="icon" style="background-image: url('{{url("/image/icon/follower.svg")}}')"></label>
                            <label class="text">متابعة</label>
                          </button> 
                        </div>
                        <div class="icon-unit pull-r"> 
                          <button class="easy-bg-color">
                            <label class="icon" style="background-image: url('{{url("/image/icon/notifyMe.svg")}}')"></label>
                            <label class="text">اشعار</label>
                          </button> 
                        </div>
                        @endif
                        <div class="icon-unit pull-r"> 
                          <button class="easy-bg-color">
                            <label class="icon" style="background-image: url('{{url("/image/icon/askHim.svg")}}')"></label>
                            <label class="text">اساله</label>
                          </button> 
                        </div>
                        <div class="icon-unit pull-l">
                          <button class="easy-bg-color">
                            <label class="icon" style="background-image: url('{{url("/image/icon/menu.svg")}}'); background-size: auto; "></label>
                          </button> 
                        </div>
                    </div>
                  </div>
                </div>
                <div class="user-cridental">
                  <div class="cridental-wrapper">
                    <ul>
                        <li>
                          <div class="crid">
                            <div class="icon" style="background-image: url('{{url("/image/icon/portfolio.svg")}}')"></div>
                            <div class="pragraph">
                              <p>
                                Former Sr. Computer Engineer (still bleeds Boing Balls!) at Commodore/Amiga
                              </p>
                              <div class="last-line">1933 - 2015</div>
                            </div>
                            @if($User->id_user == auth()->user()->id_user)
                            <label>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <img src="{{asset("/image/icon/edit.svg")}}"/>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            @endif
                          </div>
                        </li>
                        <li>
                          <div class="crid">
                            <div class="icon" style="background-image: url('{{asset("/image/icon/graduationCap.svg")}}')"></div>
                            <div class="pragraph">
                              <p>
                                Former Sr. Computer Engineer (still bleeds Boing Balls!) at Commodore/Amiga
                              </p>
                              <div class="last-line">1933 - 2015</div>
                            </div>
                            @if($User->id_user == auth()->user()->id_user)
                            <label>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <img src="{{asset("/image/icon/edit.svg")}}"/>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            @endif
                          </div>
                        </li>
                        <li>
                          <div class="crid">
                            <div class="icon" style="background-image: url('{{asset("/image/icon/address.svg")}}')"></div>
                            <div class="pragraph">
                              <p>
                                Former Sr. Computer Engineer (still bleeds Boing Balls!) at Commodore/Amiga
                              </p>
                              <div class="last-line">1933 - 2015</div>
                            </div>
                            @if($User->id_user == auth()->user()->id_user)
                            <label>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <img src="{{asset("/image/icon/edit.svg")}}"/>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            @endif
                          </div>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div id="body-wrapper" class="dir">
          <div id="left-col">
            <div class="left-col-wrapper">
              <div class="title">
                <h1 class="text h4">مواضيع يتابعها "{{$User->full_name}}"</h1>
              </div>
              <div id="similar-topics" class="list-wrapper"></div>
            </div>
            <div class="left-col-wrapper">
              <div class="title">
                <h1 class="text h4">عناوين يستعملها "{{$User->full_name}}"</h1>
              </div>
              <div id="related-tags"  class="list-wrapper tag-list"></div>
            </div>
          </div>
          <div id="mid-col">
            <div id="USER_QUES" class="mid-wrapper">
              <div id="user-feed-header" class="glo-unit mid-unit">
                <div class="container">
                  <div class="top-wrapper">
                    <div class="top flex">
                      <div class="ans-num" style="flex-grow: 2;"><?=$Count?> <?=$CountOF?></div>
                      <div class="blank" style="flex-grow: 20; "></div>
                      <div class="arrange" style="flex-grow: 5;">
                        <div class="flex ltr">
                          <div class="tabs flex">
                            <div class="unit-arrange {{$QueOrder == env("FEED_FILTER_NEW") ? "selected" :""}}">
                              <div class="text">
                                <a href="{{url()->current()}}{{$profileTo !=  env("PROFILE_SHOW_ANS") ? "/$profileTo" : ""}}" class="easy-bg-color">الاحدث</a>
                              </div>
                            </div>
                            <div class="unit-arrange {{$QueOrder == env("FEED_FILTER_OLD") ? "selected" :""}}">
                              <div class="text">
                                <a href="{{url()->current()}}{{$profileTo !=  env("PROFILE_SHOW_ANS") ? "/$profileTo" : ""}}?sort={{env("FEED_FILTER_OLD")}}" class="easy-bg-color">الاقدم</a>
                              </div>
                            </div>
                            <div class="unit-arrange {{$QueOrder == env("FEED_FILTER_BEST") ? "selected" :""}}">
                              <div class="text">
                                <a href="{{url()->current()}}{{$profileTo !=  env("PROFILE_SHOW_ANS") ? "/$profileTo" : ""}}?sort={{env("FEED_FILTER_BEST")}}" class="easy-bg-color">تصويت</a>
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
              {{(new UserFeed($User->id_user))->userFeedShow($profileTo , $QueOrder, $offset)}}
            </div>
          </div>
          <div id="right-col">
              <div class="right-col-wrapper">
                  <div class="new-feed-list">
                      <div class="user-stat">
                          <h1>احصائيات</h1>
                      </div>
                      <ul>
                        <li class="user-li">
                          <a class="link" href="<?=BASE_URL."/".$formatedRoute[URL_LANDMARK_INDEX]?>">
                            <?php 
                              $AnsNum = selectFromTable("COUNT(DISTINCT id_que) AS num", "q_que_ans", "id_user = :idu AND  deleted = 0", ["idu"=>$User[0]["id_user"]])[0]["num"]
                            ?>
                            <div class="label">اجابات</div><div class="num"><?=$AnsNum?></div>
                          </a>
                        </li>
                        <li class="user-li">
                          <a class="link" href="<?=BASE_URL."/".$formatedRoute[URL_LANDMARK_INDEX]."/".PROFILE_SHOW_Que?>">
                            <?php 
                              $QueNum = selectFromTable("COUNT(*) AS num", "q_feed_item", "id_user = :idu AND feed_type = :idf AND q_feed_item.deleted = 0", ["idu"=>$User[0]["id_user"], "idf"=>FEED_TYPE_QUES])[0]["num"]
                            ?>
                            <div class="label">اسالة</div><div class="num"><?=$QueNum?></div>
                          </a>
                        </li>
                        <li class="user-li">
                            <a class="link" href="<?=BASE_URL."/".$formatedRoute[URL_LANDMARK_INDEX]."/".PROFILE_SHOW_ART?>">
                              <?php 
                                $ArtNum = selectFromTable("COUNT(*) AS num", "q_feed_item", "id_user = :idu AND feed_type = :idf AND q_feed_item.deleted = 0", ["idu"=>$User[0]["id_user"], "idf"=>FEED_TYPE_ART])[0]["num"]
                              ?>
                              <div class="label">مقال</div><div class="num"><?=$ArtNum?></div>
                            </a>
                        </li>
                        <li class="user-li">
                          <a class="link" href="">
                            <div class="label">مشاركات</div><div class="num">0</div>
                          </a>
                        </li>
                        <li class="user-li">
                          <a class="link" href="">
                            <?php 
                              $follow = selectFromTable("COUNT(*) AS num", "q_user_follower", "id_follower = :idu", ["idu"=>$User[0]["id_user"]])[0]["num"]
                            ?>
                            <div class="label">يتابع</div><div class="num"><?=$follow?></div>
                          </a>
                        </li>
                        <li class="user-li">
                            <a class="link" href="">
                              <?php 
                                $follower = selectFromTable("COUNT(*) AS num", "q_user_follower", "id_user = :idu", ["idu"=>$User[0]["id_user"]])[0]["num"]
                              ?>
                              <div class="label">متابع</div><div class="num"><?=$follower?></div>
                            </a>
                        </li>
                      </ul>
                          
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
    <script src="{{asset("/js/profile.js")}}"></script>
  </body>
</html>
