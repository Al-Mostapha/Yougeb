<!DOCTYPE html>
<html class="" lang="ar"  id="logPage">
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
        <meta name="description" content="يُجيب - تسجيل الدخول">
        <meta name="keywords" content="يُجيب - تسجيل الدخول">
        @include("partial._common_meta")
    </head>
    <body style="background: none;">
        <div id="over-layer" class="hidden dir">
            <div id="alert-top-tip-wrapper"></div>
        </div>
        @include('partial._header_new')
        <div id="form-container">
            <div class="login-page form-signin w-100 m-auto">
                <div class="form-login">
                    <div class="logo-wrapper">
                        <div class="logo">
                            <img src="image/logo/logo.svg"/>
                        </div>
                    </div>
                    <div class="input-wrapper flex">
                        <div id="userMail-wrapper" class="input-unit w-100">
                            <input id="user-mail"     type="text" placeholder="email"> 
                        </div>
                        <div id="userMail-error-msg" class="text-start input-error"></div>
                        <div id="userPass-wrapper" class="input-unit w-100">
                            <input id="user-password" type="password" placeholder="password">
                        </div>
                        <div id="userPass-error-msg" class="text-start input-error"></div>
                    </div>
                    <div class="have-no-acc">
                        <div class="wrapper">
                            <h1 class="h5">
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
                    <button id="log-in-btn" class="h4 bold">
                        <span class="spinner-border spinner-border-m" role="status" aria-hidden="true" style="display: none;"></span>
                        <span>تسجيل الدخول</span>
                    </button>
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
