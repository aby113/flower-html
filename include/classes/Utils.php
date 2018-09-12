<?php
class Utils{



    public static function redirect($url) {
        header("Location:{$url}");
        exit;
      }
    
    
    public static function sanitizeInp($inpVal)
    {
        $inpVal = strip_tags($inpVal);
        $inpVal = str_replace(" ", "", $inpVal);
        return $inpVal;
    }

    // param값 isset으로 검증하고 만약 파라미터가 없으면 디폴트 값으로 리턴
    public static function getParam($name){
        $result = "";
        if(isset($_GET[$name])){
            return $_GET[$name];
        }else{
            switch($name){
                case "sort": $result = "DESC"; break;
                case "order": $result = "pno"; break;
                case "perPageNum":$result = "8"; break;
            }
        }

        return $result;
    }

    public static function rememberInpVal($name){

        if(isset($_POST[$name])){
            return $_POST[$name];
        }
    }
    
}



?>