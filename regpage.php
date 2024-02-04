<?php
    include("user.php");
    if(isset($_POST['submit'])){
        //Creating a new user object
        $user = new User();
        $res = $user->register($_POST['username'],$_POST['password'],$_POST['cpassword'],$_POST['email']);
        if($res){
            header('Location: http://localhost/phplect/crud');
            exit();
        }
    }
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<title>Reg. page</title>
</head>

<body>
    <div class="conatainer-fluid d-flex align-items-center justify-content-center w-100 bg-dark" style="height:100vh;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" 
        class="form w-25 bg-primary d-flex align-items-center justify-content-evenly text-white rounded flex-column shadow-lg text-capitalize"
        style="height:80%;"
        >
            <h1 class="text-capitalize mt-4 font-weight-bold p-2">Create an account</h1>
            <div class="form-group mt-4 w-75">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email"
                name="email"
                >
            </div>
            <div class="form-group mt-4 w-75">
                <label for="username">username</label>
                <input type="username" class="form-control" id="username" placeholder="Enter username"
                name="username"
                >
            </div>
            <div class="form-group mt-4 w-75">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password"
                name="password"
                >
            </div>
            <div class="form-group mt-4 w-75">
                <label for="confirm_password">confirm password</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Enter confirm password"
                name="cpassword"
                >
            </div>
            <button 
            type="submit"
            name="submit"
            class="btn w-75 bg-info text-white font-weight-bolder mt-4"
            >
                Sign up
            </button>
            <p>Already Have an account? <a href="/phplect/crud/login.php" class="btn-link text-white">
                Login
            </a></p>
        </form>
    </div>
</body>
<!-- Bootstarp link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>