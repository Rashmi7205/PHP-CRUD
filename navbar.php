<?php
    include("user.php");
    $user = new User();
    $res = $user->get_profile();
    if($res){
      echo $res;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="height:70px">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./create.php">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./regpage.php" >SignUp</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./login.php" >Sign in</a>
        </li>
      </ul>
      <div class="w-25 left-0 text-white">
            <?php
             if($res){
              echo "<p class='font-weight-bold text-center text-capitalize bg-success w-25 mx-auto rounded-lg p-2 text-tracking-wider'>".$res."</p>";
             }
            ?>
      </div>
    </div>
  </div>
</nav>
</body>
</html>