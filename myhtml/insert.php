<?php 
    include_once "sever_config.php";
    require_once 'inc/Db.php';
    use \inc\Db\Db;
    header("Content-type: text/html;charset=utf-8"); 
$link = mysql_connect($servername,$dbusername,$dbpassword);  
if (mysql_select_db($dbname)) {  
if ($link) {  
echo "connect succeed";  
mysql_query("ALTER TABLE `statment` ADD column pm varchar(100) NOT NULL ") or die(mysql_error());  
echo "Add succeed";  
} else {  
echo "connect failed";  
}  
mysql_close($link);  
}  
?>  
