<meta charset='utf8'>
<?php

$sName=$_POST["sName"];
$sGender=$_POST["sGender"];
$sMovie=$_POST["sMovie"];
$sArea=$_POST["sArea"];
$sDate=$_POST["sDate"];
$sTime=$_POST["sTime"];
$sPhone=$_POST["sPhone"];
$sMail=$_POST["sMail"];


$link = @mysqli_connect(  //@表示不顯示錯誤訊息
    'localhost',  //MySQL主機名稱 
    'root',       //使用者名稱 
    '',           //密碼
    'backstage'        //預設使用的資料庫名稱
);      

//SQL語法
$SQL = "INSERT INTO usermanagement(Name, Gender, Movie, Area,  Date, Time, Phone, email) 
        VALUES('$sName', '$sGender', '$sMovie', '$sArea', '$sDate', '$sTime', '$sPhone', '$sMail')";  

//送出查詢
if($result = mysqli_query($link, $SQL)){
    echo "訂票成功！<br/>";
    echo "<br/><a href='index.php'>回到首頁</a>";
}


?>