<?php
require 'baglan.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">

   
 
</head>
<body>
    <form action="islem.php" method="post">
        <h3>Kullanıcı Adı</h3>
    <input type="text" name="username"><br>
    <h3>Şifre</h3>
    <input type="password" name="password"><br>
    <button href="giris.php" name="giris">Giriş Yap</button>
    </form>
      <a href="index.php"><button>Kayıt Ol</button></a>
</body>
</html>