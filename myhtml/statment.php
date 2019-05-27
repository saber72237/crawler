<?php

    include_once "sever_config.php";
    require_once 'inc/Db.php';
    use \inc\Db\Db;
    header("Content-type: text/html;charset=utf-8");
    session_start();

  function news($pageNum = 1, $pageSize = 7)
     {
        global $serverusername,$dbusername,$dbpassword,$dbname;
        $pdo = Db::connect();
        if (isset($_COOKIE["search"])){
            setcookie("search", "", time()-3600);
        }
        $rs = "select * from doc limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
        $r = $pdo->prepare($rs);
        $r->execute();
        while ($obj = $r->fetch(PDO::FETCH_OBJ)) {
            $array[] = $obj;
        }
        return $array;
        $pdo = null;
     }
  function allNews()
      {
          global $serverusername,$dbusername,$dbpassword,$dbname;
          $pdo = Db::connect();
          $rs = "select * from doc"; 
          $r = $pdo->prepare($rs);
          $r->execute();
          while ($obj = $r->fetch(PDO::FETCH_OBJ)) {
            $array[] = $obj;
          } 
          $ros = count($array);
          return $ros;
          $pdo = null;
      }
        $allNum = allNews();
        $pageSize = 7; 
        $pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
        $endPage = ceil($allNum/$pageSize); 
        $array = news($pageNum,$pageSize);
       
       
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta name="renderer" content="webkit">
    <meta charset="UTF-8">
    <title>智能路灯数据中心</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrapv2.3.2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #d3d3d3;
        }
        .carousel-caption {
            opacity: 0;
            transition: all 0.3s;
        }

        .item:hover > .carousel-caption {
            opacity: 0.8;
        }
        #re {
            position: relative;
            margin-left: -6.2pc;
            margin-right: 1.2pc;
            top: 2.3pc;
            display: none;
        }
        .download{
            height: 30px;
            float: left;
        }
        .search{
            height: 30px;
            float: right;
            margin-bottom:35px;
        }
        .brand:hover #re {
            display: inline-block;
            background-color: red;
        }
        .form {
            margin-bottom: 30px;
        }
        .result{
            margin-bottom: 20px;
            margin-left: 20px;
            float: left;
        }
        .result li{
            display: block;
            width:100px;
            height:30px;
            float: left;
            text-align: center;
            line-height: 30px;
            margin: 5px 5px;
            border-radius:10px;
            background-color: #f5f5f5;
                  }
        .result div{
            width:900px;
            border:solid #FFF 10px;
            border-radius: 2px;
            }
        .page{
            height: 50px;
            text-align:center; 
            margin-left: 250px;
        }
        .page li{
            display: block;
            width:100px;
            height:30px;
            float: left;
            text-align: center;
            line-height: 30px;
            margin-left:10px;
            border-radius:10px;
            background-color: #f5f5f5;
            }
        .dropdown {
                position: relative;
                display: inline-block;
                }
        .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: rgba(0,0,0,0.2);
                padding: 5px;
                z-index: 1;
                }
        .dropdown:hover .dropdown-content {
                display: block;
                }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="index.php" style="padding: 8px 20px 0;cursor: pointer;" title="刷新并回到首页">工作状态</a>
            <form class="navbar-form pull-right" style="margin-top: 3px">
            </form>
        </div>
    </div>
</div>
<div class="container"
     style="box-shadow: 0 0 2.5em #5d656c;background: rgb(255, 255, 255) none repeat scroll 0 0;padding: 100px 30px 20px;">
    <h3><i class="icon-group icon-2x text-error" style="vertical-align: middle"></i>　<a href="index.php" style="line-height: 54px;font-weight: 300;"></a>
        <a href="upload.php" class="pull-right" style="line-height: 54px;font-size: 18px;"></a></h3>
    <hr>
    <div class="download"  style="text-align:right;">
    </div>
    <div class="search"  style="text-align:right;">
    </div>
        <div class = "form"; style="display:block;">
            <table class='table table-striped table-bordered table-hover'>

                <tr>
                    <th style="text-align: center">路灯</th>
                    <th style="text-align: center">状态</th>
                </tr>
                 <?php
                  
                    foreach($array as $key=>$values){
                        $urlName = urlencode($values->ID);
                        echo "<tr>";
                        echo "<td style=\"text-align: center\">{$values->ID}</td>";
                        echo "<td style=\"text-align: center\">{$values->name}</td>";
                        echo "</tr>";
                        ;
                    }
                    ?>
                </table>
        </div>
        <div class="page" style="padding: 50px 0 0;">
            <li>
                <a href="?pageNum=1">首页</a>
            </li>
            <li>
                <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
            </li>
            <li>
                <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
            </li>
            <li>
                <a href="?pageNum=<?php echo $endPage?>">尾页</a>
            </li>
                 
        </div>
    </div>  
</div>
<div class="container"
     style="box-shadow: 0 0.4em .8em #5d656c;padding: 20px 30px;margin-bottom: 1%;background-color: rgb(58, 53, 46);border-radius: 0 0 6px 6px;">
</div>
</body>
</html>
