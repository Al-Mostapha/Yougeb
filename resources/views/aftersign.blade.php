<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>أكمل</title>
      @include('partial._css')
    </head>
    <body>
        @include('partial._header')
        <div id="form-container" class="dir">
            <div class="login-page">
                <div class="form-login">
                    <div class="skip-wrapper">
                        <button class="skip">تخطى</button>
                    </div>
                    <div class="have-no-acc">
                        <div class="wrapper">
                            <h1>
                                <span> اختر اسم مميز وسهل التذكر </span>
                            </h1>
                        </div>
                    </div>
                    
                    <div class="input-wrapper flex">
                        <input id="user-name" type="text" placeholder="mention name e.g @@newnten">
                    </div>
                    <button id="log-in-btn">تعديل الاسم</button>
                </div>
            </div>
        </div>
    </body>
</html>
