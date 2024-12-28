<?php
include("./comanfile/connectiondb.php");
if(isset($_GET['c-id'])){
    $setcategoryqus = $conbd->prepare("SELECT * FROM questions where category_id=$cid");
    $setcategoryqus->execute();
$result = $setcategoryqus->fetchAll();
}else if(isset($_GET['userId'])){
    $setcategoryqus = $conbd->prepare("SELECT * FROM questions where userId=$userId");
    $setcategoryqus->execute();
    $result = $setcategoryqus->fetchAll();
}
else{
    $getQes = $conbd->prepare("SELECT * FROM questions");
    $getQes->execute();
$result = $getQes->fetchAll();
}
?>
<section class="index">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="heading">Questions</h1>
                <?php
                if ($result) {
                    foreach ($result as $res) {
                        $title =  $res['question'];
                        $idqus = $res['id'];
                        echo "<h4><a href='?q-id=$idqus'>$title</a></h4><hr>";
                    }
                }
                ?>
            </div>
            <div class="col-4">
            <h1 class="heading">Category</h1>
                <?php include("./client/showcategory.php");
                ?>
            </div>
        </div>
    </div>
</section>