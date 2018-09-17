<?php
include "../include/config.php";
include "../include/classes/Criteria.php";
include "../include/classes/Constants.php";
include "../include/classes/ProductDAO.php";
include "../include/handlers/view-handler.php";
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
    <link rel="stylesheet" href="../css/goods-view.css">

</head>

<body>
    <?php
   include "header.php";
   ?>
    <!-- 헤더끝 -->
    <section class="container">
        <header>
            <span>홈>
                <?=$vo['c_name']?></span>
        </header>
        <article>
            <span class="alert">
                <img src="../images/check-mark.png" alt=""> <span class="msg">카트에 담았습니다. <a class="goCart" href="#"><strong>카트보기&nbsp;&gt;&gt;</strong></a>
                </span>
            </span>
            <div class="left-box">
                <img src="../images/product2.jpg" alt="">
            </div>
            <div class="right-box">
                <h4>
                    <?=$vo['p_name']?>
                </h4>
                <ul class="item">
                    <li>
                        <strong>짧은설명</strong>
                        <div>꽃가게 최적 꽃잎마을</div>
                    </li>
                    <li> <strong>소비자가</strong>
                        <div>
                            <?=number_format($vo['p_price'])?>원</div>
                    </li>
                    <li> <strong>판매가</strong>
                        <div class="price">
                            <?=number_format($vo['p_price'])?>원</div>
                    </li>
                    <li> <strong>배송비</strong>
                        <div>2,500</div>
                    </li>
                    <li> <strong></strong>
                        <div>주문시결제(선결제)</div>
                    </li>
                    <li> <strong>상품코드</strong>
                        <div>10003432423</div>
                    </li>
                </ul>
                <div class="amount-box">
                    <strong>
                        <?=$vo['p_name']?></strong>
                    <span class="count">
                        <input type="text" class="goods-cnt" title="수량" data-key="0" name="goodsCnt[]" value="1"
                            data-value="1" data-stock="0">
                        <span class="count-area">
                            <a class="upBtn" href="#">
                                <img src="../images/up-btn.png" alt="">
                            </a>
                            <a class="downBtn" href="#">
                                <img src="../images/downBtn.png" alt="">
                            </a>
                        </span>
                    </span>
                </div>
                <div class="price-box">

                    <div class="space"></div>
                    <div class="price-right">
                        <div><span>총 상품금액</span><strong class="goods-amount">
                                <?=number_format($vo['p_price'])?>원</strong></div>
                        <div><span id="amount">총 합계금액</span><strong class="total-amount">
                                <?=number_format($vo['p_price'])?>원</strong></div>
                    </div>
                </div>
                <div class="btngroup">
                    <button class="btn btn-danger">구매하기</button>
                    <button class="btn btn-success addCart-btn">장바구니</button>
                    <button class="btn btn-primary">관심상품</button>
                </div>
            </div>

        </article>
        <div class="clear"></div>
        <div class="contents">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary detail">상품상세이미지</button>
                <button type="button" class="btn btn-outline-secondary delivery">상품배송안내</button>
                <button type="button" class="btn btn-outline-secondary exchange">교환반품안내</button>
                <button type="button" class="btn btn-outline-secondary reviews">상품후기</button>
                <button type="button" class="btn btn-outline-secondary qna">상품문의</button>
            </div>
            <div class="guid-msg">
                <img src="../images/detail.gif" alt="">
            </div>
        </div>
        <div id="delivery">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary detail">상품상세이미지</button>
                <button type="button" class="btn btn-outline-secondary delivery">상품배송안내</button>
                <button type="button" class="btn btn-outline-secondary exchange">교환반품안내</button>
                <button type="button" class="btn btn-outline-secondary reviews">상품후기</button>
                <button type="button" class="btn btn-outline-secondary qna">상품문의</button>
            </div>
            <h4>배송안내</h4>
            <div class="admin-msg">
                <p>-
                    배송비&nbsp;:&nbsp;기본배송료는&nbsp;2,500원&nbsp;입니다.&nbsp;(도서,산간,오지&nbsp;일부지역은&nbsp;배송비가&nbsp;추가될&nbsp;수&nbsp;있습니다)&nbsp;&nbsp;50,000원&nbsp;이상&nbsp;구매시&nbsp;무료배송입니다.</p>
                <p>-
                    본&nbsp;상품의&nbsp;평균&nbsp;배송일은&nbsp;0일입니다.(입금&nbsp;확인&nbsp;후)&nbsp;설치&nbsp;상품의&nbsp;경우&nbsp;다소&nbsp;늦어질수&nbsp;있습니다.[배송예정일은&nbsp;주문시점(주문순서)에&nbsp;따른&nbsp;유동성이&nbsp;발생하므로&nbsp;평균&nbsp;배송일과는&nbsp;차이가&nbsp;발생할&nbsp;수&nbsp;있습니다.]</p>
                <p>-
                    본&nbsp;상품의&nbsp;배송&nbsp;가능일은&nbsp;0일&nbsp;입니다.&nbsp;배송&nbsp;가능일이란&nbsp;본&nbsp;상품을&nbsp;주문&nbsp;하신&nbsp;고객님들께&nbsp;상품&nbsp;배송이&nbsp;가능한&nbsp;기간을&nbsp;의미합니다.&nbsp;(단,&nbsp;연휴&nbsp;및&nbsp;공휴일은&nbsp;기간&nbsp;계산시&nbsp;제외하며&nbsp;현금&nbsp;주문일&nbsp;경우&nbsp;입금일&nbsp;기준&nbsp;입니다.)</p>
            </div>
        </div>
        <div id="exchange">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary detail">상품상세이미지</button>
                <button type="button" class="btn btn-outline-secondary delivery">상품배송안내</button>
                <button type="button" class="btn btn-outline-secondary exchange">교환반품안내</button>
                <button type="button" class="btn btn-outline-secondary reviews">상품후기</button>
                <button type="button" class="btn btn-outline-secondary qna">상품문의</button>
            </div>
            <h4>교환 및 반품안내</h4>
            <div class="admin-msg">
                <p>-
                    상품&nbsp;택(tag)제거&nbsp;또는&nbsp;개봉으로&nbsp;상품&nbsp;가치&nbsp;훼손&nbsp;시에는&nbsp;상품수령후&nbsp;7일&nbsp;이내라도&nbsp;교환&nbsp;및&nbsp;반품이&nbsp;불가능합니다.</p>
                <p>-
                    저단가&nbsp;상품,&nbsp;일부&nbsp;특가&nbsp;상품은&nbsp;고객&nbsp;변심에&nbsp;의한&nbsp;교환,&nbsp;반품은&nbsp;고객께서&nbsp;배송비를&nbsp;부담하셔야&nbsp;합니다(제품의&nbsp;하자,배송오류는&nbsp;제외)</p>
                <p>-
                    일부&nbsp;상품은&nbsp;신모델&nbsp;출시,&nbsp;부품가격&nbsp;변동&nbsp;등&nbsp;제조사&nbsp;사정으로&nbsp;가격이&nbsp;변동될&nbsp;수&nbsp;있습니다.</p>
                <p>-
                    신발의&nbsp;경우,&nbsp;실외에서&nbsp;착화하였거나&nbsp;사용흔적이&nbsp;있는&nbsp;경우에는&nbsp;교환/반품&nbsp;기간내라도&nbsp;교환&nbsp;및&nbsp;반품이&nbsp;불가능&nbsp;합니다.</p>
                <p>-
                    수제화&nbsp;중&nbsp;개별&nbsp;주문제작상품(굽높이,발볼,사이즈&nbsp;변경)의&nbsp;경우에는&nbsp;제작완료,&nbsp;인수&nbsp;후에는&nbsp;교환/반품기간내라도&nbsp;교환&nbsp;및&nbsp;반품이&nbsp;불가능&nbsp;합니다.&nbsp;</p>
                <p>-
                    수입,명품&nbsp;제품의&nbsp;경우,&nbsp;제품&nbsp;및&nbsp;본&nbsp;상품의&nbsp;박스&nbsp;훼손,&nbsp;분실&nbsp;등으로&nbsp;인한&nbsp;상품&nbsp;가치&nbsp;훼손&nbsp;시&nbsp;교환&nbsp;및&nbsp;반품이&nbsp;불가능&nbsp;하오니,&nbsp;양해&nbsp;바랍니다.</p>
                <p>-
                    일부&nbsp;특가&nbsp;상품의&nbsp;경우,&nbsp;인수&nbsp;후에는&nbsp;제품&nbsp;하자나&nbsp;오배송의&nbsp;경우를&nbsp;제외한&nbsp;고객님의&nbsp;단순변심에&nbsp;의한&nbsp;교환,&nbsp;반품이&nbsp;불가능할&nbsp;수&nbsp;있사오니,&nbsp;각&nbsp;상품의&nbsp;상품상세정보를&nbsp;꼭&nbsp;참조하십시오.&nbsp;</p>
            </div>
            <h3>환불안내</h3>
            <div class="admin-msg">
                - 상품 청약철회 가능기간은 상품 수령일로 부터 7일 이내 입니다.
            </div>
            <h3>AS안내</h3>
            <div class="admin-msg">
                <p>- 소비자분쟁해결 기준(공정거래위원회 고시)에 따라 피해를 보상받을 수 있습니다.</p>
                <p>- A/S는 판매자에게 문의하시기 바랍니다.</p>
            </div>
        </div>
        <div id="reviews">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary detail">상품상세이미지</button>
                <button type="button" class="btn btn-outline-secondary delivery">상품배송안내</button>
                <button type="button" class="btn btn-outline-secondary exchange">교환반품안내</button>
                <button type="button" class="btn btn-outline-secondary reviews">상품후기</button>
                <button type="button" class="btn btn-outline-secondary qna">상품문의</button>
            </div>
            <div class="top-reviews">
                <h4>상품후기</h4>
                <button class="btn btn-outline-primary">상품후기 글쓰기</button>
                <button class="btn btn-outline-danger">상품후기 전체보기</button>
            </div>
            <table class="table">
                <colgroup>
                    <col width="13%">
                    <col>
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>평점</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>제목</td>
                        <td>안대현</td>
                        <td>2018.08.29</td>
                    </tr>

                </tbody>
            </table>
            <ul class="pagination text-center">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
        <div id="qna">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary detail">상품상세이미지</button>
                <button type="button" class="btn btn-outline-secondary delivery">상품배송안내</button>
                <button type="button" class="btn btn-outline-secondary exchange">교환반품안내</button>
                <button type="button" class="btn btn-outline-secondary reviews">상품후기</button>
                <button type="button" class="btn btn-outline-secondary qna">상품문의</button>
            </div>
            <div class="top-qna">
                <h4>상품Q&A</h4>
                <button class="btn btn-outline-primary">상품문의 글쓰기</button>
                <button class="btn btn-outline-danger">상품문의 전체보기</button>
            </div>
            <table class="table">
                <colgroup>
                    <col width="13%">
                    <col>
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>평점</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>제목</td>
                        <td>안대현</td>
                        <td>2018.08.29</td>
                    </tr>

                </tbody>
            </table>
            <ul class="pagination text-center">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>


    </section>
    <script>
        var price = "<?=$vo['p_price']?>";
        var pno = "<?= $vo['pno'] ?>";
        var vo = '<?= json_encode($vo)?>';
        var isSession = '<?= isset($_SESSION['
        login ']); ?>';
    </script>
    <script src="../js/goods-view.js"></script>