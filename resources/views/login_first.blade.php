<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>يُجيب </title>
    @include('partial._css')
  </head>
  <body>
    @include('partial._header')
    <div id="glo-container" style="background-color: white">
      <div id="user-home">
        <div id="top-gridiant">
          <div id="wrapper-top">
            <div class="content-wrapper">
                <div class="content">
                    <div class="logo-wrapper flex rtl">
                        <div class="logo">
                            <img src="{{asset("/image/logo/logo.svg")}}"/>
                        </div>
                    </div>
                    <div class="slogan-wrapper">
                        <div class="slogan">
                            <h1>نعمل على اثراء المحتوى العربى عن طريق توفير <br/> اكبر مجتمع  لتبادل المعرفة </h1>
                        </div>
                    </div>
                    <div class="offer-help-wrapper">
                        <div class="offer-help">
                            <div class="title">لأضافة سؤال عليك اولا  الحصول على حساب</div>
                            <div class="btn-wrapper flex">
                                <div class="sing-btn">
                                    <button>انشاء حساب</button>
                                </div>
                                <div class="help-ans">
                                    <button>تسجيل الدخول</button>
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
                        <div class="title">
                            اضافة سؤال مفيد الى المجتمع
                        </div>
                        <hr/>
                    </div>
                    <div class="brief flex">
                        <div class="image">
                            <img src="{{asset("/image/background/1.jpg")}}"/>
                        </div>
                        <div class="desc">
                            <p class="pragraph">
                                ساعد فى نشر المعرفة عن طريق اضافة سؤال والاجابة عنه
                                <br>
                                <br>
                                <br>
                                قم بزيادة المعرفة لديك  باضافة اسألة والسماح للمتخصصين بالاجابة عنها
                            </p>
                            <div class="btn"></div>
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
  </body>
</html>
