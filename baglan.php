<?php
try{
    $baglan = new mysqli("localhost","root","Erenbaba81","olur");
    $db =new PDO("mysql:host=localhost;dbname=olur; charset=utf8",'root','Erenbaba81');
   // echo "deneme";
}
catch(exception $e)
{
    echo $e->getMessage();
}
?>