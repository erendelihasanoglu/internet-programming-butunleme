<?php
    $id = $_GET["id"];

    if ($id>0) {
       
        include 'baglan.php';
        $baglan->set_charset("utf8");

        $sorgu = $baglan->query("select * from kullanicilar where id=$id");
        $satir = $sorgu->fetch_object();
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kullanıcı Düzenleme</title>
</head>
<body>
    <div style="text-align:center;">
        <a href="index.html">ANA SAYFA</a> - <a href="liste.php">KAYIT LİSTESİ</a> - <a href="kullanicilar.php">YENİ KAYIT</a>
        <br><hr><br><br>
    </div>
    <form action="kullaniciekle.php" method="post" style="text-align:center;">
        <strong>Adı Soyadı:</strong> <input type="text" name="urun_ismi" value="<?php echo $satir->kadi; ?>" size="30">
        <br><br>
        <strong>Adı Soyadı:</strong> <input type="text" name="detay" value="<?php echo $satir->parola; ?>" size="30">
        <br><br>
       
        <input type="hidden" name="id" value="<?php echo $satir->id; ?>">
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>