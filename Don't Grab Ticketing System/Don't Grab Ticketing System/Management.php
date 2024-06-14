<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel = "stylesheet" href = "Manage.css">     
    <style>
        .section {
            display: none;
        }
        .active {
            display: block;
        }
    </style>
</head>

<?php
//連接資料庫
$link = @mysqli_connect(  
    'localhost', 
    'root',       
    '',           
    'backstage'     
);        
//SQL語法
$SQL = "SELECT * FROM usermanagement";    //*表示選取所有資料
//送出查詢
$result = mysqli_query($link,$SQL);    //link表示開啟的資料庫連結(school),sql表示SQL指令字串
?>

<body>
    <div class="sidenav">
        <br/>
        <a href="#" onclick="showSection('section1')" >會員名單</a>
        <a href="#" onclick="showSection('section2')" >訂票紀錄</a>
        <a href="#" onclick="showSection('section3')">回饋意見</a>
        <a href="#" onclick="showSection('section4')">票劵分析</a>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        &nbsp&nbsp&nbsp&nbsp<a href="index.php"><font size="4" color="white">登出</font></a>
    </div>
    
    <div class="content">

        <div id="section1" class="section">
            <div class="main">       
            <br/><br/>     
                <?php
                $sql = "SELECT Name,Password,Phone,Email FROM user";
                $result = $link->query($sql);
                while($row = mysqli_fetch_assoc($result)){ 
                    echo '<div class="block2">';
                    echo "使用者名稱：".$row["Name"]."<br/>";
                    echo "密碼：".$row["Password"]."<br/>";
                    echo "電話：".$row["Phone"]."<br/>";
                    echo "信箱：".$row["Email"]."<br/>";
                    echo '</div><br/>';
                }
                ?>            
            </div>  
        </div>


        <div id="section2" class="section">
        <br/><br/>
            <div class="main">            
                <?php
                $sql = "SELECT Name,Gender,Movie,Area,Date,Time,Phone,email FROM usermanagement";
                $result = $link->query($sql);
                while($row = mysqli_fetch_assoc($result)){ 
                    echo '<div class="block">';
                    echo "訂購人：".$row["Name"]."<br/>";
                    echo "性別：".$row["Gender"]."<br/>";
                    echo "選取電影：".$row["Movie"]."<br/>";
                    echo "選取地區：".$row["Area"]."<br/>";
                    echo "選取日期：".$row["Date"]."<br/>";
                    echo "選取時間：".$row["Time"]."<br/>";
                    echo "連絡電話：".$row["Phone"]."<br/>";
                    echo "e-mail：".$row["email"]."<br/>";
                    echo '</div><br/>';
                }
                ?>            
            </div>       
        </div>

        <div id="section3" class="section">
        <br/><br/>
            <div class="main container">            
                <?php
                $sql = "SELECT Reply FROM reply";
                $result = $link->query($sql);
                while($row = mysqli_fetch_assoc($result)){ 
                    echo '<div class="square">';
                    echo $row["Reply"]."<br/>";
                    echo '</div><br/>';
                }
                ?>            
            </div>       
        </div>
        
        <div id="section4" class="section">
        <br/><br/>
            <div class="main"> 
            <?php
                $sql = "SELECT Movie, COUNT(*) as tickets_sold FROM usermanagement GROUP BY Movie";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    // 建立 HTML 表格的頭部
                    echo "<table border='1' style='width: 50%; font-size: 16px;'>";
                    echo "<tr><th style='font-size: 20px;'>Movie</th><th style='font-size: 20px;'>Tickets Sold</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td style='font-size: 16px;'>" . $row['Movie'] . "</td><td style='font-size: 16px;'><center>" . $row['tickets_sold'] . "</center></td></tr>";
                    }        
                    // 關閉表格
                    echo "</table>";    
                }     
            ?>
            <div id="donutchart" style="width: 800px; height: 300px;"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Movie', 'tickets_sold']
                        <?php
                            $result = $link->query($sql);   // 重新執行查詢來填充圖表數據
                            while($row = mysqli_fetch_assoc($result)){
                                $Movie=$row['Movie'];
                                $tickets_sold=$row['tickets_sold'];
                                echo ",['$Movie', $tickets_sold]";
                            }
                        ?>
                    ]);
                    var options = {
                        title: '電影票販售分析',
                        pieHole: 0.4,
                        width: 1000,  
                        height: 800,  
                        chartArea: {left: '10%', top: '10%'},
                        titleTextStyle: {fontSize: 20},
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data, options);
                }
            </script>
            </div>
        </div>
    </div>


    <script>
        function showSection(sectionId) {
            // 隱藏所有版面
            var sections = document.querySelectorAll('.section');   //選擇所有section類別的元素
            sections.forEach(function(section) {
                section.classList.remove('active'); //移除每一個有active類別的元素
            });

            // 顯示指定的版面
            var sectionToShow = document.getElementById(sectionId); //根據傳入的 sectionId 獲取對應的元素
            sectionToShow.classList.add('active');  //顯示出來
        }
    </script>


</body>
</html>
