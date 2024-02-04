<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="text-white">
    <div class="w-100 bg-dark d-flex align-items-center justify-content-center " style="height:100vh; width:100%">
        <form action="<?php
        echo $_SERVER['PHP_SELF'];
        ?>" method="post"
            class="h-auto p-2 gap-3 d-flex flex-column align-items-center justify-content-around w-50 bg-success rounded">
            <h1 class="text-capitalize font-weight-bold">Create a Record For student </h1>
            <label for="sname">Enter name</label>
            <input class="mt-1  w-75 rounded-lg py-1 px-2" type="text" name="sname" id="sname" />
            <label for="street">Enter Street</label>
            <input class="mt-1  w-75 rounded-lg py-1 px-2" type="text" name="street" id="street" />
            <label for="city">Enter city</label>
            <input class="mt-1  w-75 rounded-lg py-1 px-2" type="text" name="city" id="city" />
            <label for="state">Enter state</label>
            <select class="mt-1  w-25 rounded-lg py-1 px-2" type="text" name="state" id="state">
                <option value="OD">
                    Odisha
                </option>
                <option value="MP">
                    MP
                </option>
                <option value="BH">
                    Bihar
                </option>
            </select>
            <div class="w-75">
                <label for="zip">Enter Zipcode:</label> <br />
                <input class="mt-1  w-50 rounded-lg py-1 px-2" type="number" name="zip" id="zip" /> <br />
                <label for="branch">Enter branch:</label> <br />
                <input class="mt-1  w-50 rounded-lg py-1 px-2" type="text" name="branch" id="branch" />
            </div>

            <label for="mark">Enter Mark:</label>
            <input class="mt-1  w-75 rounded-lg py-1 px-2" type="number" name="mark" id="mark" />
            <input type="submit" value="Submit" name="submit" class="btn btn-primary w-75 py-2 font-weight-bold">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            //Creating connection to DB
            include('connect.php');

            //get the data
            $sname = mysqli_real_escape_string($conn, $_POST['sname']);
            $street = mysqli_real_escape_string($conn, $_POST['street']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $state = mysqli_real_escape_string($conn, $_POST['state']);
            $zip = mysqli_real_escape_string($conn, $_POST['zip']);
            $mark = mysqli_real_escape_string($conn, $_POST['mark']);
            $branch = mysqli_real_escape_string($conn, $_POST['branch']);

            if ($conn) {
                $query = "INSERT INTO address (street,state,city,zip) VALUES ('$street','$state','$city','$zip')";

                $result = mysqli_query($conn, $query);
                if ($result) {
                    $last_id = mysqli_insert_id($conn);
                    $query = "INSERT INTO student (sname,address,branch,mark) VALUES ('$sname','$last_id','$branch','$mark')";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo "
                            <script>
                               window.alert('record created successfully')  
                            </script>
                        ";
                        header("Location: http://localhost/phplect/crud");
                    }
                    else{
                        echo "
                        <script>
                           window.alert('Failed to create record');  
                        </script>
                    ";
                    }
                }
            }

        }
        ?>
    </div>

</body>

</html>