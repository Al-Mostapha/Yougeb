<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>اضافة سؤال</title>
    @include('partial._css')  
  </head>
    <body>
      @include('partial._header')
        <div id="glo-container">
          <div id="body-wrapper">
              <div id="mid-col" class="add-que-col">
                  <div class="mid-wrapper">
                      <div class="glo-unit mid-unit"></div>
                      <div id="add-question-wrapper" class="dir glo-unit mid-unit">
                          <div class="q-wrapper">
                              <div class="over-view-q"></div>
                              <div class="q-title-wrapper">
                                  <h1 class="h1">عنوان السؤال</h1>
                                  <div class="input-wrapper">
                                      <input id="question-title" type="text" placeholder="يمكنك السؤال عن شئ فى اى مجال.."/>
                                  </div>
                              </div>
                              <div class="q-editor-wrapper">
                                  @include('partial._toolbar')
                                  <div id="editor"> </div>
                                  <div id="down-editor" class="flex">
                                      <div id="counter"></div>
                                      <div class="save-draft flex">
                                          <div class="draft-state"></div>
                                          <div>
                                              <div class="save-btn">حفظ فى مسودة</div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="q-tags">
                                  <div class="input-wrapper">
                                      <div class="q-tag-list">
                                          <div id="q-tag-list" class="ul"></div>
                                      </div>
                                      <input id="search-tag-input" type="text" placeholder="اضف عنوانين  لتسهيل وصول السؤال للمختصين"/>
                                  </div>
                                  <div id="tag-search-res"> </div>
                              </div>
                              <div class="q-btns">
                                  <div class="q-btn-wrapper">
                                      <div class="middel-btns">
                                          <button id="add-new-question" class="btn">أضف السؤال</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script  type="text/javascript" src="{{asset("js/lib/jquery-3.2.1.min.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/lib/heighlight.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/lib/katex.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/lib/quill.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/lib/mathquill.min.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/lib/mathquill4quill.min.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/lib/base.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/quran.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/user.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/editor.js")}}"></script>
      <script  type="text/javascript" src="{{asset("js/addQ.js")}}"></script>
    </body>
</html>
