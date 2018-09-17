$(document).ready(function () {
  

    // 상품별 정렬 기능 호출 - 디폴트값 내림차순 선택되어있으면 오름차순
    $(".order-list a").click(function (e) {
      e.preventDefault();
      // 오름차순이면 내림차순 반대
      var $a = $(this);
      var sort = $(this).data("sort") == "DESC" ? "ASC" : "DESC";
      var order = $(this).attr("href");
      if(order === "p_price")sort = $(this).data("sort");
      var data = {
        'cno': cnoVal,
        'perPageNum': "8",
        'order': order,
        'sort': sort
      };

      $.get("../include/handlers/ajax-handler.php", data,
        function (data, textStatus, jqXHR) {
          var data =JSON.parse(data);
          console.log(data);
          printHtml($('.prod-list'), $("#entry-template"), data);
          $a.data("sort", sort);
          $(".order-list a").removeClass();
          $a.addClass("selected");
        },
        "text"
      );
    
    });

    $(".prod-list").on("click", "a", function (e) {
      e.preventDefault();
      var pno = $(this).attr("href");
      location.href = "goods-view.php?pno="+pno;
    });


    function makeUrl(order, sort) {
      var location = window.location.href;
      var arr = location.split("&");
      arr[2] = "order=" + order;
      arr[3] = "sort=" + sort;
      return arr.join("&");
    }

    function printHtml($target, $template, data) {

      var template = Handlebars.compile($template.html());
      var html = template(data);
      $target.html(html);
    }
  });