<!DOCTYPE html>
<html class="" lang="ar">
    <head>
        <title>يُجيب - تسجيل الدخول</title>
        @include('partial._css')
        <script type="application/ld+json">
          {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
              "@type": "ListItem",
              "position": 1,
              "name": "تسجيل دخول",
              "item": "{{url("/login")}}"
            }]
          }
        </script>
    </head>
    <body id="logPage">
        <div id="over-layer" class="hidden dir">
            <div id="alert-top-tip-wrapper"></div>
        </div>
        @include('partial._header')
        <div id="form-container">
            <div class="login-page">
                <div class="form-login">
                    <div class="logo-wrapper">
                        <div class="logo">
                            <img src="image/logo/logo.svg"/>
                        </div>
                    </div>
                    <div class="input-wrapper flex">
                        <input id="user-mail"     type="text" placeholder="email"> 
                        <input id="user-password" type="password" placeholder="password">
                    </div>
                    <div class="have-no-acc">
                        <div class="wrapper">
                            <h1>
                                <span>ليس لديك حساب؟ </span><a href="{{url("/signup")}}">انشاء حساب الان</a>
                            </h1>
                        </div>
                    </div>
                    <div class="log-in-with">
                        <div class="unit-logo easy-bg-color" style="background-image: url('{{asset("/image/icon/social/019-quora.svg")}}')"></div>
                        <div class="unit-logo easy-bg-color" style="background-image: url('{{asset("/image/icon/social/026-medium.svg")}}')"></div>
                        <div class="unit-logo easy-bg-color" style="background-image: url('{{asset("/image/icon/social/033-google-plus.svg")}}')"></div>
                        <div class="unit-logo easy-bg-color" style="background-image: url('{{asset("/image/icon/social/036-facebook.svg")}}')"></div>
                        <div class="unit-logo easy-bg-color" style="background-image: url('{{asset("/image/icon/social/004-wikipedia.svg")}}')"></div>
                    </div>
                    <button id="log-in-btn">تسجيل الدخول</button>

                </div>
            </div>
        </div>
        <div id="over-layer-wrapper"></div>
        @include('partial._js')
        <script type="text/javascript" src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("/js/lib/base.js")}}"></script>
        <script type="text/javascript" src="{{asset("/js/user.js")}}"></script>
        <script type="text/javascript" src="{{asset("/js/log.js")}}"></script>
    </body>
</html>
