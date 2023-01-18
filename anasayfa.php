
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php require_once"baglan.php";  ?>
<?php
$icerikler=$db->query("SELECT * FROM sepet",PDO::FETCH_OBJ)->fetchAll();


?>
<?php 
include "sepetekrani.php";
?>
    <!--------yukarısı header---------->
    <!--------asagısı icerik**--------->
   
   <div class="container">
    <div class="col-6 col-md-3">
    <div class="row">
    <?php
    foreach($icerikler as $icerikle){ ?>
        <div class="card">
            <img src="resimler/sutlufinger.png" alt="cikolata">
            <div class="caption">
                <h3> <?php echo $icerikle->urun_ismi; ?> </h3>
                <p> <?php echo $icerikle->detay; ?></p>
                <p class="text-right price-container"><strong><?php echo $icerikle->fiyat; ?></strong></p>
                <p>
                    <button class="btn btn-primary btn-block icerikgonder" product-id="<?php echo $icerikle->id; ?>" role="button">
                        <span> Sepete Ekle</span>
                    </button>

               
                   
                  
                </p>
            </div>
        </div>
        </div>
      
 
       
    <?php }?>
    </div>
   
   </div>
   <div style="width:15%">
	<h3>Döviz Kuru</h3>
	<hr>
	<b>USD Alış: </b> <?php echo $usdAlis; ?> <br>
	<b>USD Satış: </b> <?php echo $usdSatis; ?>
	<hr>
	<b>EURO Alış: </b> <?php echo $eurAlis; ?> <br>
	<b>EURO Satış: </b> <?php echo $eurAlis; ?>
</div>
    <!----------yukarısı icerik------->
<script src="jquery-3.6.3.min.js"></script>
<script src="bootstrap.js"></script>
<script src="ozellestir.js"></script>
</body>
</html>