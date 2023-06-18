<?php 
$showAlert = false;
// <!-- Connecting with database --> 
include 'partials/_dbconnect.php' ;

$id = $_GET['catid'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userId = $_POST['sno'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $sql = "INSERT into `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`,`timeStamp`)
     VALUES ('$title', '$desc', '$id', '$userId', current_timestamp())";
     
    $result = mysqli_query($conn, $sql);
    $showALert = true;
    
}
$sql = "select * from `categories` where category_id=$id";
$result = mysqli_query($conn, $sql);

$cat;
$desc;

while($row = mysqli_fetch_assoc($result)){
    $cat = $row['category_name'];
    $desc = $row['category_description'];
}

$method = $_SERVER['REQUEST_METHOD'];


echo '<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

    <style>
       .heightContainer{
          min-height: 33vh;
       }
    </style>

<body>';
    include "partials/_header.php";
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your question submitted succesfully. Please wait for community to reply
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

    }
    echo '<div class="container mx-auto my-3">
        <div class="jumbotron container">
            <h1 class="display-4">Welcome to ' . $cat . ' forums</h1>
            <p class="lead">' . $desc . '</p>
            <hr class="my-4">
            <p>This is the peer to peer forum for sharing knowledge to each other. Don\'t be offensive, abusive or cause harassment. Do not post content that is not safe for work. </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>';
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){

        echo '<div class="container px-4">
        <h2>Ask a question</h2> 
        <div class="container heightContainer"><form action="'.$_SERVER['REQUEST_URI'].'" method="post">
        <div class="form-group my-2">
          <label for="exampleInputEmail1">Problem title:</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <input type="hidden" name="sno" value="'.$_SESSION['sno'].'
        </div>
        <div class="form-group my-2">
          <label for="exampleInputPassword1">Problem description:</label>
          <input type="text" name="desc" class="form-control" id="exampleInputPassword1">
          <small id="emailHelp" class="form-text text-muted">Keep your problem description short and easy to understand.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form></div>';
    }else{
        echo '<div class="container px-4">
        <h2>Ask a question</h2>
        <p>You are not logged in! Please login if you want to start a discussion.</p>';
    }
  
  echo '<h2 class="py-1">Browse Questions</h2>';
            $booll = false;
            $sql = "select * from threads where thread_cat_id=$id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $booll = true;
                $threadid = $row['thread_id'];
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "select * from users where sno = $thread_user_id";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '<div class="container px-4"><div class="media d-flex mx-3 my-4">
                <img class="mr-3" src="images/user.jpg" width="40px" height="40px" alt="Generic placeholder image">
                <div class="media-body">
                <p class="font-weight-bold my-0">Ask by: '. $row2['user_email'] .' at '. $row['timeStamp'] .'</p>
                <h5 class="mt-0"><a class="text-decoration-none text-dark" href="threads.php?thread_id='.$threadid.'">'.$row['thread_title'].'</a></h5>'.$row['thread_desc'].    
                '</div>
                </div>
                </div>';

                
            }
    if(!$booll){
        echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container px-4">
                    <p class="display-4">No question found</p>
                    <p class="lead">Be the first person to ask the question</p>
                    </div>
                </div>';
    }

    

    require "partials/_footer.php";
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>';


?>