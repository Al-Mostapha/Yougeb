<header class="sticky-top" id="glo-header">
    <div class="header-wrapper">
      <div class="logo-tap-wrapper">
        <div class="logo-wrapper fullH">
            <a class="logo" href="{{ url("/") }}"></a>
        </div>
        <div id="nav-tabs" class="icon-wrapper fullH">
            <ul class="nav w-100 h-100">
                <li class="nav-item w-25 h-100">
                  <a class="nav-link" href="{{ url("/") }}">
                    <div class="wrapper">
                      <label></label>
                      <span>الرئيسية</span>
                    </div>
                  </a>
                </li>
                <li class="nav-item w-25 h-100">
                    <a class="nav-link" href="{{ url("/feed") }}">
                        <div class="wrapper">
                            <label></label>
                            <span>اسئلة</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item w-25 h-100">
                    <a class="nav-link" href="{{ url("/topic") }}">
                        <div class="wrapper">
                            <label></label>
                            <span>مواضيع</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item w-25 h-100">
                    <a class="nav-link" href="#notification">
                        <div class="wrapper">
                            <label></label>
                            <span>اشعارات</span>
                        </div>
                    </a>
                </li>
            </ul>
          </div>
      </div>
      <div class="sea-btn-warpper">
        <div class="search-bar-wrapper fullH">
          <div class="wrapper">
            <input id="glo-search" placeholder="ابحث عن اى شئ...">
          </div>
          <div id="search-result"></div>
        </div>
        <div class="other-wrapper fullH flex">
          @if(auth()->check())
              <div class="profile">
                <div class="user-image">
                    <a id="openUserHeaderList" class="avatar" style="background-image: url('{{url('/'.auth()->user()->image)}}')"></a>
                </div>
                <div class="profile-pop-up list-with-arrow"> 
                    <div class="res-wrapper rtl">
                        <div class="arrow"></div>
                        <div class="ol">
                            <div id="logoutFromAccount" class="li easy-bg-color">
                                <a class="flex">
                                    <div class="icon"><img src="image/icon/ask.svg"></div>
                                    <div class="title">تسجيل الخروج</div>
                                </a>
                            </div>
                            <div class="li easy-bg-color">
                                <a  href="{{url('/'.auth()->user()->id_url)}}"  class="flex">
                                    <div class="icon"><img src="image/icon/ask.svg"></div>
                                    <div class="title">الملف الشخصى</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ask-btn flex">
                <a href="{{url("/ask")}}" class="flex add-que-btn">
                    <div class="icon">
                    </div>
                    <div class="text">
                        اضف سؤال
                    </div>
                </a>
            </div>
          @else
          <div id="log-from-header" class="flex">
              <div class="sign-up">
                  <div class="btn-wrapper btn">
                      <a class="deco-non flex font-weight-bold text-nowrap" href="{{url("/signup")}}">
                          <span>انشاء حساب</span>
                      </a>
                  </div>
              </div>
              <div class="log-in">
                  <div class="btn-wrapper">
                      <a class="deco-non flex font-weight-bold text-nowrap" href="{{url("/login")}}">
                          <span class="">تسجيل الدخول</span>
                      </a>
                  </div>
              </div>
          </div>
          @endif
          </div>
        </div>
      </div>
</header>