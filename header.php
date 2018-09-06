<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
    <header>

        <!-- Navigation -->
        <nav class="head-wrap">
            <div class="top-link-wrap">
                <ul class="top-link">
                    <li><a href="">고객센터</a></li>
                    <li><a href="cart.html">장바구니</a></li>
                    <li><a href="">마이페이지</a></li>
                    <li><a href="joi    n-agreement.php">회원가입</a></li>
                    <li>
<?php
if(empty($_SESSION["login"])){
    echo "<a href='login.php'>로그인</a>";
}else{
    echo "<a class='logout' href='#'>로그아웃</a>";
}
?>
                    </li>
                </ul>
            </div>
            <div class="container text-center">
                <h1>
                   <a href="/">
                             <img src="images/logo.png" alt="">
                    </a>
                </h1>

            </div>
            <div class="top-service">
                <div class="container">
                    <ul>
                        <li><a href="goods-list.html">꽃바구니</a></li>
                        <li><a href="goods-list.html">근조화환</a></li>
                        <li><a href="goods-list.html">관엽/화분</a></li>
                        <li><a href="goods-list.html">동양란</a></li>
                        <li><a href="goods-list.html">축하화환</a></li>
                        <li><a href="goods-list.html">서양란</a></li>
                        <li><a href="goods-list.html">꽃다발/꽃상자</a></li>
                        <li><a href="goods-list.html">공기정화식물</a></li>
                        <li><a href="goods-list.html">분재</a></li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <!-- 헤더끝 -->
    <script>
    $(document).ready(function () {
        $(".logout").click(function (e) { 
            e.preventDefault();
            var result = confirm("로그아웃 하시겠습니까?");
            if(!result)return;
            $.ajax({
                type: "post",
                url: "login.php",
                data: {logout:"true"},
                dataType: "text",
                success: function (response) {
                    location.reload();
                }
            });
        });



    });
    
    
    
    </script>