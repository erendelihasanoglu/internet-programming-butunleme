<?php

require 'baglan.php';
if(isset($_POST['kayit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password_again= $_POST['password_again'];
    
    if(!$username){
    echo "Lütfen Kullanıcı Adını girin";
    header('Refresh:1; index.php');
    }elseif(!$password || !$password_again){
        echo"Lütfen Şifreni gir";
        header('Refresh:1; index.php');
    }elseif($password != $password_again){
        echo "Girdiğiniz Şifreler uyuşmuyor";
        header('Refresh:1; index.php');
    }
    else{
        $sorgu = $db->prepare('INSERT INTO kullanicilar SET kadi = ?, parola = ?');
        $ekle = $sorgu->execute([$username,$password]);
        if($ekle){
            echo"Kayıt Başarıyla Gerçekleşti";
            header('Refresh:2; giris.php');
        }else{
            echo"bir hata oluştu tekrar kontrol edin";
        }
    }
}
ob_start();
session_start();
if(isset($_POST['giris']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(!$username){
        echo "kullanıcı adını girin";
    }elseif(!$password){
        echo"Şifrenizi Girin";
    }else{
        $kullanici_sor=$db->prepare('SELECT * FROM admin where adminkadi = ? || adminparola = ?');
        $kullanici_sor->execute([
            $username,$password
        ]);
        echo $say=$kullanici_sor->rowCount();
        if($say==1)
        {
            $_SESSION['username']=$username;
            echo"başarıyla giriş yaptınız";
            header('Refresh:2; liste.php');
        }
        else{
            echo"bir hata oluştu kontrol edin";
        }
    }
}
if(isset($_POST['giris']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(!$username){
        echo "kullanıcı adını girin";
    }elseif(!$password){
        echo"Şifrenizi Girin";
    }else{
        $kullanici_sor=$db->prepare('SELECT * FROM kullanicilar where kadi = ? || parola = ?');
        $kullanici_sor->execute([
            $username,$password
        ]);
        echo $say=$kullanici_sor->rowCount();
        if($say==1)
        {
            $_SESSION['username']=$username;
            echo"başarıyla giriş yaptınız";
            header('Refresh:2; anasayfa.php');
        }
        else{
            echo"bir hata oluştu kontrol edin";
        }
    }
}
if(isset($_POST['ekle']))
{
    $urun_ismi=$_POST['urun_ismi'];
    $detay=$_POST['detay'];
    $fiyat= $_POST['fiyat'];
    $img_url['img_url'];

    $hedef_dizin = "resimler";
    $hedef_dosya = $target_dir . basename($_FILES["resim"]["name"]);
    
    $sorgu = $db->prepare('INSERT INTO sepet SET urun_ismi = ?, detay = ?, fiyat = ?, img_url = ?');
    $durum = $sorgu->execute([$urun_ismi,$detay,$fiyat,$img_url]);
    if (move_uploaded_file($_FILES["img_url"]["tmp_name"], $hedef_dosya)) {
        echo "Dosya başarıyla yüklendi.";
      } else {
        echo "Dosya yükleme başarısız.";
      }
    if($durum){
        echo"Kayıt Başarıyla Gerçekleşti";
        header('Refresh:2; giris.php');
    }else{
        echo"bir hata oluştu tekrar kontrol edin";
    }
}
?>