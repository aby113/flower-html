<?php
include "../include/config.php";
include "../include/classes/Criteria.php";
include "../include/classes/Constants.php";
include "../include/classes/Cart.php";
include "../include/handlers/cart-handler.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image⁄x-icon" href="../images/title-logo.png">

    <title>꽃잎마을</title>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/handlebars/handlebars.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/business-frontpage.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
   <?php
   include "header.php";
   ?>
    <!-- 헤더끝 -->
    <section class="container">
        <header>
            <span>홈&gt;</span>
            <span>장바구니</span>
        </header>
        <article>
        <form action="" class="cartFrm" method="post">

            <div class="header">
                <h3><strong> 장바구니</strong></h3>
                <div class="top">
                    <span class="this" title="현재페이지"><strong>01</strong> 장바구니</span>
                    <span><strong>02</strong> 주문서작성/결제</span>
                    <span class="end"><strong>03</strong> 주문완료</span>
                </div>
            </div>
            <div class="body">
           
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="checkbox" name="" id="allCheck" checked="checked"></th>
                            <th>상품/옵션 정보</th>
                            <th>수량</th>
                            <th>상품금액</th>
                            <th>할인/적립</th>
                            <th>합계금액</th>
                            <th>배송비</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 아이템리스트 시작 -->
                      
                        <!-- 아이템 리스트 끝 -->

                  </tbody>

                </table>
                <a href="">&lt;쇼핑계속하기</a>
                <div class="price-box">
                    <p>
                        <span class="detail">총 <strong></strong>개의 상품금액
                            <strong>
                                원
                            </strong>
                        </span>
                        <span class="deliveryCalc">
                            <img src="../images/plus.png" alt="">
                            배송비 0원
                        </span>
                        <span class="total-price">
                            <img src="../images/total.png" alt="">
                            <span></span>원
                        </span>
                    </p>
                </div>
            </div>
            <div class="footer">
                <div class="btn-group">
                    <div class="left-box">
                        <button name="delBtn" class="btn btn-outline-warning delBtn">선택 상품 삭제</button>
                        <button type="button" class="btn btn-outline-warning">선택 상품 찜</button>
                    </div>
                    <div class="right-box">
                        <button type="button" class="btn btn-outline-danger orderBtn">선택상품주문</button>
                        <button class="btn btn-danger">전체상품주문</button>
                    </div>
                </div>
            </div>
        </form>
        </article>




    </section>

    <script>
        var $frm = $(".cartFrm");
        var reqURL = "";
    </script>
    <script src="../js/cart2.js"></script>
    <script id="entry-template" type="text/x-handlebars-template">
 {{#each .}}   
 <tr>
                            <td rowspan="2" class="ta-c cb-array">
                                <span class="form-element">
                                    <input type="checkbox" name="cart_no[]" id="checkbox" value="" class="checkbox"
                                        checked="checked" data-pno="{{pno}}" data-price="{{p_price}}" data-totalcnt="{{totalCnt}}" data-amount="{{amount}}">
                                    <label for="checkbox" class="check-s on">선택</label>
                                </span>
                            </td>
                            <td class="gi this-product">
                                <span><a class="viewLink" href="{{pno}}"><img src="{{p_url}}" width="40" alt="디자인교과서 쇼핑몰디자인"
                                            title="디자인교과서 쇼핑몰디자인" class="middle"></a></span>
                                <div>
                                    <div id="coupon_apply_14">
                                        <a href="../#couponApplyLayer" class="btn-open-layer" data-cartsno="14"><img
                                                src="../images/coupon-apply.png" alt="쿠폰적용"></a>
                                    </div>
                                    <a class="viewLink" href="{{pno}}">{{p_name}}</a>

                                </div>
                            </td>
                            <td class="ta-c count this-product">
                                <span class="count">
                                    <input type="text" class="goods-cnt" title="수량" data-price="{{p_price}}" name="amount[]"
                                        value="{{amount}}" data-value="1" data-stock="0">
                                    <span class="count-area">
                                        <a class="upBtn" href="#">
                                            <img src="../images/up-btn.png" alt="">
                                        </a>
                                        <a class="downBtn" href="#">
                                            <img src="../images/downBtn.png" alt="">
                                        </a>
                                    </span>
                                </span>
                            </td>
                            <td class="ta-c this-product">
                                <strong class="price">{{totalCnt}}원</strong>
                            </td>
                            <td rowspan="2" class="benefits">

                            </td>
                            <td rowspan="2" class="ta-c">
                                <strong class="price">{{totalCnt}}원</strong>
                            </td>
                            <td rowspan="4" class="ta-c">
                            {{#if @first}}
                                <span class="c-gray">
                                    기본 - 금액별배송비<br>
                                    0원
                                </span>
                            {{/if}}
                            </td>
                        </tr>
                        <tr class="op">
                            <td colspan="3">
                                <div>
                                </div>
                            </td>
                        </tr>
    {{/each}}
    </script>
    
</body>

</html>