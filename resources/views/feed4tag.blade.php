<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>يُجيب  - {{$taged->title}}</title>
        @include('partial._css')
        @if($topTopic)
            <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "BreadcrumbList",
                    "itemListElement": [{
                        "@type": "ListItem",
                        "position": 1,
                        "name": "{{$topTopic->title}}",
                        "item": "{{url("/topic/".$topTopic->id_url)}}"
                    },{
                        "@type": "ListItem",
                        "position": 2,
                        "name": "{{$topTopic->title}}",
                        "item": "{{url("/feed/".$topTopic->id_url)}}"
                    }]
                }
            </script>
        @else
            <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "BreadcrumbList",
                        "itemListElement": [{
                            "@type": "ListItem",
                            "position": 1,
                            "name": "جميع الاسئلة",
                            "item": "{{url("/feed")}}"
                        }]
                    }
            </script>
        @endif
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{url("/feed/$tag->id_url")}}">
        <meta property="og:site_name" content="يُجيب - Yougeb">
        <meta property="og:image" itemprop="image primaryImageOfPage" content="{{asset("/image/logo/logo.svg")}}">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:domain" content="www.yougeb.com">
        <meta name="twitter:title" property="og:title" itemprop="name" content="{{$tag->title}}">
        <meta name="twitter:description" property="og:description" itemprop="description" content="{{$tag->brief}}">
        <meta name="description" content="{{$tag->brief}}"> 
        <meta name="keywords" content="{{$tag->brief}}">
    </head>
    <body>
        @include("partial._header")
        <div id="glo-container" data-page="feed" data-id-tag="{{$tag->id_tag}}">
            <div id="profile-header"> </div>
            <div id="body-wrapper" class="dir">
                <div id="left-col">
                    <div class="left-col-wrapper">
                        <div class="title">
                            <h1 class="text h4">عناوين مرتبطة</h1>
                        </div>
                        <div class="list-wrapper">
                            <div id="related-tags" class="tag-list"></div>
                        </div>
                    </div>
                    <div class="left-col-wrapper">
                        <div class="title">
                            <h1 class="text h4">عناوين متشابهة</h1>
                        </div>
                        <div class="list-wrapper">
                            <div id="similar-tags" class="tag-list">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mid-col">
                    <div class="mid-wrapper">
                        <div id="feed-page-top" class="glo-unit mid-unit">
                            <div id="feed-page-header">
                                <div class="up flex">
                                    <div class="right">
                                        <h1 class="flex"> جميع الاسئلة المرتبطة بـ &nbsp;&nbsp;&nbsp; <div style="direction: ltr">{{$tag->title}}</div></h1>
                                    </div>
                                    <div class="left">
                                        <div class="wrapper">
                                            <div class="add-que">
                                                <button class="add-que-btn easy-bg-color">اضف سؤال</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @include("partial._feed_pages")
                            </div>
                        </div>
                        @include("partial._feed_ans")
                        
                    </div>
                </div>
                @include('partial._rightCol')
            </div>
        </div>
        <div id="over-layer-wrapper"></div>
        @include('partial._js')
        <script type="text/javascript" src="{{asser("/js/lib/jquery-3.2.1.min.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/lib/heighlight.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/lib/katex.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/lib/quill.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/lib/mathquill.min.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/lib/mathquill4quill.min.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/lib/base.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/quran.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/user.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/editor.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/addQ.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/feed.js")}}"></script>
        <script type="text/javascript" src="{{asser("/js/answer.js")}}"></script>
    </body>
</html>
