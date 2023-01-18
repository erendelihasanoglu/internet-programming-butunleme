<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
 
<?php
   session_start();
     if(isset($_SESSION["shoppingCart"])){
        $shoppingCart=$_SESSION["shoppingCart"];

        $sepet_miktari=$shoppingCart["summary"]["sepet_miktari"];
        $sepet_parasi=$shoppingCart["summary"]["sepet_parasi"];
        $shopping_products=$shoppingCart["icerik"];
     
     }else{
        $sepet_parasi=0.0;
        $sepet_miktari=0;
     }
     $kur = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
     foreach ($kur -> Currency as $cur) {
      if ($cur["Kod"] == "USD") {
        $usdAlis  = $cur -> ForexBuying;
        $usdSatis = $cur -> ForexSelling;
      }
    
      if ($cur["Kod"] == "EUR") {
        $eurAlis  = $cur -> ForexBuying;
        $eurAlis = $cur -> ForexSelling;
      }
    }
   ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary " data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="anasayfa.php">Ana Sayfa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
      
        <a href="odeme.php">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <span class="badge cart-count"><?php echo $sepet_miktari; ?></span>
        </a>
        
    </div>
  </div>
</nav>
<!----yukarısı header-->
<script src="jquery-3.6.3.min.js"></script>
<script src="bootstrap.js"></script>
<script src="ozellestir.js"></script>
</body>
</html>