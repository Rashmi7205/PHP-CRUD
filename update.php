<?php
include('connect.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing user data
    $query = "SELECT student.sname, address.street, address.state, address.city, address.zip, student.branch, student.mark
              FROM student
              INNER JOIN address ON student.address = address.address_id
              WHERE student.sid = $id";

    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $sname = $row['sname'];
        $street = $row['street'];
        $state = $row['state'];
        $city = $row['city'];
        $zip = $row['zip'];
        $branch = $row['branch'];
        $mark = $row['mark'];
    } else {
        echo "Error fetching user data.";
        exit();
    }
} else {
    echo "Invalid request. Please provide a user ID.";
    exit();
}

if (isset($_POST['update'])) {
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $mark = mysqli_real_escape_string($conn, $_POST['mark']);

    // Update user data
    $updateQuery = "UPDATE student
                    INNER JOIN address ON student.address = address.address_id
                    SET student.sname = '$sname', 
                        address.street = '$street', 
                        address.state = '$state', 
                        address.city = '$city', 
                        address.zip = '$zip', 
                        student.branch = '$branch', 
                        student.mark = '$mark'
                    WHERE student.sid = $id";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "<script>
                window.alert('User data updated successfully');
                window.location.href = '/phplect/crud/';
              </script>";
    } else {
        echo "Error updating user data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="mb-4">User Data Update</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="sname">Name:</label>
                <input type="text" class="form-control" name="sname" value="<?php echo $sname; ?>" required>
            </div>

            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" name="street" value="<?php echo $street; ?>" required>
            </div>

            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" name="state" value="<?php echo $state; ?>" required>
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" required>
            </div>

            <div class="form-group">
                <label for="zip">Zip:</label>
                <input type="text" class="form-control" name="zip" value="<?php echo $zip; ?>" required>
            </div>

            <div class="form-group">
                <label for="branch">Branch:</label>
                <input type="text" class="form-control" name="branch" value="<?php echo $branch; ?>" required>
            </div>

            <div class="form-group">
                <label for="mark">Mark:</label>
                <input type="text" class="form-control" name="mark" value="<?php echo $mark; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
