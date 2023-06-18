<?php
// <!-- Connecting with database --> 
include 'partials/_dbconnect.php';

$id = $_GET['thread_id'];
$sql = "select * from `threads` where thread_id=$id";
$result = mysqli_query($conn, $sql);

$cat;
$desc;

while ($row = mysqli_fetch_assoc($result)) {
    $threadtitle = $row['thread_title'];
    $threaddesc = $row['thread_desc'];
}

$sql = "select * from `categories` where category_id=$id";
$result = mysqli_query($conn, $sql);



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
          min-height: 54vh;
       }
    </style>

<body>';
include "partials/_header.php";


$showAlert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $userId = $_POST['sno'];

    $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$userId', current_timestamp())";

    $result = mysqli_query($conn, $sql);
    $showALert = true;
    if ($showALert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your answer uploaded successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}


echo '<div class="container mx-auto my-3">
        <div class="jumbotron container">
            <h1 class="display-4">' . $threadtitle . '</h1>
            <p class="lead">' . $threaddesc . '</p>
            <hr class="my-4">
            <p>This is the peer to peer forum for sharing knowledge to each other. Don\'t be offensive, abusive or cause harassment. Do not post content that is not safe for work. </p>
            Posted by: Paras
        </div>
    </div>';
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        echo '<div class="container my-5">
        <div class="container">
        <h2>Post a comment</h2> 
        <div class="container"><form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
        <div class="form-group my-4">
          <label for="exampleInputPassword1">Type a comment</label>
          <input type="text" name="comment" class="form-control" id="comment">
          <input type="hidden" name="sno" value="'.$_SESSION['sno'].'
          <small id="emailHelp" class="form-text text-muted">Keep your answer short and easy to understand.</small>
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
      </form></div>
            <h2 class="py-1 my-5">Discussions</h2>';
        
    }else{
        echo '<div class="container my-5">
        <div class="container">
        <h2>Post a comment</h2> 
        <p>You are not logged in! Please login if you want to Post a comment.</p>
            <h2 class="py-1 my-5">Discussions</h2>';
    }
 ?>
            <?php
            $sql = "select * from comments where thread_id=$id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                $comment_by = $row['comment_by'];
                $sql2 = "select * from users where sno = $comment_by";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<div class="media my-3 d-flex">
                    <img src="images/user.jpg" width="54px" class="mr-3" alt="...">
                    <div class="media-body">
                    <p class="font-weight-bold my-0">Ask by: '. $row2['user_email'] .' at '. $comment_time .'</p>
                         ' . $content . '
                        </div>
                        </div>';
            }

            if ($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container px-4">
                    <p class="display-4">No question found</p>
                    <p class="lead">Be the first person to ask the question</p>
                    </div>
                </div>';
            }

            include "partials/_footer.php";
            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>';


            ?>