<?php
class Cart
{

    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

 // 장바구니안 아이템 리스트
 public function getCartItemList($mno)
 {
     $sql = "
             SELECT  c.cart_no, p.pno, p.p_url, p.p_name, c.amount, p.p_price, p.p_price * c.amount AS totalcnt   FROM product p, cart c
             WHERE 
                     c.pno = p.pno
             AND
                     c.mno = :mno;";

     $stmt=$this->getPrePare($sql);
     $stmt->bindParam(":mno", $mno, PDO::PARAM_INT);
     $stmt->execute();
    return $stmt->fetchAll();
 }


    public function getCart($mno)
    {
        $sql = "
                SELECT c.*, p.p_name, p.p_price, p.p_url, (p.p_price * c.amount) AS totalCnt FROM cart c, product p, member m
                WHERE c.pno = p.pno
                AND c.mno = m.mno
                AND c.mno = ?
               ";

        $stmt = $this->getPrePare($sql);
        $stmt->execute(array($mno));
        return $stmt->fetchAll();
    }

    // 장바구니 추가
    public function addCart($mno, $pno, $amount)
    {
        // 카트안에 기존물품이 있으면 수량추가 없으면 물품저장
        if(($cart_no=$this->findProduct($mno, $pno))){
            $this->updateCartAmt($cart_no, $amount);
        }else{
            $this->insertCart($mno, $pno, $amount);
        }
    }

    // 장바구니 물품 개수를 증가시킴
    public function updateCartAmt($cart_no, $amount)
    {
        $sql = "UPDATE cart SET amount = amount + ?
                WHERE cart_no = ?";
        $stmt = $this->getPrePare($sql);
        $stmt->execute(array($amount, $cart_no));
    }

    // 장바구니에 물품 담기
    public function insertCart($mno, $pno, $amount)
    {
        $sql = "
                INSERT INTO cart(mno, pno, amount)
                VALUES (?, ?, ?);
                ";
        $stmt=$this->getPrePare($sql);
        $stmt->execute(array($mno, $pno, $amount));
    }

    // 카트에 물품 존재 여부
    public function findProduct($mno, $pno)
    {
        $sql = "SELECT cart_no
                FROM cart
                WHERE mno = ? AND pno = ?;";
        $stmt = $this->getPrePare($sql);
        $stmt->execute(array($mno, $pno));
        return $stmt->fetch()[0];
    }

   

    // 장바구니 아이템 삭제
    public function delCartItem($cart_no)
    {
        $sql = "
                DELETE FROM cart
                WHERE cart_no = ?;
                ";

        $stmt=$this->getPrePare($sql);
        $stmt->execute(array($cart_no));
    }

    // 장바구니 아이템 수정
    public function modCartItem($cart_no, $amount)
    {
        $sql = "
                      UPDATE cart SET amount = :amount
                      WHERE cart_no = :cart_no
        
                ";
        $stmt=$this->getPrePare($sql);
        $stmt->bindValue(":amount", $amount);
        $stmt->bindValue(":cart_no", $cart_no);
        $stmt->execute();
    }






    public function getPrePare($sql): PDOStatement
    {
        return $this->con->prepare($sql);
    }

}
