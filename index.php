<!DOCTYPE html>
<html lang="en">
<head>
    <title>disscius web application</title>
    <?php include("../disscius/client/com.php") ?>
</head>
<body>
    <?php
    session_start();
     include("./client/header.php");
     if (isset($_GET['login']) // || !isset($_SESSION['user']['username'])
     ) {
        include("../disscius/client/login.php");
    }else if(isset($_GET['sign']) //|| !isset($_SESSION['user']['username'])
    ) {
        include("../disscius/client/signup.php");
    }else if(isset($_GET['loginout'])){
        session_unset();
        session_destroy();
        header("Location: ./index.php");
    }else if(isset($_GET['ask'])){
        include("../disscius/client/askQuestion.php");
    }else if(isset($_GET['q-id'])){
        $qusId = $_GET['q-id'];
       include("./client/showdiscription.php");
    }else if(isset($_GET['c-id'])){
        $cid = $_GET['c-id'];
        include("./client/showQus.php");
    }else if(isset($_GET['userId'])){
        $userId = $_GET['userId'];
        include("./client/showQus.php");
    }
    else{
        include("./client/showQus.php");
    }
    ?>
</body>
</html>