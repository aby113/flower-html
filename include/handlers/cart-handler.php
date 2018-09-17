<?php
if(!isset($_SESSION)){
    session_start();
}

// getCartItemList($pno, $mno)
// delCartItem($cart_no)
//  modCartItem($cart_no, $amount)
    $cart = new Cart($con);
     // 상품 총 갯수
     $prodCnt = 0;
     // 상품 총액
     $totalCnt = 0;
    // 로그인한경우 - 로그인 안한경우
    if (isset($_SESSION['login'])) {
        $mno = $_SESSION["login"]['mno'];
        $items = $cart->getCartItemList($mno);
    }else{
        $request_uri = $_SERVER['REQUEST_URI'];
        if($request_uri === "/view/cart2.php")return;

        header("Location:../../view/cart2.php");
    }


    if(isset($_POST["delBtn"])){
        $cartNoArr = $_POST["cart_no"];
        foreach ($cartNoArr as $cart_no) {
            $cart->delCartItem($cart_no);
        }

        header("Location:cart.php");
    }

    
    function numberFormat($num){

        if(isset($num)){
            return number_format($num);
        }

        return 0;
    }

    function issetParam($param){

        if(isset($param)){
            return $param;
        }

        return 0;
    }


?>