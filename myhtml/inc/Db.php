<?php
/**
 * Created by PhpStorm.
 * User: lifanko  lee
 * Date: 2017/8/4
 * Time: 19:57
 */
namespace inc\Db;

class Db
{
    private static $db = "docs";

    public static function setDb($db)
    {
        self::$db = $db;
    }

    public static function getDb()
    {
        return self::$db;
    }

    public static function connect()
    {
        try {
            $PDO = new \PDO("mysql:host=localhost;dbname=" . self::$db, "root", "saber5459");
        } catch (\PDOException $e) {
            die("<div style='color: red;text-align: center;margin-top: 10%'><h1>Unable to connect to database</h1><h3>Please contact lifankohome@163.com</h3></div>");
        }
        $PDO->query("set names utf8");
        return $PDO;
    }

    public static function cheInj($arg, $max = 12)
    {
        if (preg_match('/select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $arg) || mb_strlen($arg) > $max) {
            die("安全策略触发：请求响应中止");
        }
    }

    //获取IP
    public static function getIP()
    {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "unknown";
        return ($ip);
    }
}
