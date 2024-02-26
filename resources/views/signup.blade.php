<!DOCTYPE html>
<html lang="ar" class="" id="logPage">
  <head>
    <title>يُجيب  - انشاء حساب</title>
    @include('partial._css')
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "انشاء حساب",
          "item": "{{url("/signup")}}"
        }]
      }
    </script>
    @include('partial._common_meta')
  </head>
    <body style="background: none;">
      <div id="over-layer" class="hidden dir">
        <div id="alert-top-tip-wrapper"></div>
      </div>
      @include('partial._header_new')
      <div class="row" id="form-container">
        <div class="login-page form-signin w-100 m-auto">
          <div class="form-login">
            <div class="logo-wrapper">
              <div class="logo">
                <img src="image/logo/logo.svg"/>
              </div>
            </div>
            <div class="input-wrapper">
              <div id="userName-wrapper" class="input-unit w-100">
                <input id="user-name" class="input" type="text" data-max-length="36" placeholder="username">
                <div class="max-num"><label>0</label><span>/36</span></div>
              </div>
              <div id="userName-error-msg" class="text-start input-error"></div>
              <div  id="userMail-wrapper" class="input-unit w-100">
                <input id="user-email" class="input"  type="text" data-max-length="64" placeholder="email">
                <div class="max-num"><label>0</label><span>/64</span></div>
              </div>
              <div id="userMail-error-msg" class="text-start input-error"></div>
              <div id="userPass-wrapper" class="input-unit w-100">
                <input id="user-password" class="input" type="password" data-max-length="50" placeholder="password">
                <div class="max-num"><label>0</label><span>/50</span></div>
              </div>
              <div id="userPass-error-msg" class="text-start input-error"></div>
              <div id="userPass_confirmation-wrapper"  class="input-unit w-100">
                <input id="password-confirm"  class="input" type="password" data-max-length="50" placeholder="confirm password">
                <div class="max-num"><label>0</label><span>/50</span></div>
              </div>
              <div id="userPass_confirmation-error-msg" class="text-start input-error"></div>
            </div>
            <div class="have-no-acc">
              <div class="wrapper">
                <h1 class="h5">
                  <span> لديك حساب؟ </span><a href="{{url("/login")}}">سجل دخول</a>
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
            <button id="sign-up-btn" class="h4 bold">
              <span class="spinner-border spinner-border-m" role="status" aria-hidden="true" style="display: none;"></span>
              <span>إنشاء حساب</span>
            </button>
          </div>
        </div>
      </div>
      <div id="over-layer-wrapper"></div>
      @include('partial._js')
      <script src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
      <script src="{{asset("/js/lib/base.js")}}"></script>
      <script src="{{asset("/js/user.js")}}"></script>
      <script src="{{asset("/js/log.js")}}"></script>
    </body>
</html>
