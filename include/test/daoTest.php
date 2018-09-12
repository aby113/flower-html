<?php
include "Config.php";
include "../classes/ProductDAO.php";
include "../classes/Cart.php";
$con = new PDO(Config::$URL, Config::$USER, Config::$PW);

$dao = new Cart($con);
$result = $dao->findProduct(1, 1);
var_dump($result);
?>