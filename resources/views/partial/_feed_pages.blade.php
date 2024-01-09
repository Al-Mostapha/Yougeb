<div class="down">
  <div class="container">
      <div class="top-wrapper">
          <div class="top flex">
              <div class="ans-num" style="flex-grow: 2;">
                  {{$totalFeedCount}}&nbsp;&nbsp;&nbsp;<span class="gray">سؤال</span>
              </div>
              <div class="blank" style="flex-grow: 20; "></div>
              <div class="arrange" style="flex-grow: 5;">
                  <div class="flex ltr">
                      <div class="tabs flex">
                          <div
                              class="unit-arrange <?= $filter == env("FEED_FILTER_BEST") ? 'selected' : '' ?> ">
                              <div class="text">
                                  <a href="<?= url()->current() . '?sort=' . env("FEED_FILTER_BEST") ?>"
                                      class="easy-bg-color">تصويت</a>
                              </div>
                          </div>
                          <div
                              class="unit-arrange <?= $filter == env("FEED_FILTER_OLD") ? 'selected' : '' ?>">
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
                              class="unit-arrange <?= $filter == env("FEED_FILTER_UN_ANS") ? 'selected' : '' ?>">
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
          <div class="page-list">
              {{$pageList}}
          </div>
      </div>
  </div>
</div>