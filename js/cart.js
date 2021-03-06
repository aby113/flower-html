$(document).ready(function () {

    var amtObj = $(".detail > strong")[0];
    var totalObj = $(".detail > strong")[1];
    var $totalPrice = $(".total-price");
    $(".orderBtn").click(function (e) {
        e.preventDefault();
        alert("클릭");
    });

    
    // 장바구니 아이템 삭제
    $(".delBtn").click(function (e) {
        e.preventDefault();
        $result = confirm("해당 상품을 삭제 하시겠습니까?");
        if (!$result) return;
        createHidden($frm, "delBtn");
        $("input:checkbox:not(:checked, #allCheck)").removeAttr("name");
        $frm.attr("action", reqURL);
        $frm.attr("method", "post");
        $frm.submit();
    });

    function createHidden($target, name) {
        $("<input type='hidden' value='true'>").attr("name", name).appendTo($target);
    }

    // 체크박스 클릭이벤트
    $("table").on("click", "input[type=checkbox]", function (e) {
        // 일반 선택버튼을 누르면 전체선택 체크박스가 취소됨
        if ($(this).is("#allCheck")) {
            // 전체 선택 클릭이벤트
            allCheckBoxEvent($(this));
        } else { // 일반 체크박스 선택 클릭이벤트
            $("#allCheck").prop("checked", false);
        }
        // 공통부분 각 텍스트부분 제어할수있는 객체를 가져와서 체크된 체크박스의 값들을 계산한다음 셋팅
        var cartInfo = getCartInfo();
        changeText(cartInfo['totalAmt'], cartInfo['totalCnt']);
    });

    // 수량증가 링크
    $("tbody").on("click", ".upBtn", function (e) {
        e.preventDefault();
        var $goodsCnt = $(this).closest("span.count").find(".goods-cnt");
        var amount = $goodsCnt.val();
        $goodsCnt.val(++amount);
        $goodsCnt.trigger("change");
    });

    // 수량 감소 링크
    $("tbody").on("click", ".downBtn", function (e) {
        e.preventDefault();
        var $goodsCnt = $(this).closest("span.count").find(".goods-cnt");
        var amount = $goodsCnt.val();
        $goodsCnt.val(--amount);
        $goodsCnt.trigger("change");
        console.log("다운");
    });

    // 수량감소 링크

    // 입력 텍스트값이 변경할때 일어나는 이벤트
    $("tbody").on("change", ".goods-cnt", function (e) {
        e.preventDefault();
        var amount = validAmt($(this).val());
        $(this).val(amount);
        var cartInfo = getCartInfo();
        changeText(cartInfo['totalAmt'], cartInfo['totalCnt']);
    });

    $("table").on("click", ".viewLink", function(e){
        e.preventDefault();
        var pno = $(this).attr("href");
        location.href = "goods-view.php?pno="+pno;

    });


    function allCheckBoxEvent($target) {
        if ($target.prop("checked")) {
            $(".checkbox").prop("checked", true);
        } else {
            $(".checkbox").prop("checked", false);
        }
    }

    function validAmt(amount) {
        if (amount < 1) amount = 1;
        if (amount > 999) amount = 999;
        return amount;
    }

    function calc(amount, price) {
        amount = validAmt(amount);
        return price * amount;
    }

    // 장바구니안  체크된 상품의 총합계와 수량 정보
    // 체크된 상품정보를 계산해서 총합계와 수량을 계산
    function getCartInfo(){
        var cartInfo = {"totalCnt":0, "totalAmt":0};
        
        $("input[type='checkbox']:checked").each(function () {
            if ($(this).is("#allCheck")) return true;
            var $goodsCnt = $(this).closest("tr").find(".goods-cnt");
            var amount = Number($goodsCnt.val());
            var price = Number($goodsCnt.data("price"));
            cartInfo['totalCnt'] += calc(amount, price);
            cartInfo['totalAmt'] += amount;
        });

        return cartInfo;
    }

    // 총갯수, 총합 관련 텍스트 변경
    function changeText(amount, totalcnt){
        $(amtObj).text("" + amount);
        $(totalObj).text("" + totalcnt + "원");
        $totalPrice.html("<img src='../images/total.png' alt=''>&nbsp;" + totalcnt + "원");

    }
});