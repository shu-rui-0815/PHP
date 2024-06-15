<meta charset='utf8'>

<?php
//連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'party_form'); 

if (!$link) {
    die("無法開啟資料庫<br>");
} else {
    echo "資料庫開啟成功!<br>";
}

//SQL指令
$SQL = "SELECT * FROM user";

//資料表查詢
$result = mysqli_query($link, $SQL);

echo "<br/>";
//結果轉陣列轉表格
echo "<table border='1'>";
while($row = mysqli_fetch_assoc($result)){  
    echo "<tr>";
        echo "<td>".$row["No"]."</td>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["Password"]."</td>";
        echo "<td>".$row["Role"]."</td>";
        echo "<td><a href='del.php?No=".$row["No"]."'>刪除</a></td>";
        //參數前面要加?
    echo "</tr>";
}
echo "</table>";

//釋放結果物件佔用的記憶體空間
mysqli_free_result($result);
echo "</table>";
echo "<br/>";
echo "<a href='login.php'>回到首頁</a><br>";

//關閉資料庫連接、釋放資料庫連接佔用的記憶體空間
mysqli_close($link);
?>