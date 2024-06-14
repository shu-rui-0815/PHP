<?php
ob_start();
session_start();
?>
<meta charset='utf8'>
<?php
    $sComment=$_POST["sComment"];
    $link = @mysqli_connect(  //@表示不顯示錯誤訊息
        'localhost',  //MySQL主機名稱 
        'root',       //使用者名稱 
        '',           //密碼
        'backstage'        //預設使用的資料庫名稱
    );  
    $SQL = "INSERT INTO reply(Reply) VALUES('$sComment')";
    if($result = mysqli_query($link, $SQL)){
        
        echo "我們已收到您的回饋!謝謝您的支持~<br/>";
        echo "<br/><a href='index.php'>回到首頁</a>";
    }  
