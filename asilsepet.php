<?php
include 'baglan.php';
session_start();
function urunekle($icerik_gonder){
    if(isset($_SESSION["shoppingCart"])){
        $shoppingCart=$_SESSION["shoppingCart"];
        $icerik=$shoppingCart["icerik"];
    }
    else{
         $icerik=array();
    }

    if(array_key_exists($icerik_gonder->id,$icerik)){
        $icerik[$icerik_gonder->id]->count++;
    }
    else{
        $icerik[$icerik_gonder->id]=$icerik_gonder;
    }

    $sepet_parasi=0.0;
       $sepet_miktari=0;

    foreach($icerik as $iceri){
        $iceri->sepet_parasi=$iceri->count * $iceri->fiyat;
        $sepet_parasi = $sepet_parasi+$iceri -> sepet_parasi;
        $sepet_miktari += $iceri->count;
    }
 

    $summary["sepet_parasi"]=$sepet_parasi;
    $summary["sepet_miktari"]=$sepet_miktari;

    $_SESSION["shoppingCart"]["icerik"]=$icerik;
    $_SESSION["shoppingCart"]["summary"]=$summary;

    return $sepet_miktari;
}




if(isset($_POST["p"])){
    $islem=$_POST["p"];
    
    if($islem=="icerik_gonder"){
        $id=$_POST['product_id'];
        $sepet=$db->query("SELECT * FROM sepet WHERE id={$id}",PDO::FETCH_OBJ)->fetch();
       $sepet->count=1;

       echo urunekle($sepet);
        
    }
    else if($islem=="icerigisil"){

        $id=$_POST["product_id"];
        echo removeFromCart($id);
         
    }
}
?>