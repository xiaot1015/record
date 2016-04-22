<?php
echo mHash("xiaotao")."\n";

function mhash1($key){
    $md5 = substr(md5($key),0,8);
    $seed = 31;
    $hash = 0;
    echo $md5."\n";
    for($i=0;$i<8;$i++){
        echo $i."\n";
        echo $md5{$i}."\n";
        $hash = $hash * $seed + ord($md5{$i});
        echo $hash."\n";
        echo $i."\n";
        $i++;
    }
    return $hash & 0x7FFFFFFF;
}
echo mhash1("xiaotao");
