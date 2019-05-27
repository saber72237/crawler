<?php

    include_once "sever_config.php";
    require_once 'inc/Db.php';
    use \inc\Db\Db;
    header("Content-type: text/html;charset=utf-8");
       
       
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
            <a class="brand" href="index.php" style="padding: 8px 20px 0;cursor: pointer;" title="刷新并回到首页">亮度调节</a>
            <form class="navbar-form pull-right" style="margin-top: 3px">
            </form>
        </div>
    </div>
</div>
<div class="container"
     style="box-shadow: 0 0 2.5em #5d656c;background: rgb(255, 255, 255) none repeat scroll 0 0;padding: 50px 30px 0;">
    <h3><i class="icon-group icon-2x text-error" style="vertical-align: middle"></i>　<a href="index.php" style="line-height: 54px;font-weight: 300;"></a>
        <a href="upload.php" class="pull-right" style="line-height: 54px;font-size: 18px;"></a></h3>
    <hr>
    <div class="download"  style="text-align:right;">
    </div>
    <div class="search"  style="text-align:right;">
    </div>
    <div class="seekbar1" style="padding: 0px 150px 0px">
    <form action="fsoctopen.php" enctype="multipart/form-data" method="get" id="form" name="form">
    <input type="range" name="range1" min="0" max="100" step="5" onchange="b.value=this.value"/>
    <output type="text" name="b" for="range1" ></output>
    <input type="submit" name="submit" value="1号调节" style=" background-color: black;width: 80px;height: 30px;color: white; line-height: 25px;margin-bottom: 10px;">  
    </form>
    </div>
    <div class="seekbar2" style="padding: 50px 150px 0px">
    <form action="submit.php" enctype="multipart/form-data" method="get" id="form" name="form">
    <input type="range" id="range1" min="0" max="100" step="5" onchange="b.value=this.value"/>
    <input type="submit" name="mit" value="2号调节" style=" background-color: black;width: 80px;height: 30px;color: white; line-height: 25px;margin-bottom: 10px;">
    <output id="b" for="range1" ></output>
    </form>
    </div>
    <div class="seekbar3" style="padding: 50px 150px 100px">
    <form action="submit.php" enctype="multipart/form-data" method="get" id="form" name="form">
    <input type="range" id="range1" min="0" max="100" step="5" onchange="b.value=this.value"/>
    <input type="submit" name="mit" value="3号调节" style=" background-color: black;width: 80px;height: 30px;color: white; line-height: 25px;margin-bottom: 10px;">
    <output id="b" for="range1" ></output>
    </form>
    </div>
    </div>  
</div>
<div class="container"
     style="box-shadow: 0 0.4em .8em #5d656c;padding: 20px 30px;margin-bottom: 1%;background-color: rgb(58, 53, 46);border-radius: 0 0 6px 6px;">
</div>
</body>
</html>
