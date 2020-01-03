<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
 
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>メール登録画面</title>
<meta charset="utf-8">
<style>
  body{
    background: #ffe4b5;
    font-family: Meiryo;
  }
  div {
  background: #ffffff;
  width: 400px;
  padding: 10px;
  text-align: center;
  border: 3px solid #8b4513;
  margin: 100px auto;
}
</style>
</head>
<body>
    

  <div>
  
    <h2>新規メール登録</h2>
    <form class="flex-form" action="registration_mail_check.php" method="post">
        <p>メールアドレス：<input type="text" name="mail" size="50"></p>                
        <input type="hidden" name="token" value="<?=$token?>">
        <input type="submit" value="登録">                
    </form>
    <a href="https://ユーザー名.tech-base.net/mission_6_login.php">前ログインしたユーザーはこちらから</a><br>
    
      
        
      
    
  </div>

</body>
</html>