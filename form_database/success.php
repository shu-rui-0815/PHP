<?php
    include("setting.inc")
?>

<html>

<?php
    if(isset($_SESSION["check"])){
        if($_SESSION["check"]=="Yes"){
            header("Refresh:3;url=party_form.php");
        }else{
            echo "非法進入網頁";
            echo "三秒後請重新輸入";
            header("Refresh:3;url=login.php");
        }
    }else{
        echo "非法進入網頁";
        echo "三秒後請重新輸入";
        header("Refresh:3;url=login.php");
    }
    
?>
</html>