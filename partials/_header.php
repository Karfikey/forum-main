<?php
session_start();
echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catogeries
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="contact.php" class="nav-link">Contact</a>
        </li>
      </ul>';
      if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        echo '<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <p class="text-light mx-2 my-2">'.$_SESSION['userName'] .'</p>
        <a href="partials/_logOut.php" class="btn btn-primary btn-outline-success text-light">Logout</a>
      </form>';
      }else{
        echo '<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <div class="container">
        <button type="button" class="btn btn-primary btn-outline-success text-light" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-primary btn-outline-success text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Signup</button>
        </div>
      </form>';
      }
      
   echo '</div>
  </div>
</nav>';

 include 'partials/_loginModal.php';
 include 'partials/_signupModal.php';
 
 if(isset($_GET['signupprocess']) && $_GET['signupprocess'] == true && isset($_GET['message']) && $_GET['message'] == true){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert"> <strong>Success!</strong> User created successfully<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
 }else if(isset($_GET['signupprocess']) && $_GET['signupprocess'] == "false" && isset($_GET['error']) && $_GET['error'] == 1){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Failed!</strong> Email already in use<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
 }else if(isset($_GET['signupprocess']) && $_GET['signupprocess'] == "false" && isset($_GET['error']) && $_GET['error'] == 0){
  echo 'no';
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Failed!</strong> Password did not match<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
 }

?>


