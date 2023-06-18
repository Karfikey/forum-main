<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        include '_dbconnect.php';

        $user_email = $_POST['signupEmail'];
        $pass = $_POST['signupPassword'];
        $cpass = $_POST['signupcPassword'];

        $existSql = "select * from users where user_email='$user_email'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);

        if($numRows > 0){
          $showError = true;
          header("Location: /forum/index.php?signupprocess=false&error=$showError");
         
        }else{
            if($pass == $cpass && trim($pass) != ""){
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timeStamp`) VALUES ('$user_email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);

                if($result){
                    $showMessage = true;
                    header("Location: /forum/index.php?signupprocess=true&message=$showMessage");
                }

            }else{
                $showError = 0;
                header("Location: /forum/index.php?signupprocess=false&error=$showError");
            }
        }
    


    }


?>