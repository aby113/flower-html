<?php
class ProductDAO
{

    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getProductList($cno, $perPageNum, $order, $sort)
    {
        $sql = "SELECT p.* FROM product p, category c
                     WHERE p.cno = :cno AND p.cno = c.cno
                    ORDER BY {$order} {$sort}
                    LIMIT :perPageNum";

        $stmt = $this->getPrePare($sql);
        $stmt->bindParam(":cno", $cno, PDO::PARAM_INT);
        $stmt->bindParam(":perPageNum", $perPageNum, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProduct($pno)
    {
        $sql = "
            SELECT p.*, c.c_name FROM product p, category c
            WHERE
	        	
	        	p.cno = c.cno
        	AND
 	        	p.pno = ?
            GROUP by pno";

        $stmt = $this->getPrePare($sql);
        $stmt->execute(array($pno));
        return $stmt->fetch();
    }

    private function getPrePare($sql): PDOStatement
    {
        return $this->con->prepare($sql);
    }

}
