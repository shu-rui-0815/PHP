<!DOCTYPE html>
<?php
ob_start();
session_start();
?>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噗哩噗哩影城</title>
    <link rel="stylesheet" href="Home.css">
    <style>
            
        li {
            list-style-type: none;
            display: inline;
        }
        body{
            background-color: #f4f4f4;
        }
        .imgstyle {
            padding: 0;
            width: 1200px; /* 原始寬度 */
            height: auto; 
            overflow: hidden;
            margin: auto;
            position: relative;
        }

        .imgs {
            display: flex;
            transition: transform 0.5s ease;
        }

        .imgs img {
            width: auto; 
            height: auto; /* 保持原始比例 */
            max-width: 100%; 
            max-height: 100%; 
        }

        .nav-button {
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            z-index: 1;
        }
        .nav-button.left {
            left: 10px; /* 調整按鈕在左邊的距離 */
        }

        .nav-button.right {
            right: 10px; /* 調整按鈕在右邊的距離 */
        }
    </style>
</head>

<body>
    <header>
        <div class="title">
            <font face="新細明體" lang="ZH-TW" size="1" color="#000000">
                <center><h1>噗哩噗哩影城</h1></center>
            </font>
        </div>

        <div class="menu">
            <ul class="nav" style="font-size: 0.75cm;">
                <li>
                <a href="book_or_login.php">立即訂票</a>
                </li>
                <li><a href="Movie.php">電影介紹</a></li>
                <li><a href="search.php">場次查詢</a></li>
                <li><a href="connectus.php">聯絡我們</a></li>
                <li><a href="login.php">會員登入</a></li>
            </ul>
        </div>

        <div class="imgstyle">
            <div class="imgs">
                <img src="Movie0.png" class="img" />
                <img src="HQ.jpg" class="img" />
                <img src="garfield.png" class="img" />
                <img src="movie5.png" class="img" />
                <img src="Movie00.png" class="img" />
            </div>
            <div class="nav-button left" onclick="pre()"><</div>
            <div class="nav-button right" onclick="nex()">></div>
        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var cot = 0;
            var imageWidth = 1200; // 單張圖片寬度
            var totalImages = $('.imgs img').length;

            function updateTransform() {
                var offset = -cot * imageWidth;
                $('.imgs').css('transform', 'translateX(' + offset + 'px)');
            }

            function nex() {    //向前
                if (cot < totalImages - 1) {
                    cot++;
                } else {
                    cot = 0;    //回到第一張圖
                }
                updateTransform();
            }

            function pre() {    //向後
                if (cot > 0) {
                    cot--;
                } else {
                    cot = totalImages - 1;  //回到最後一張圖
                }
                updateTransform();
            }

            $('.nav-button.right').click(nex);
            $('.nav-button.left').click(pre);
        });
    </script>
</body>
</html>