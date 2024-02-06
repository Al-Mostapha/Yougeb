<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>يُجيب </title>
    @include('partial._common_meta')
    @include('partial._css')
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "home",
          "item": "{{ url("/")}}"
        }]
      }
    </script>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "{{ url("/") }}",
        "logo": "{{ url("/") }}image/logo/logo.svg".'"
      }
    </script>

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url("/") }}">
    <meta property="og:site_name" content="يُجيب - Yougeb">
    <meta property="og:image" itemprop="image primaryImageOfPage" content="{{ url("/") }}image/logo/logo.svg">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:domain" content="www.yougeb.com">
    <meta name="twitter:title" property="og:title" itemprop="name" content="يُجيب-  الصفحة الرئيسية">
    <meta name="twitter:description" property="og:description" itemprop="description" content="يجيب - نعمل على اثراء المحتوى العربى عن طريق توفير اكبر مجتمع لتبادل المعرفة">
    <meta name="description" content="يجيب - نعمل على اثراء المحتوى العربى عن طريق توفير اكبر مجتمع لتبادل المعرفة">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Al Mustapha">
  </head>
    <body>
      @include('partial._header_new')
      <div id="glo-container" style="background-color: white">
        <div id="user-home">
            <div id="top-gridiant">
              <div id="wrapper-top">
                <div class="content-wrapper">
                  <div class="content">
                    <div class="logo-wrapper flex rtl">
                      <div class="logo">
                        <img src="{{url("/image/logo/logo.svg")}}"/>
                      </div>
                    </div>
                    <div class="slogan-wrapper">
                      <div class="slogan">
                        <h1>نعمل على اثراء المحتوى العربى عن طريق توفير <br/> اكبر مجتمع  لتبادل المعرفة </h1>
                      </div>
                    </div>
                    <div class="offer-help-wrapper">
                      <div class="offer-help">
                        <div class="title">  ساعد عن طريق  </div>
                        <div class="btn-wrapper flex">
                          <div class="sing-btn">
                            <button id="goto-add-que">اضافة سؤال</button>
                          </div>
                          <div class="help-ans">
                            <button id="goto-add-ans">اجب عن سؤال</button>
                          </div>
                          <div class="help-art">
                            <button id="goto-add-art">اضافة مقال</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="float-image"></div>
            <div id="add-que-tip" class="help-tip">
                <div class="content-wrapper">
                    <div class="content">
                        <div class="title-wrapper">
                            <div class="title"> اضافة سؤال مفيد الى المجتمع</div>
                            <hr/>
                        </div>
                        <div class="brief flex">
                            <div class="image">
                                <img src="{{url("/image/background/1.jpg")}}"/>
                            </div>
                            <div class="desc">
                                <p class="pragraph">
                                    ساعد فى نشر المعرفة عن طريق اضافة سؤال والاجابة عنه
                                    <br>
                                    <br>
                                    <br>
                                    قم بزيادة المعرفة لديك  باضافة اسألة والسماح للمتخصصين بالاجابة عنها
                                </p>
                                <div class="btn">
                                    <a class="deco-non" href="{{url("/ask")}}">
                                        اضف سؤال
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div id="ans-que-tip"  class="help-tip">
                <div class="content-wrapper">
                    <div class="content">
                        <div class="title-wrapper">
                            <div class="title">
                              أجب عن الاسئلة المطروحه او حسن احد الاجابات
                            </div>
                            <hr/>
                        </div>
                        <div class="brief flex">
                            
                            <div class="desc">
                                <p class="pragraph">
                                    ساعد فى زيادة خبرة الزوار من خلال توفير اجابات منسقة و مفيدة
                                    <br>
                                    <br>
                                    <br>
                                    ساعد فى  تحسين الاجابات وتعديل النقاط المبهمة
                                </p>
                                <div class="btn">
                                    <a class="deco-non" href="{{url("/ask")}}">
                                        اجب عن سؤال
                                    </a>
                                </div>
                            </div>
                            <div class="image">
                                <img src="{{url("/image/background/1.jpg")}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="add-art-tip" class="help-tip">
                <div class="content-wrapper">
                    <div class="content">
                      <div class="title-wrapper">
                        <div class="title">
                          اضف مقال او قصة او بحث  لنشر الوعى الثقافى
                        </div>
                        <hr/>
                      </div>
                      <div class="brief flex">
                        <div class="desc">
                          <p class="pragraph">
                            ساعد فى زيادة خبرة الزوار من خلال توفير اجابات منسقة و مفيدة
                            <br>
                            <br>
                            <br>
                            ساعد فى  تحسين الاجابات وتعديل النقاط المبهمة
                          </p>
                          <br>
                          <br>
                          <br>
                          <div class="btn">
                            <a class="deco-non" href="{{url("/ask")}}"> اضف مقال </a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div id="over-layer-wrapper"></div>
      @include('partial._footer')
      @include('partial._js')
      <script type="text/javascript" src="{{asset("js/lib/jquery-3.2.1.min.js")}}"></script>
      <script type="text/javascript" src="{{asset("ws_server/server.js")}}"></script>
      <script type="text/javascript" src="{{asset("js/user.js")}}"></script>
      <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("#goto-add-que").on('click', function(event) {
                
                event.preventDefault();
                $('html, body').animate({
                  scrollTop: $("#add-que-tip").offset().top
                }, 800, function(){
                    
                });
            });
            $("#goto-add-ans").on('click', function(event) {
                
                event.preventDefault();
                $('html, body').animate({
                  scrollTop: $("#ans-que-tip").offset().top
                }, 800, function(){
                    
                });
            });
            $("#goto-add-art").on('click', function(event) {
                
                event.preventDefault();
                $('html, body').animate({
                  scrollTop: $("#add-art-tip").offset().top
                }, 800, function(){
                });
            });
        });
      </script>
    </body>
</html>
