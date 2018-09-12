<?php

$prodDAO = new ProductDAO($con);

if(isset($_GET["cno"])){
    // 만약 sort가 null 이면 내림차순으로 초기화
    $list = $prodDAO->getProductList($_GET["cno"], 8, 'pno', 'desc');
    $prodCnt = count($list);
}

function isSelected($order){

    if(isset($_GET["order"])){
        return $_GET["order"] === $order? "selected":"";
    }
}


?>