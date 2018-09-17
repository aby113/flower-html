$(document).ready(function () {
  
 
    var amtObj = $(".detail > strong")[0];
    var totalObj = $(".detail > strong")[1];
    var $totalPrice = $(".total-price");
 // 로컬에 담긴 장바구니 아이템 리스트
    var items =  JSON.parse(localStorage.getItem("cart"));
    printHtml($("tbody"), $("#entry-template"), items);
    var cart = getCartInfo();
    changeText(cart.totalAmt, cart.totalCnt);

    $(".orderBtn").click(function (e) {
        e.preventDefault();
        alert("클릭");
    });

    
    // 장바구니 아이템 삭제
    $(".delBtn").click(function (e) {
        
        e.preventDefault();
        $result = confirm("해당 상품을 삭제 하시겠습니까?");
        if (!$result) return;
        var $selectItems = $("input:checkbox:checked");
        var items = JSON.parse(localStorage.getItem("cart"));
        var i = 0;
        // 삭제하기전에 pno 값들을 얻음
        var pnoArr = getPno($selectItems);
        // 값을 얻고 체크된 행을 삭제
        rmElement();
        // 로컬스토리지네 아이템 삭제
        rmItem(items, pnoArr);
        localStorage.setItem("cart", JSON.stringify(items));
        // 체크된 아이템을 모두 삭제해서 종합텍스트를 0으로 셋팅
        changeText(0, 0);
    });
// 체크박스된 아이템 번호를 구해와서 카트내에 아이템과 일치하면 삭제
    function rmItem(items, pnoArr){
        for(const key in items){
            var vo = items[key];
            pnoArr.forEach(function(e){
                console.log(typeof vo['pno']);
                console.log(typeof e);
                if(vo['pno'] == e){
                   
                    items.splice(key, 1);
                }
            });
            
        }
    }

    // 체크된 박스 기준으로 ui 삭제
    function rmElement(){
        $checkboxs = $("input:checkbox:checked").not("#allCheck");
        $tr = $checkboxs.closest("tr");
        $tr2 =$tr.next();
        $tr.add($tr2).remove();
    }

    function getPno($selectItems){
        var array = new Array();
        $selectItems.each(function(){
            array.push($(this).data("pno"));
        });

        return array;
    }


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

    function printHtml($target, $template, data){
        var template = Handlebars.compile($template.html());
        var html = template(data);
        $target.html(html);
    }
});