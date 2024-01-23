<div class="down">
  <div class="container">
      <div class="top-wrapper">
          <div class="top flex">
              <div class="ans-num">
                  {{$paginator->total()}}&nbsp;&nbsp;&nbsp;<span class="gray">سؤال</span>
              </div>
              <div class="arrange col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0">
                  <div class="flex ltr">
                      <div class="tabs flex">
                          <div
                              class="unit-arrange {{$filter == env("FEED_FILTER_BEST") ? 'selected' : ''}}">
                              <div class="text">
                                  <a href="{{url()->current() . '?sort=' . env("FEED_FILTER_BEST")}}"
                                      class="easy-bg-color">تصويت</a>
                              </div>
                          </div>
                          <div
                              class="unit-arrange {{ $filter == env("FEED_FILTER_OLD") ? 'selected' : ''}}">
                              <div class="text">
                                  <a href="<?= url()->current() . '?sort=' . env("FEED_FILTER_OLD") ?>"
                                      class="easy-bg-color">الاقدم</a>
                              </div>
                          </div>
                          <div
                              class="unit-arrange <?= $filter == env("FEED_FILTER_NEW") ? 'selected' : '' ?>">
                              <div class="text">
                                  <a href="<?= url()->current() . '?sort=' . env("FEED_FILTER_NEW") ?>"
                                      class="easy-bg-color">الاحدث</a>
                              </div>
                          </div>
                          <div
                              class="unit-arrange <?= $filter == env("FEED_FILTER_UN_ANS") ? 'selected me-1 mx-1' : '' ?>">
                              <div class="text">
                                  <a href="<?= url()->current() . '?sort=' . env("FEED_FILTER_UN_ANS") ?>"
                                      class="easy-bg-color">بدون اجابة</a>
                              </div>
                          </div>
                          <div
                              class="unit-arrange <?= $filter == env("FEED_FILTER_WOREST") ? 'selected' : '' ?>">
                              <div class="text">
                                  <a href="<?= url()->current() . '?sort=' . env("FEED_FILTER_WOREST") ?>"
                                      class="easy-bg-color">الاسوء</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="page-list mt-3">
              {{$paginator->onEachSide(1)->links("partial._paginator")}}
          </div>
      </div>
  </div>
</div>