<?php
    include("connect.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        
        // Use prepared statements to prevent SQL injection
        $sql1 = "SELECT * FROM student WHERE sid = ?";
        $stmt1 = mysqli_prepare($conn, $sql1);
        mysqli_stmt_bind_param($stmt1, "i", $id);
        mysqli_stmt_execute($stmt1);
        $result1 = mysqli_stmt_get_result($stmt1);

        if($row1 = mysqli_fetch_array($result1)){
            $address_id = $row1["address"];

            // Delete student record
            $sql2 = "DELETE FROM student WHERE sid = ?";
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "i", $id);
            $result2 = mysqli_stmt_execute($stmt2);

            if($result2){
                // Delete associated address record
                $sql3 = "DELETE FROM address WHERE address_id = ?";
                $stmt3 = mysqli_prepare($conn, $sql3);
                mysqli_stmt_bind_param($stmt3, "i", $address_id);
                $result3 = mysqli_stmt_execute($stmt3);

                if($result3){
                    header("Location: http://localhost/phplect/crud/");
                    exit(); // Ensure that no further code is executed after the redirect
                }
            }
        } else {
            echo "<script>window.alert('This record does not exist');</script>";
            header("Location: http://localhost/phplect/crud/");
            exit(); // Ensure that no further code is executed after the redirect
        }
    }
?>
