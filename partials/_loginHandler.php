<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        include '_dbconnect.php';

        $user_email = $_POST['loginEmail'];
        $pass = $_POST['loginPassword'];

        $sql = "select * from users where user_email='$user_email'";
        $result = mysqli_query($conn, $sql);

        $numRows = mysqli_num_rows($result);
        if($numRows == 1){

            $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['user_pass'])){

                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['userName'] = $user_email;
                $_SESSION['sno'] = $row['sno'];

            }
        }
    }
    header("Location: /forum/index.php");

?>