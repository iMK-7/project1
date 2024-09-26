<?php

$errors = [

    'FristNameError' => '',
    'LastNameError' => '',
    'emailError' => '',
];

$FristName ='';
$LastName = '';
$email =    '';

if(isset($_POST['submit'])){
    
    $FristName = $_POST['FristName'];
    $LastName =  $_POST['LastName'];
    $email =     $_POST['email'];


    if(empty($FristName)){
        $errors['FristNameError'] = 'ادخل الاسم الاول';
    }

    if(empty($LastName)){
        $errors['LastNameError'] = 'ادخل الاسم الاخير';
    }

    if(empty($email)){
        $errors['emailError'] = 'ادخل الايمال';
    }
    //
    //elseif(!filter_var($email, FILTER_VALIDATE_ENAIL)){
    //$errors['emailError'] = 'ادخل الايمال بشكل صحيح';
    //}
    //

    if(!array_filter($errors)){

        $FristName = mysqli_real_escape_string($conn, $_POST['FristName']);
        $LastName =  mysqli_real_escape_string($conn, $_POST['LastName']);
        $email =     mysqli_real_escape_string($conn, $_POST['email']);
    
        $sql_DB = "INSERT INTO users(FristName,LastName,email)
             VALUES ('$FristName','$LastName','$email')";
    
        if(mysqli_query($conn,$sql_DB)){
            header('location:'.$_SERVER['PHP_SELF']);
        }else{
           echo 'Error ' . mysqli_error($conn);
        }
        }
}