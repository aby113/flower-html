<?php

require "../config.php";
require "../classes/Account.php";

$account = new Account($con);
if(isset($_POST["joinBtn"])){

}

if(isset($_GET["vaild"])){

    $mod = $_GET["vaild"];
    if($mod === "id"){
        vaildId();
    }else if($mod === "email"){
        vaildEmail();
    }
}

function vaildId(){
    global $account;
    $result = $account->isAccount($_POST["id"]);
    echo $result?'1':'0';
}

function vaildEmail(){
    global $account;
    $result = $account->isEmail($_POST["email"]);
    echo $result?'1':'0';
}




?>