<?php 

set_time_limit(0);
$address = '127.0.0.1';
$port = 10005;
if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) === false){
    echo "socket create failed:". socket_strerror(socket_last_error())  ."\n";
}
if(socket_bind($sock,$address,$port) === false){
    echo "socket bind error";
    exit;
}

if(socket_listen($sock,3) === false){
    echo "listen failed";
    exit;
}
do{
    if(($msgsocket = socket_accept($sock))=== false){
        echo "accept falid";
        break;
    }
    $msg = "hello world";
    socket_write($msgsocket,$msg,strlen($msg));
    echo "read socket client:";
    $buf = socket_read($msgsocket,8192);
    $back = "receive msg:$buf";
    echo $back;
    if(false === socket_write($msgsocket,$back,strlen($back))){
        echo "write failed";
    }else{
        echo "send success";
    }
}while(true);
socket_close();
