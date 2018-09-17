$(document).ready(function () {

    // 상품 수량 텍스트
    var $goodsInp = $(".goods-cnt");
    var $goodsAmt = $(".goods-amount");
    var $totalAmt = $(".total-amount");

    // 입력값 검증후 -> 계산 -> 텍스트 변경처리
    $(".upBtn").click(function (e) {
        e.preventDefault();
        var amount = $goodsInp.val();
        $goodsInp.val(++amount);
        $goodsInp.trigger("change");

    });

    $(".downBtn").click(function (e) {
        e.preventDefault();
        var amount = $goodsInp.val();
        $goodsInp.val(--amount);
        $goodsInp.trigger("change");
    });

    // 입력 텍스트값이 변경할때 일어나는 이벤트
    $goodsInp.change(function (e) {
        e.preventDefault();
        var amt = $goodsInp.val();
        var totalCnt = 0;
        amt = validAmt(amt);
        totalCnt = calc(amt);
        changeText(amt, totalCnt);
    });

    // 장바구니 상품 추가 
    $(".addCart-btn").click(function (e) {
        e.preventDefault();
        var amount = $(".goods-cnt").val();
        var data = JSON.parse(vo);
        data.amount = amount;
        data.totalCnt = data.amount * data.p_price;
        addCartAjax(data);
    });

    // 버튼 클릭시 스크롤이동
    $(".detail").click(function(){
        var offset = $(".contents").offset();
        $('html, body').scrollTop(offset.top);
    });

    $(".delivery").click(function (e) { 
        e.preventDefault();
        var offset = $("#delivery").offset();
        $('html, body').scrollTop(offset.top);
    });

    $(".exchange").click(function (e) { 
        e.preventDefault();
        var offset = $("#exchange").offset();
        $('html, body').scrollTop(offset.top);
    });
    $(".reviews").click(function (e) { 
        e.preventDefault();
        var offset = $("#reviews").offset();
        $('html, body').scrollTop(offset.top);
    });
    $(".qna").click(function (e) { 
        e.preventDefault();
        var offset = $("#qna").offset();
        $('html, body').scrollTop(offset.top);
    });


    // 장바구니 이동
    $(".goCart").click(function (e) {
        e.preventDefault();
        if(isSession){ // 로그인 일경우
            location.href="cart.php";
        }else{ // 비회원일 경우
            location.href = "cart2.php";
        }
    });

    // 메세지가 나타나고 3초뒤에 사라짐
    function fadeEvent($target) {
        $target.fadeIn("fast");
        setTimeout(function () {
            $target.fadeOut("slow");
        }, 3000);
    }

    function validAmt(amount) {
        if (amount < 1) amount = 1;
        if (amount > 999) amount = 999;
        return amount;
    }

    function calc(amount) {
        if (amount < 1) amount = 1;
        if (amount > 999) amount = 999;
        return price * amount;
    }

    function addCartAjax(data){
        $.ajax({
            type: "post",
            url: "../include/handlers/ajax-handler.php",
            data: JSON.stringify({
                data: data,
                addCart: true
            }),
            dataType: "text",
            success: function (resp) {
                console.log(resp);
                if(resp == "1"){ // 회원 1 비회원 0
                    fadeEvent($(".alert"));
                }else{
                    fadeEvent($(".alert"));
                    var cart = localStorage.getItem("cart");
                    if(cart === null){ // 상품이 없을경우
                        localStorage.setItem("cart", JSON.stringify(new Array(data)));
                    }else{ // 상품이 있는경우
                        console.log("상품 없음");
                        var cart = JSON.parse(cart);
                       for (const key in cart) {
                           var vo = cart[key];
                           if(vo['pno'] === data['pno']){ // 기존상품을 추가했을경우 수량 수정
                                vo['amount'] = Number(vo['amount']) + Number(data['amount']);
                                localStorage.setItem("cart", JSON.stringify(cart));
                                return;
                            }  
                        }
                        // 새로운 상품을 추가했을경우 배열 추가하고 로컬스토리지에 저장
                        cart.push(data);
                       localStorage.setItem("cart", JSON.stringify(cart));
                    }
                }
            }

        });
    }


    function changeText(amount, totalVal) {
        $goodsInp.val(amount);
        $totalAmt.text(totalVal + "원");
        $goodsAmt.text(totalVal + "원");
    }



});