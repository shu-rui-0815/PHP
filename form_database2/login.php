<?php
    include("setting.inc")
?>

<html>
<head>
    <meta charset="utf-8"> 
</head>
<body>
    <?php
    if($_SESSION["check"]=="Yes"){
        if(isset($_COOKIE["userName"])){
            echo $_COOKIE["userName"]."歡迎回來!!<br/>";
        }else{
        echo "初次見面!你好哇!!<br/>";
        }
    }
    echo "歡迎進入高雄大學資管系系網<br/>";

    //echo "登入後即可填答資管晚夜報名表歐~";
    ?>
    <br/>
    <form action="check.php" method="GET">
        您的身分：
        <select name="role">
                <option value="student">學生</option>
                <option value="manager">管理員</option>
        </select>
        <br/>
        帳號：<input type="text" name="uName"><br/>
        密碼：<input type="password" name="uPSW"><br/>
        <br/>
        <input type="submit" value="送出">
    </form>
</body>

<?php
    include("footer.inc")
?>

</html>