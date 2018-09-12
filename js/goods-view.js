$(document).ready(function () {
    var $frm = $(".cartFrm");
    var reqURL = "<?=$_SERVER['PHP_SELF']?>";
 
 
    $("#allCheck").click(function (e) {

        if($(this).prop("checked")){
          $(".checkbox").prop("checked", true);
        }else{
            $(".checkbox").prop("checked", false);
        }

    });

    $(".delBtn").click(function (e) { 
        $result = confirm("해당 상품을 삭제 하시겠습니까?");
        if(!$result)return;
        var $checked=$("input[type=checkbox]:checked");
        console.log($checked);
        $frm.attr("action", reqURL);
        $frm.attr("method", "post");
    });

    $(".checkbox").change(function (e) { 
        e.preventDefault();
        var totalcnt = 0;
        var amount = 0;
        var amtObj  = $(".detail > strong")[0];
        var totalObj = $(".detail > strong")[1];
        var $totalPrice = $(".total-price");
        // 일반 선택버튼을 누르면 전체선택 체크박스가 취소됨
        if($(this).is("#allCheck"))return;
        $("#allCheck").prop("checked", false);

        $(".input[type='checkbox']:checked").each(function(){
            if($(this).is("#allCheck"))return true;
            amount += Number($(this).data("amount"));
            totalcnt += Number($(this).data("totalcnt"));
        })

        $(amtObj).text("" + amount);
        $(totalObj).text("" + totalcnt + "원");
        $totalPrice.text("" + totalcnt + "원");
      
    });

    

});