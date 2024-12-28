<?php
include("./comanfile/connectiondb.php");
$getQes = $conbd->prepare("SELECT * FROM questions WHERE id='$qusId'");
$getQes->execute();
$result = $getQes->fetchAll();
if ($result) {
    foreach ($result as $res) {
        $category_id = $res['category_id'];
        $question =  $res['question'];
        $discription = $res['discription'];
    }
} else {
    echo "data Npo Found ";
}
?>
<section class="index">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="heading">Questions</h1>
                <?php
                echo "<h4>Question :- $question</h4>";
                echo "<h6>$discription</h6>";
                include("./client/setanswer.php");
                ?>
                <form action="./server/requests.php" method="POST">
                    <input type="hidden" name="anshidden" value="<?php echo $qusId ?>">
                    <textarea class="form-control my-3 " name="user_answer" placeholder="Your Answer..."></textarea>
                    <button class="btn btn-primary" name="ans-btn">Submit Answer</button>
                </form>
            </div>
            <div class="col-4">
               <?php 
               $categoryName = $conbd->prepare("SELECT category FROM category where id='$category_id'");
               $categoryName->execute();
               $categoryNameresult = $categoryName->fetchAll();
               if ($categoryNameresult) {
                foreach ($categoryNameresult as $res) {
                 $allqus = $res['category'];
                 echo "<h1 class='heading'>$allqus</h1>";
                }
            }
               $getQes = $conbd->prepare("SELECT * FROM questions WHERE category_id='$category_id' and id!='$qusId'");
               $getQes->execute();
               $result = $getQes->fetchAll();
               if ($result) {
                   foreach ($result as $res) {
                    $allqus = $res['question'];
                    echo "<h4><a href='?c-id='>$allqus</a></h4><hr>";
                   }
               } else {
                   echo "data Npo Found ";
               }
               ?>
            </div>
        </div>
    </div>
</section>