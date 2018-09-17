<?php

var_dump($_POST);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="a" value="1">
    <input type="text" name="b" value="1">
    <input type="text" name="c" value="1">
    <input type="text" name="d" value="1">
    <input type="button" name="modBtn" value="수정">
    <button type="button" name="rmBtn" value="rm">삭제</button>
    <button type="submit">전송</button>
    </form>

<script src="/vendor/jquery/jquery.js"></script>
    <script>
    
    $(document).ready(function () {
        $("input:button[name=modBtn]").click(function (e) { 
            e.preventDefault();
            $("form").submit();
        });

        $("button").click(function (e) { 
            $("form").submit();
        });
    });
    
    
    </script>
</body>

</html>