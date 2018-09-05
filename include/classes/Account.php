<?php

class Account{

    private $con;

    public function __construct($con){
        $this->con = $con;
    }    

    public function register($memArr){
        
        $sql = "
        INSERT INTO member
        (pw, 
        name, 
        email, 
        ph, 
        hp, 
        address, 
        id, 
        regdate, 
        post_cd, 
        addr_sub)
         VALUES
         (
            ?,
            ?,
            ?,
           ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )";
        $stmt = $this->getPrePare($sql);
        $stmt->execute($memArr);
    }

    // 계정이 존재하는지 알려주는 함수
    public function isAccount($id):bool{
       $sql = "SELECT mno FROM member WHERE id=?";
       $stmt = $this->getPrePare($sql);
       $stmt->execute(array($id));
       return $stmt->fetch()? true:false;
    }

    // 이메일이 존재여부 리턴
    public function isEmail($email):bool{
        $sql = "SELECT mno FROM member WHERE email=?";
        $stmt = $this->getPrePare($sql);
        $stmt->execute(array($email));
        return $stmt->fetch()? true:false;
    }

    private function getPrePare($sql):PDOStatement
    {
        return $this->con->prepare($sql);
    }

}
?>