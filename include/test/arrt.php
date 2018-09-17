<?php
$a = array('pno'=>1, "amt"=>3);
$a1 = array(array('pno'=>1, "amt"=>10));
foreach($a1 as &$vo){
    if($a['pno'] === $vo['pno']){
        $vo['amt'] += $a['amt'];
    }
}

var_dump($a1);

?>