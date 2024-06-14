<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="robots" content="follow,index">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聯絡我們</title>

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="additional.css">
    <link rel="stylesheet" href="stylelogin.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    >
    <script>
        function showAlert() {
            alert('完成!');
        }
    </script>
  </head>
  <body>
  <div style="text-aline:center;font: size 13px;width: 100%;height: 90px;background-color:#b6b6b6">
  <hr color = "#f4f4f4" width = "80%" size = "10px">
  <h1 class="heading text-center"><font size = "7">聯絡我們</font></h1>
  <br>
  <br>
  <div class="body">
    <center>
    <hr color = "white" width = "100%" size = "20px"><br>
    <hr color = "white" width = "100%" size = "20px"><br>
    <a><b><font face = "微軟正黑體"><font size = "5"><font color = #000>聯絡我們</b></a><br>
    <a><font face = "微軟正黑體"><font size = "4"><font color = #000>我們是來自高雄大學的一群學生</a><br>
    <a><font face = "微軟正黑體"><font size = "4"><font color = #000>如果想要聯絡我們就來高大找我們吧</a><br>
    <a><font face = "微軟正黑體"><font size = "4"><font color = #000>哈哈&nbsp開玩笑的</a><br>
    <a><font face = "微軟正黑體"><font size = "4"><font color = #000>聯絡專線：0909123456</a><br>
    <a><font face = "微軟正黑體"><font size = "4"><font color = #000>歡迎給我們珍貴的回饋</a><br>
    <br>
    <br>
    <form action="connectus.php" method="post">
    <a><font face = "微軟正黑體"><font size = "4"><font color = "black">回饋表格</a><br><br/>
    <center><textarea name="sComment" rows="6" cols="40"> </textarea></center><br/>
    <input type = "submit" class="btn secondary">
    </center>
  </body>
  </body>
  <?php
// 連接資料庫
$link = @mysqli_connect('localhost', 'root', '', 'backstage');

if (!$link) {
    die("連接失敗: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 獲取表單提交的數據
    $sComment = $_POST['sComment'];

    // SQL 語法，插入數據到 feedback 表中
    $sql = "INSERT INTO reply (Reply) VALUES ('$sComment')";
    $sComment = mysqli_real_escape_string($link, $sComment);

    if (mysqli_query($link, $sql)) {
        echo "<script>
                alert('謝謝您的回饋!我們會繼續努力的!!\\n將返回首頁');
                window.location.href = 'index.php'; // 替換成您的原頁面 URL
              </script>";
    } else {
        echo "錯誤: " . $sql . "<br>" . mysqli_error($link);
    }
}

// 關閉資料庫連接
mysqli_close($link);
?>