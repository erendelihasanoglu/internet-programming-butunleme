<?php
    $id = $_GET["id"];

    if ($id>0) {
       
        include 'baglan.php';
        $baglan->set_charset("utf8");

        $sorgu = $baglan->query("select * from sepet where id=$id");
        $satir = $sorgu->fetch_object();
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yeni Kayıt - Veritabanı Uygulaması</title>
</head>
<body>
    <div style="text-align:center;">
        <a href="index.html">ANA SAYFA</a> - <a href="liste.php">KAYIT LİSTESİ</a> - <a href="yeni.php">YENİ KAYIT</a>
        <br><hr><br><br>
    </div>
    <form action="ekle.php" method="post" style="text-align:center;">
        <strong>Adı Soyadı:</strong> <input type="text" name="urun_ismi" value="<?php echo $satir->urun_ismi; ?>" size="30">
        <br><br>
        <strong>Adı Soyadı:</strong> <input type="text" name="detay" value="<?php echo $satir->detay; ?>" size="30">
        <br><br>
        <strong>TC Kimlik:</strong> <input type="text" name="fiyat" value="<?php echo $satir->fiyat; ?>" size="30">
        <br><br>
        <strong>Telefon No:</strong> <input type="text" name="img_url" value="<?php echo $satir->img_url; ?>" size="30">
        <br><br>
        <input type="hidden" name="id" value="<?php echo $satir->id; ?>">
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>