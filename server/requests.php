<?php
session_start();
include("../comanfile/connectiondb.php");
if(isset($_POST['login_btn'])){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_address = $_POST['user_address'];

    if (empty($user_name) || strlen($user_name) <= 3) {
        echo "Name must be at least 4 characters long";
    } else if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    }  else if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $user_password)) {
        echo "Password must be at least 8 characters long, contain at least one letter, one number, and one special character.";
    } else if (empty($user_address)) {
        echo "Address is required";
    } else {

        $emailcheck = $conbd->prepare("SELECT * FROM login where email='$user_email'");
        $emailcheck->execute();
        if($emailcheck->rowCount() < 1){
            $setLogindata = $conbd->prepare("
        INSERT INTO login (`id`,`name`,`email`,`password`,`address`)
        VALUES (null,'$user_name','$user_email','$user_password','$user_address');
        ");
        $setLogindata->execute();
        if($setLogindata){
            $id = $conbd->lastInsertId();
            $_SESSION['user'] = ['username'=>$user_name,'useremail'=>$user_email,'userId'=>$id];
            header("Location: ../index.php");
        }else{
            echo "data is not ";
        }
        }else{
            echo "Email is Allready";
        }
    } 
}
if(isset($_POST['signUp_btn'])){
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $checkemail = $conbd->prepare("SELECT * FROM login where email='$user_email'");
    $checkemail->execute();
    $checkpassword = $conbd->prepare("SELECT * FROM login where password='$user_password'");
    $checkpassword->execute();
    foreach($checkemail as $result){
        $user_name = $result['name'];
        $user_id = $result['id'];
    }
    if($checkemail->rowCount() < 1 ){
        echo "eamil is not extext";
    }else if($checkpassword->rowCount() < 1){
        echo "password is not Curret";
    }else{
        $_SESSION['user'] = ['username'=>$user_name,'useremail'=>$user_email,'userId'=>$id];
        header("Location: ../index.php");
    }
}
if(isset($_POST['qus-btn'])){
    $user_question = $_POST['user_question'];
    $user_discription = $_POST['user_discription'];
    $category = $_POST['category'];

    $setQus = $conbd->prepare("
    INSERT INTO questions (`id`,`question`,`discription`,`category-id`)
    VALUES (null,'$user_question','$user_discription','$category');
    ");
    $result = $setQus->execute();
    if($result){
        echo "data Success Fully Submit";
    }else{
        echo "Data Not Success";
    }
}
if(isset($_POST['ans-btn'])){
    $user_answer = $_POST['user_answer'];
    $anshidden = $_POST['anshidden'];
    $user_id = $_SESSION['user']['userId'];
    $setAnswer = $conbd->prepare("
    INSERT INTO answer (`id`,`user_answer`,`question_id`,`user_id`)
    VALUES (null,'$user_answer','$anshidden','$user_id');
    ");
    $result = $setAnswer->execute();
    if($result){
        header("Location: //localhost/test/disscius/index.php?q-id=$anshidden");
    }else{
        echo "Result not Submit";
    }
}
?>