<?php
include "../config.php";
include "../classes/ProductDAO.php";
include "../classes/Cart.php";

$pdoDAO = new ProductDAO($con);
$cartDAO = new Cart($con);
// json-post 로 보낼때 값받아와서 셋팅
$param = json_decode(file_get_contents('php://input'), true);
if(!isset($_SESSION)){
    session_start();
}

if (isset($_GET["cno"])) {
    $result = $pdoDAO->getProductList($_GET["cno"], $_GET["perPageNum"], $_GET["order"], $_GET["sort"]);
    echo json_encode($result);
  //  exit;
}

// 장바구니 추가 이벤트
   if(isset($param['addCart'])){
      $data = $param['data'];
    // 회원인 경우
    if (isset($_SESSION["login"])) {
        $mno = $_SESSION["login"]['mno'];
        $cartDAO->addCart($mno, $data['pno'], $data['amount']);
        echo "1";
        exit;
    }else{ // 비회원일 경우
        echo "0";
        exit;
    }




    // }else{ // 비회원인경우
    //      if(isset($_COOKIE['cart']) && $_COOKIE['cart'] !== "null"){
    //          // pno와 amount를 구한다 그런다음 기존 행을 찾는다 수량을 변경한다

    //          $cart = json_decode($_COOKIE["cart"], true);
    //          $isNew = false;
    //          foreach($cart as &$vo){
                
    //             if($param['data']['pno'] === $vo['pno']){
    //                 $vo['amount'] += $param['data']['amount'];
    //                 break;
    //             }else{
    //                 $isNew = true;
    //             }
    //          }
    //          if($isNew)array_push($cart, $param['data']); 
    //          setcookie('cart', json_encode($cart), time() + 60 * 60 * 24 * 30, "/", null,null,null);
    //         }else{
    //          unset($param['addCart']);
    //          setcookie('cart', json_encode(array($param['data'])), time() + 60 * 60 * 24 * 30, "/", null, null,null);
                
    //         }


    // }
 }


?>