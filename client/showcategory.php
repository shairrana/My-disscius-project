<?php
 include("../disscius/client/com.php");
 $getCategory = $conbd->prepare("SELECT * FROM category");
 $getCategory->execute();
 $result = $getCategory->fetchAll();
 if($result){
    foreach ($result as $res) {
        $category =  $res['category'];
        $Cid = $res['id'];
        echo "<h4><a href='?c-id=$Cid'>$category</a></h4><hr>";
    }
 }else{
    echo "not found data";
 }	
 ?>