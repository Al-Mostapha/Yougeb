<?php

if(!function_exists("formatTime")){
    function formatTime($time)
    {
        
        $now = time();
        
        if($now - $time < 60){
            return "منذ لحظات";
        }
        if ($now - $time < 2*60) {
            return "منذ دقيقة";
        }
        if ($now - $time < 3*60) {
            return "منذ دقيقتين";
        }
        if ($now - $time < 11*60) {
            return "منذ ".floor(($now - $time)/60)." دقائق";
        }
        if ($now - $time < 60*60) {
            return "منذ ".floor(($now - $time)/60)." دقيقة";
        }
        if ($now - $time < 2*60*60) {
            return "منذ ساعة";
        }
        if ($now - $time < 3*60*60) {
            return "منذ ساعتين";
        }
        if ($now - $time < 11*60*60) {
            return "منذ ".floor(($now - $time)/(60*60))." ساعات";
        }
        if ($now - $time < 24*60*60) {
            return "منذ ".floor(($now - $time)/(60*60))." ساعة";
        }
        if ($now - $time < 2*24*60*60) {
            return "منذ يوم";
        }
        if ($now - $time < 3*24*60*60) {
            return "منذ يومين";
        }
        if ($now - $time < 7*24*60*60) {
            return "منذ ".floor(($now - $time)/(24*60*60))." ايام";
        }
        if ($now - $time < 8*24*60*60) {
            return "منذ اسبوع";
        }
        if ($now - $time < 15*24*60*60) {
            return "منذ اسبوعين";
        }
        return strftime("%e %b %Y", time());
    }
}


if(!function_exists("numberToStr")){
    function numberToStr($num){
        return $num;
    }
}


if(!function_exists("addslashes")){
    function addslashes($str){
        return $str;
    }
}
