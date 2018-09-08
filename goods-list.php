<?php
 include "include/config.php";
 include "include/classes/Criteria.php";
 include "include/classes/Constants.php";
 include "include/classes/ProductDAO.php";
 include "include/handlers/goods-handler.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image⁄x-icon" href="images/title-logo.png">

    <title>꽃잎마을</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-frontpage.css" rel="stylesheet">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/goods-list.css">

</head>
<body>
      <?php
      include "header.php";
     
      ?>
              <section class="container">
                <div class="section-header">
                    <span>홈 > 꽃바구니</span>
                   
                </div>
                <article>
                    <h2><strong>  축하화환</strong></h2>
                    <span>상품 <strong>  10</strong>개</span>
                    <hr class="line">
                    <div>
                        <ul class="order-list">
                            <li><img src="images/check.png" alt=""> <a class="" href="#">추천순</a></li>
                            <li><a class="<?=isSelected("");?>"  href="#">판매순</a></li>
                            <li><a class="low_price <?=isSelected("");?>"  href="#">낮은가격순</a></li>
                            <li><a class="high_price <?=isSelected("");?>"  href="#">높은가격순</a></li>
                            <li><a class="<?=isSelected("");?>"  href="#">상품평순</a></li>
                            <li><a class="<?=isSelected(Constants::$REGISTRATION_DATE);?>" 
                                 href="pno">등록일순</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
   <hr>
                    <!-- 상품리스트 -->
   <div class="row text-center">
       
<?php
foreach ($list as $vo) {
    ?>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?=$vo['f_url']?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"><?=$vo['p_name']?></a>
              </h4>
              <!-- 상품 가격 -->
              <p class="card-text">
                <?=number_format($vo['p_price'])?>원
              </p>
            </div>
          </div>
        </div>
        <!-- 상품아이템끝 -->
<?php
}
?>
        </div>
      </div>
<!-- 상품리스트끝 -->


                </article>
              </section>

<script>
$(document).ready(function () {
  
  // 상품별 정렬 기능 호출 - 디폴트값 내림차순 선택되어있으면 오름차순
  $(".order-list a").click(function (e) { 
    e.preventDefault();
    var sort = "DESC";
    if($(this).hasClass('selected'))sort = "ASC";
    var order = $(this).attr("href");
    location.href = makeUrl(order, sort);
    
  });


  function makeUrl(order, sort){
    var location = window.location.href;
    var arr = location.split("&");
    arr[2] = "order="+order;
    arr[3] = "sort="+sort;
    return arr.join("&");
  }

});

</script>

</body>
</html>