<?php
if(!isset($_SESSION)){
    session_start();
}

// getCartItemList($pno, $mno)
// delCartItem($cart_no)
//  modCartItem($cart_no, $amount)
    $cart = new Cart($con);
    if (isset($_SESSION['login'])) {
        $mno = $_SESSION["login"]['mno'];
        $items = $cart->getCartItemList($mno);
        $prodCnt = 0;
        $totalCnt = 0;
    }

    if(isset($_POST["delBtn"])){
        $cartNoArr = $_POST["cart_no"];
        foreach ($cartNoArr as $cart_no) {
            $cart->delCartItem($cart_no);
        }
    }






?>