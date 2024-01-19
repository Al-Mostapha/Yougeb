<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>يُجيب - جميع الأسئلة</title>
    @include('partial._css')
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
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/feed') }}">
    <meta property="og:site_name" content="يُجيب - Yougeb">
    <meta property="og:image" itemprop="image primaryImageOfPage" content="{{ asset('/image/logo/logo.svg') }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:domain" content="www.yougeb.com">
    <meta name="twitter:title" property="og:title" itemprop="name" content="يُجيب - جميع الاسئلة">
    <meta name="twitter:description" property="og:description" itemprop="description"
        content="جميع الاسئلة فى جميع المجالات حسب الاشهر والاكثر تصويت داخل مجتمع يُجيب">
    <meta name="description" content="جميع الاسئلة فى جميع المجالات حسب الاشهر والاكثر تصويت داخل مجتمع يُجيب">
    <meta name="keywords" content="جميع الاسئلة فى جميع المجالات حسب الاشهر والاكثر تصويت داخل مجتمع يُجيب">
</head>

<body>
    @include('partial._header')
    <div id="glo-container" data-page="feed" data-id-tag="all">
        <div id="profile-header"> </div>
        <div id="body-wrapper" class="dir">
            <div id="left-col">
                <div class="left-col-wrapper">
                    <div class="title">
                        <h1 class="text h4">اشهر العنواين</h1>
                    </div>
                    <div class="list-wrapper">
                        <div id="related-tags" class="tag-list"></div>
                    </div>
                </div>
                <div class="left-col-wrapper">
                    <div class="title">
                        <h1 class="text h4">احدث العناوين</h1>
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
                                    <h1 class="flex"> جميع الاسئلة </h1>
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
            @include('partial._right_col')
        </div>
    </div>
    <div id="over-layer-wrapper"></div>
    @include('partial._js')
    <script type="text/javascript" src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/lib/heighlight.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/lib/katex.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/lib/quill.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/lib/mathquill.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/lib/mathquill4quill.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/lib/base.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/quran.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/user.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/editor.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/addQ.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/feed.js")}}"></script>
    <script type="text/javascript" src="{{asset("/js/answer.js")}}"></script>
</body>
</html>
