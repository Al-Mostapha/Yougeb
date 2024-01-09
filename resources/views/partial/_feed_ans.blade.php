<div class="glo-unit mid-unit ans-card">
  @forelse($feeds as $oneFeed)
  <div class="ans-wrapper feed-unit">
      <div class="ans-content flex">
          <div class="stats-container">
              <div class="stats flax">
                  <div class="up">
                      <div class="vote">
                          <div class="bold">{{$oneFeed->vote}}</div>
                          <div class="sml">تصويت</div>
                      </div>
                      <div class="ans">
                          <div class="bold">{{$oneFeed->ans_num}}</div>
                          <div class="sml">اجابة</div>
                      </div>
                  </div>
                  <div class="view">
                      <div>{{$oneFeed['view_num']}}<div class="sml">مشاهدة</div></div>
                  </div>
              </div>
          </div>
          <div class="ans-cont-wrapper">
              <div class="question-title-wrapper">
                  <h1>
                      <a href="{{url("/$oneFeed->title")}}">{{$oneFeed->title}}؟</a>
                  </h1>
              </div>
              <div class="question-summary">
                  <p>{{$oneFeed->brief}}.....</p>
              </div>
              <div class="asked-by-wrapper">
                  <div class="tag-list">
                      <ul class="flex">
                          @foreach($oneFeed->tags as $oneTag)
                          <li>
                              <a href="{{url("/feed/$oneTag->id_url")}}" class="tag-txt">
                                  {{$oneTag->title}}
                              </a>
                          </li>
                          @endforeach
                      </ul>
                  </div>
                  <div class="asked-by-box">
                      <div class="ask-date">سئل {{formatTime($oneFeed->time_stamp)}}</div>
                      <div class="user-box">
                          <div class="image">
                              <img src="{{asset($oneFeed->image)}}"/>
                          </div>
                          <div class="data">
                              <div class="full-name">
                                  <a href="{{url("/@$oneFeed->user_url")}}">
                                      {{$oneFeed->full_name}}
                                  </a>
                              </div>
                              <div></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @empty
      <p>No items found.</p>
  @endforelse
  <div class="last-raw">
      <div class="page-list flex">
          <?= $pageList ?>
      </div>
  </div>
</div>