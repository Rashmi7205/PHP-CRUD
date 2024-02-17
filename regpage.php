<?php
include("user.php");

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $email = $_POST["email"];
  $age = $_POST["age"];
  $country = $_POST["country"];
  $phone = $_POST["phone"];
  $sal = $_POST["range1"] . ',' . $_POST["range2"] . ',' . $_POST['range3']; // Concatenate salary ranges with commas
  $gender = $_POST['gender'];
  $image = $_FILES['image']['tmp_name'];

  $targetDirectory = './uploads/';
  $targetFile = $targetDirectory . basename($_FILES['image']['name']);

  if($password != $cpassword) {
    echo "
      <script>
        window.alert('Password mismatch');
      </script>
    ";
    exit(1);
  }
  move_uploaded_file($image, $targetFile);

  $user = new User();
  $user->signup($username, $password, $email, $targetFile, $age, $country, $sal, $phone, $gender);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>User Registration Form</title>
</head>

<body>
  <div class="container-fluid d-flex align-items-center justify-content-center text-white bg-dark">
    <form class="form w-50 mt-5 " method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>">
      <h1 class="text-center">Register Here</h1>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="cpassword" class="form-control" id="confirmPassword"
          placeholder="Confirm your password">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image">
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" name="phone" maxlength="10" class="form-control" id="phone"
          placeholder="Enter your phone number">
      </div>
      <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" id="country" name="country">
          <option selected>Select your country</option>
          <option value="us">United States</option>
          <option value="ca">Canada</option>
          <!-- Add more options as needed -->
        </select>
      </div>
      <div class="mb-3">
        <label class="form-check-label">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="male">
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="female">
          <label class="form-check-label" for="female">Female</label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-check-label">Salary Range</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="range1" value="0-50000" id="range1">
          <label class="form-check-label" for="range1">0 - 50,000</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="50001-100000" id="range2" name="range2">
          <label class="form-check-label" for="range2">50,001 - 100,000</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="100001-150000" id="range3" name="range3">
          <label class="form-check-label" for="range3">100,001 - 150,000</label>
        </div>
        <!-- Add more checkboxes as needed -->
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-eaQww+qCdXqG8rMzyS/5u3wO10LLA1PlxE5mfJ+tWEGP7HkoFfV8/d5F9dPB3SXT"
    crossorigin="anonymous"></script>
</body>

</html>