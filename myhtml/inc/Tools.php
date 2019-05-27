<?php
/**
 * Created by PhpStorm.
 * User: lifanko  lee
 * Date: 2017/8/30
 * Time: 17:18
 */
namespace inc\Tools;

class Tools{
    // 本月的月初时间戳
    public static function getMonth00(){
        return strtotime(date('Y-m') . '-1 00:00:00');
    }

    //上个月的月初时间戳
    public static function getMonth10(){
        $thisMonth = date('m');
        $thisYear = date('Y');
        if ($thisMonth == 1) {
            $lastMonth = 12;
            $lastYear = $thisYear - 1;
        } else {
            $lastMonth = $thisMonth - 1;
            $lastYear = $thisYear;
        }
        $lastStartDay = $lastYear . '-' . $lastMonth . '-1';
        return strtotime($lastStartDay);
    }

    // 数组按值排序返回
    public static function sorts($key,$value,$reverse = true){
        $com = array_combine($key,$value);
        if($reverse){
            arsort($com);
        }else{
            asort($com);
        }

        return array('key'=>array_keys($com),'value'=>array_values($com));
    }

    //指定日期到指定日期的月份差
    public static function getMonthNum($date1, $date2, $tags = '-')
    {
        $date1 = explode($tags, $date1);
        $date2 = explode($tags, $date2);
        return abs($date1[0] - $date2[0]) * 12 + abs($date1[1] - $date2[1]);
    }
}