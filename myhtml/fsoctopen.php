<?php
$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);//创建一个socket套接流
socket_connect($socket,'148.70.230.234',10001); //连接服务端的套接流，这一步就是使客户端与服务器端的套接流建立联系
$message = "39.90,116.40";

$message = mb_convert_encoding($message,'GBK','UTF-8');//转为GBK编码，处理乱码问题

socket_write($socket,$message,strlen($message))
?>