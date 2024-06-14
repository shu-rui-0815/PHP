<!DOCTYPE html>
<?php
ob_start();
session_start();
?>
<html>
    <head>
        <meta charset = 'utf8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel = "stylesheet" href = "Book.css">  
        <script>
        function showAlert() {
            alert('完成!');
        }
        </script>
    </head>
    <body>
        <form action="BookTicket.php" method="post">
        <div class="ground"><h1>線上訂票</h1></div>
        <div class="main" >
            <div class="block">
            <div class="Content">                   
                <div class="Title">
                <br/>
                    <div class="AlignRight">
                        <label>訂購人</label><br />
                        <label>性別</label><br />
                        <label>選取電影</label><br />
                        <label>選取地區</label><br />
                        <label>選取日期</label><br />
                        <label>選取時間</label><br />
                        <label>連絡電話</label><br />
                        <label>e-mail</label><br />
                    </div>
                </div>

                <div class="Items">
                <br/><input type="text" name="sName" value="" ><br />

                    <select name="sGender" >
                        <option value="男">男
                        <option value="女">女<br/>
                    </select>

                    <select name="sMovie" >
                        <option value="腦筋急轉彎2">腦筋急轉彎2
                        <option value="加菲貓：農場大冒險" selected>加菲貓：農場大冒險
                        <option value="劇場版 排球少年!! 垃圾場的決戰">劇場版 排球少年!! 垃圾場的決戰
                        <option value="幻幻之交">幻幻之交
                        <option value="貓的報恩">貓的報恩
                        <option value="猩球崛起：王國誕生">猩球崛起：王國誕生
                        <option value="她死了">她死了
                        <option value="特技玩家">特技玩家
                        <option value="特別總集篇 名偵探柯南 vs. 怪盜基德">特別總集篇 名偵探柯南 vs. 怪盜基德
                        <option value="青春18×2 通往有你的旅程">青春18×2 通往有你的旅程
                    </select>

                    <select name="sArea" >
                        <option value="台北">台北
                        <option value="桃園">桃園
                        <option value="新北">新北
                        <option value="台中">台中
                        <option value="台南">台南
                        <option value="高雄">高雄
                        <option value="花蓮">花蓮
                    </select>

                    <select name="sDate" >
                        <option value="6月13號">6月13號
                        <option value="6月14號">6月14號
                        <option value="6月15號">6月15號
                        <option value="6月16號">6月16號
                        <option value="6月17號">6月17號
                        <option value="6月18號">6月18號
                    </select>

                    <select name="sTime" >
                        <option value="AM 10:30">AM 10:30
                        <option value="AM 12:30">AM 12:30
                        <option value="PM 14:30">PM 14:30
                        <option value="PM 16:30">PM 16:30
                    </select>

                    <input type="text" name="sPhone" value="" ><br/>
                    <input type="email" name="sMail" value="" ><br/>
                    <br/>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit">    
                </div>                    
            </div>
            </div>
        </div>           
        </form>
</body>
</html>

<?php
// 連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'backstage');

if (!$link) {
    die("連接失敗: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 獲取表單提交的數據
    $sName=$_POST["sName"];
    $sGender=$_POST["sGender"];
    $sMovie=$_POST["sMovie"];
    $sArea=$_POST["sArea"];
    $sDate=$_POST["sDate"];
    $sTime=$_POST["sTime"];
    $sPhone=$_POST["sPhone"];
    $sMail=$_POST["sMail"];

    // SQL 語法，插入數據到 feedback 表中
    $SQL = "INSERT INTO usermanagement(Name, Gender, Movie, Area,  Date, Time, Phone, email) 
        VALUES('$sName', '$sGender', '$sMovie', '$sArea', '$sDate', '$sTime', '$sPhone', '$sMail')";  

    if (mysqli_query($link, $SQL)) {
        echo "<script>
                alert('訂票成功!!\\n將返回首頁');
                window.location.href = 'index.php'; // 替換成您的原頁面 URL
              </script>";
    } else {
        echo "錯誤: " . $sql . "<br>" . mysqli_error($link);
    }
}

// 關閉資料庫連接
mysqli_close($link);
?>