<html lang="en">
<?php
ob_start();
session_start();
?>
  <head>
    <meta charset="UTF-8">
    <meta name="robots" content="follow,index">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊系統</title>

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="additional.css">
    <link rel="stylesheet" href="styleLogin.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body style="background-color: #f4f4f4;">
    <div class="content-body">
      <div class="form-wrapper">
        <h1 class="heading text-center">註冊新帳戶</h1>
        <form action="registercheck.php" method="post" >
          <div class="field">
            <input type="email" name="uEmail" class="input" placeholder="請輸入信箱(*@*****)" required />
            <input type="password" name="uPassword" class="input" placeholder="請輸入密碼(需含英數字且不低於8碼)" required />
            <input type="text" name="uName" class="input" placeholder="請輸入使用者名稱" required />
            <input type="tel" name="uPhone" class="input" placeholder="請輸入電話(09********)" required />
          </div>

          <div class="form-action">
            <button type="submit" class="btn primary">繼續</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>