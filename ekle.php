<?php
    require "baglan.php";

    $id = $_POST["id"];

    if ($id>0) {
        $urun_ismi = $_POST["urun_ismi"];
        $detay = $_POST["detay"];
        $fiyat = $_POST["fiyat"];
        $img_url = $_POST["img_url"];

        $sorgu = $baglan->query("update sepet set urun_ismi='$urun_ismi',detay='$detay',fiyat='$fiyat',img_url='$img_url' where id=$id");

        $toplam = $baglan->affected_rows;

        if ($toplam>0) {
            header("Location:liste.php");
        } else {
            echo "Düzenleme Yapılamadı.";
        }
    } else {
        $sorgu = $baglan->prepare("insert into sepet (urun_ismi,detay,fiyat,img_url) values (?,?,?,?)");
        $sorgu->bind_param("sss",$urun_ismi,$detay,$fiyat,$img_url);

        $urun_ismi = $_POST["urun_ismi"];
        $detay = $_POST["detay"];
        $fiyat = $_POST["fiyat"];
        $img_url = $_POST["img_url"];

        $sorgu->execute();

        $toplam = $baglan->affected_rows;

        $sorgu->close();

        $baglan->close();

        if ($toplam > 0) {
            header("Location:yeni.php");
        } else {
            echo "Kayıt Eklenemedi.";
        }
    }
?>