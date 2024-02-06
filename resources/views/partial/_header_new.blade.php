<header class="p-2 mb-2 border-bottom"  style="border-top: solid 3px #008a00;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start flex-row-reverse">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <img src="/image/logo/logo.svg"/>
      </a>
      <ul class="nav col-12 col-lg-auto mx-lg-auto mb-2 justify-content-center mb-md-0">
        <li>
          <a class="nav-link" href="#notification">
            <img class="bi d-block mx-auto mb-1" src="/image/icon/notifications.svg"  width="24" height="24"/>
            <span>اشعارات</span>
          </a>
        </li>
        <li>
          <a class="nav-link" href="{{ url("/topic") }}">
            <img class="bi d-block mx-auto mb-1" src="/image/icon/spaces.svg"  width="24" height="24"/>
              <div class="wrapper">
                <span>مواضيع</span>
              </div>
          </a>
        </li>
        <li>
          <a class="nav-link" href="{{ url("/feed") }}">
            <img class="bi d-block mx-auto mb-1" src="/image/icon/question.svg"  width="24" height="24"/>
              <div class="wrapper">
                <span>اسئلة</span>
              </div>
          </a>
        </li>
        <li>
          <a class="nav-link" href="{{ url("/") }}">
            <img class="bi d-block mx-auto mb-1" src="/image/icon/home.svg"  width="24" height="24"/>
            <div class="wrapper">
              <span>الرئيسية</span>
            </div>
          </a>
        </li>
      </ul>
      @if(auth()->check())
        <div class="d-flex align-items-center flex-row-reverse text-end">
          <form class="w-100 me-3 text-end" role="search">
            <input  id="glo-search" type="search" class="form-control" placeholder="ابحث عن اى شئ..." aria-label="Search">
          </form>
          <div class="flex-shrink-0 dropdown me-3">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>
      @else
        <form class="me-3 text-end  mb-2 justify-content-center mb-md-0" role="search">
          <input  id="glo-search" type="search" class="form-control" placeholder="ابحث عن اى شئ..." aria-label="Search">
        </form>
        <div  id="log-from-header" class="d-flex align-items-center flex-row-reverse text-end me-2">
          <div class="sign-up">
              <div class="btn-wrapper btn">
                  <a class="deco-non flex font-weight-bold text-nowrap" href="{{url("/signup")}}">
                      <span>انشاء حساب</span>
                  </a>
              </div>
          </div>
          <div class="log-in me-2">
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
</header>