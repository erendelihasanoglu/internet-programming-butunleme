<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<body>
    <?php
    include "sepetekrani.php";
    ?>
 <?php require_once"baglan.php";  ?>
<?php
$icerikler=$db->query("SELECT * FROM sepet",PDO::FETCH_OBJ)->fetchAll();

?>
    <div class="container">
    <?php
    if($sepet_miktari>0){?>
        
    
        <h2 class="text-center">Sepetinizde <strong><?php echo $sepet_miktari; ?></strong> ürün bulunmaktadır.</h2>
    <?php }else {echo "Satıalsmdasıdask"?>
    <?php }?>
    <hr>
    <div class="row">
    </div>

        <div class="col-md-7">
            <table class="table table-hover table-bordered table-stripe">
                <thead >
                    
                <th class="text-center">Ürün Resmi</th>
                <th class="text-center">Ürün Adı</th>
                <th class="text-center">Fiyatı</th>
                <th class="text-center">Adeti</th>
                <th class="text-center">Toplam</th>
                <th class="text-center">Sepetten Çıkar</th>
                </thead>
                <tbody>
                <?php foreach($shopping_products as $deneme) {?> 
                
                <tr>
                       
                        <td class="text-center" width="120"><img src="resimler/<?php echo $deneme->img_url;?>" width="50"></td>
                        <td class="text-center"><?php echo $deneme->urun_ismi ?></td>
                        
                <td class="text-center"><strong><?php echo $deneme->fiyat; ?>TL</strong></td>
                
                <td class="text-center col-md-2">
                    <input type="text" class="item-count-input text-center" value="<?php echo $deneme->count; ?>">
                </td>
                <td class="text-center"><?php echo $deneme->sepet_parasi; ?></td>
                <td class="text-center">
                    <a href="#" product_id="<?php echo $deneme->id; ?>" class="btn btn-danger btn-sm removeFromCartBtn">Sepetten Çıkar</a>
                    <?php }?>
                </td>
               
                    </tr>
              
                    
                </tbody>
            </table>
        </div>
      
           
         
           
          
        
          
        
 
    </div>

    <tfoot>
        <th colspan="2" class="sagayasla">
            Toplam Ürün: <span class="color-danger"><?php echo $sepet_miktari; ?></span>
        </th>
        <th colspan="4" class="ortala">
            Ürünlerin Toplam fiyatı: <span class="color-danger"><?php echo $sepet_parasi ?></span>
        </th>
    </tfoot>
</body>
</html>