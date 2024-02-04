<?php
include("user.php");
$user = new User();
$user->get_profile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="w-100 d-flex align-items-center justify-content-center bg-dark" style="height:100vh;">
    <div class="card">
        <form action=""
        class="d-flex align-items-center justify-content-center"
        style="width:350px;height:300px;"
        >
            <label for="image"
            class="w-100"
            >
            <img class="card-img-top" src="https://imgs.search.brave.com/HioWp9quO8eql2QsykpqKF9LWuaLnIj5VkpUwVd97Yg/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/cG5naXRlbS5jb20v/cGltZ3MvbS81MDQt/NTA0MDUyOF9lbXB0/eS1wcm9maWxlLXBp/Y3R1cmUtcG5nLXRy/YW5zcGFyZW50LXBu/Zy5wbmc" alt="Card image cap"
            >
            </label>
            <input type="file"
            class="d-none"
            id="image"
            name="image"
            />
        </form>
  
  <div class="card-body">
    <h4 class="card-title"><?php echo User::$user_data[2] ?></h4>
    <p class="card-text">
    <?php echo User::$user_data[1] ?>
    </p>
    <a href="#!" class="btn btn-danger">Logout</a>
  </div>
</div>
    </div>
</body>

</html>