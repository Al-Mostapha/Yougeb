<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>يُجيب - الرئيسية</title>
        @include('partials._css')
    </head>
    <body>
        @include('partials._header')
        <div id="glo-container" data-page="userHome">
            <div id="profile-header"> </div>
            <div id="body-wrapper" class="dir">
                <div id="left-col">
                    <div class="left-col-wrapper">
                        <div class="title">
                            <h1 class="text">التحديث اليوم للعناوين</h1>
                        </div>
                        <div class="list-wrapper tag-list">
                            <ul id="recent-tag-feeds"></ul>
                        </div>
                    </div>
                    <div class="left-col-wrapper">
                        <div class="title">
                            <h1 class="text">التحديث اليومى للمواضيع</h1>
                        </div>
                        <div class="list-wrapper" id="similar-topics">
                            <ul id="recent-topic-feeds"></ul>
                        </div>
                    </div>
                </div>
                <div id="mid-col">
                    <div class="mid-wrapper">
                        <div class="glo-unit mid-unit"></div>
                        <?=(new UserFeed($idU))->userHomeQue(0);?>
                    </div>
                </div>
                @include("partial._right_col")
            </div>
        </div>
        <div id="over-layer-wrapper"></div>
        @include("partial._js")
        <script src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
        <script src="{{asset("/js/lib/base.js")}}"></script>
        <script src="{{asset("/js/feed.js")}}"></script>
        <script src="{{asset("/js/user.js")}}"></script>
    </body>
</html>
