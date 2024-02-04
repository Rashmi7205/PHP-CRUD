<?php
    include("user.php");
    if(isset($_POST["submit"])){
        $user = new User();
        $res = $user->login($_POST['email'],$_POST['password']);
        if($res){
            header('Location: http://localhost/phplect/crud');
            exit();
        }
        else{
            header('Location: http://localhost/phplect/login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="conatainer-fluid d-flex align-items-center justify-content-center w-100 bg-dark" style="height:100vh;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" 
        class="form w-25 bg-primary d-flex align-items-center justify-content-evenly text-white rounded flex-column shadow-lg text-capitalize"
        style="height:80%;"
        >
            <h1 class="text-capitalize mt-4 font-weight-bold p-2">
                Welcome Back,
            </h1>
            <p>Sign in to your account</p>
            <div class="form-group mt-4 w-75">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email"
                name="email"
                >
            </div>
            <div class="form-group mt-4 w-75">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password"
                name="password"
                >
            </div>
            <button 
            type="submit"
            name="submit"
            class="btn w-75 bg-info text-white font-weight-bolder mt-4"
            >
                Sign in
            </button>
            <p>Does'nt Have an account yet? <a href="/phplect/crud/regpage.php" class="btn-link text-white">
                Create one
            </a></p>
        </form>
    </div>
</body>
<!-- Bootstarp link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</html>