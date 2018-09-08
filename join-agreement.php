<?php
include "include/handlers/agree-handler.php";
$agr_use = $result['0']['agr_cont'];
$privacy = $result['1']['agr_cont'];

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image⁄x-icon" href="images/title-logo.png">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <title>꽃잎마을</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/join-agreement.css">
    <style>
   
    
    </style>
</head>

<body>
    <header>

        <!-- Navigation -->
        <nav class="head-wrap">
            <div class="top-link-wrap">
                <ul class="top-link">
                    <li><a href="">로그인</a></li>
                    <li><a href="">회원가입</a></li>
                    <li><a href="">마이페이지</a></li>
                    <li><a href="">장바구니</a></li>
                    <li><a href="">고객센터</a></li>
                </ul>
            </div>
            <div class="container text-center">
                <h1>
                    <img src="images/logo.png" alt="">
                </h1>

            </div>
            <div class="top-service">
                <div class="container">
                    <ul>
                        <li><a href="#">꽃바구니</a></li>
                        <li><a href="#">근조화환</a></li>
                        <li><a href="#">관엽/화분</a></li>
                        <li><a href="#">동양란</a></li>
                        <li><a href="#">축하화환</a></li>
                        <li><a href="#">서양란</a></li>
                        <li><a href="#">꽃다발/꽃상자</a></li>
                        <li><a href="#">공기정화식물</a></li>
                        <li><a href="#">분재</a></li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <!-- 헤더끝 -->
    <section class="container">
        <header>
            <span>홈&gt;</span>
            <span>회원가입&gt;</span>
            <span>약관동의</span>
        </header>
        <article>
            <header>
                <h2>회원가입</h2>
                <div class="top">
                    <span class="this"><strong>01</strong>약관동의</span>
                    <span><strong>02</strong>정보입력</span>
                    <span><strong>03</strong>가입완료</span>
                </div>
            </header>
            <hr>
            <div class="content">

                <div class="body">
                    <h3>약관동의</h3>
                    <p>
                        <input type="checkbox" name="" id="allAgree">
                        <label for="allAgree">꽃잎마을의 모든 약관을 확인하고 전체 동의합니다.</label>
                    </p>
                    <div class="terms-view">
                        <p>
                            <input type="checkbox" class="terms" name="" id="terms-use">
                            <label for="terms-use"><span><strong>(필수)</strong></span>&nbsp;이용약관</label>
                            <a href="#">전체보기</a>
                        </p>
                        <!-- 표준약관 -->
                        <div class="terms-use">
                           <?=$agr_use?>
                        </div>
                    </div>
                    <!-- end terms-view -->
                    <div class="terms-view">
                        <p>
                            <input type="checkbox" class="terms" name="" id="terms-privacy">
                            <label for="terms-privacy">
                                <span><strong>(필수)</strong></span>
                                개인정보 수집및이용
                            </label>
                            <a href="#">전체보기</a>
                        </p>
                        <div class="privacy">
                        <?=$privacy?>
                        </div>
                    </div>
                    <!-- end terms-view -->
                    <div class="btn-box text-center">
                        <button type="button" class="btn btn-danger nextBtn">다음단계</button>

                    </div>
                </div>
                <!-- end .body -->
            </div>
            <!-- end .content -->



        </article>
    </section>



    <script>
  $(document).ready(function () {
      
      $("#allAgree").change(function(){

        var result = $("#allAgree").is(":checked");
        if(result){
            $("input[type=checkbox]").prop("checked", true);
        }else{
            $("input[type=checkbox]").prop("checked", false);
        }

      });

      $(".nextBtn").click(function(){
        
           if(vaildCheck($(".terms"))){
                location.href = "join.php";
                return;
           }

           alert("필수 이용약관을 체크해주세요.");
      });

// true면 통과
      function vaildCheck($target){
          var result = true;
          $target.each(function(i, e){

              if(!$(this).prop("checked"))result = false;
          });

          return result;
      }


  });  
    
    
    
    </script>
</body>

</html>