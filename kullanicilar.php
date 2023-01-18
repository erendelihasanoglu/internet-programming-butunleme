<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>kayıt </title>
</head>
<body>
    <div style="text-align:center;">
        <a href="index.html">ANA SAYFA</a> - <a href="liste.php">KAYIT LİSTESİ</a> - <a href="kullanicilar.php">ANA SAYFA</a>
        <br><hr><br><br>
    </div>
    <?php
        include 'baglan.php';
        $baglan->set_charset("utf8");
        
        $sorgu = $baglan->query("select * from kullanicilar");

        echo "<table width='100%' border='1'>
        <tr align='center'>
        <th>kullanici no</th>
        <th>kullanici adi</th>
        <th>Şifresi</th>
       
        </tr>";
        
        while ($satir = $sorgu->fetch_object()) {
            echo "<tr align='center'>
            <td> $satir->id </td>
            <td> $satir->kadi </td>
            <td> $satir->parola </td>
            
            <td> <a href='kullaniciduzenle.php?id=$satir->id'>dz</a> - <a href='kullaniciduzenle.php?id=$satir->id'>sl</a> </td>
            </tr>";
        }

        echo "</table>";

        $toplam = $sorgu->num_rows;

        $sorgu->free_result();

        $baglan->close();

        echo "<br><br>Toplam $toplam Kayıt Bulundu.";
    ?>
</body>
</html>