<?php
include("./comanfile/connectiondb.php");
$setAnswer = $conbd->prepare("SELECT * FROM answer WHERE question_id='$qusId'");
$setAnswer->execute();
$result = $setAnswer->fetchAll();
if ($result) {
    if (!empty($result)) {
        echo "<h5>Answer :-</h5>";
        foreach ($result as $res) {
            $dataget =   $res['user_answer'];
            echo "<h6>$dataget<h6>";
        }
    }
}
