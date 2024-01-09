<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('partial._css')
    <title>أكتب سؤالك</title>
  </head>
  <body>
    @include("partial._toolbar")
    <div id="editor"></div>
    <div id="over-layer-wrapper"></div>
  </body>
  <script  type="text/javascript" src="{{asset("/js/lib/jquery-3.2.1.min.js")}}"></script>
  <script  type="text/javascript" src="{{asset("/js/lib/heighlight.js")}}"></script>
  <script  type="text/javascript" src="{{asset("/js/lib/katex.js")}}"></script>
  <script  type="text/javascript" src="{{asset("/js/lib/quill.js")}}"></script>
  <script  type="text/javascript" src="{{asset("/js/base.js")}}"></script>
  <script  type="text/javascript" src="{{asset("/js/user.js")}}"></script>
  <script  type="text/javascript" src="{{asset("/js/quran.js")}}"></script>
  <script  type="text/javascript" src="{{asset("/js/editor.js")}}"></script>
</html>
