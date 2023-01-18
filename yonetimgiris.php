<?php
require 'baglan.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">

   
 
</head>
<body>
    <h1> yönetici giriş paneli</h1>
    <form action="islem.php" method="post">
        <h3>Kullanıcı Adı</h3>
    <input type="text" name="username"><br>
    <h3>Şifre</h3>
    <input type="password" name="password"><br>
    <button href="liste.php" name="giris">Giriş Yap</button>
    </form>
      
</body>
</html>