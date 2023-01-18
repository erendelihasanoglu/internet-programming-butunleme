$(document).ready(function(){
    $(".icerikgonder").click(function(){
        var url="http://localhost/yapabilirsin/asilsepet.php"
        var data={
            p:"icerik_gonder",
            product_id:$(this).attr("product-id")
        }
        $.post(url,data,function(response){
            $(".cart-count").text(response);
          
        })
    })
 
})
