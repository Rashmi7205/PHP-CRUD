<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation on Php!</title>
    <!-- Booststrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="text-white">
   <?php 
    include("./navbar.php");
   ?>
   <div class="container-fluid mt-5 bg-dark min-vh-100 "> 
    <h1 class="text-white px-2 py-5">User management</h1>
   <table class="table table-hover table-dark">
  <thead>
    <tr scope="row">
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">Street</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Zipcode</th>
      <th scope="col">Mark</th>
      <th scope="col" colspan="2">
        Action
      </th>
    </tr>
  </thead>  
  <?php
    include("./connect.php");

    if($conn){
        $query = "SELECT  *  FROM student JOIN address WHERE student.address=address.address_id ;";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            //if the data present
            while($row = mysqli_fetch_assoc($result)) {
  ?>
    <tr scope="row">
        <td scope="col"><?php echo $row['sid']; ?></td>
        <td scope="col"><?php echo $row['sname']; ?></td>
        <td scope="col"><?php echo $row['street']; ?></td>
        <td scope="col"><?php echo $row['city']; ?></td>
        <td scope="col"><?php echo $row['state']; ?></td>
        <td scope="col"><?php echo $row['zip']; ?></td>
        <td scope="col"><?php echo $row['mark']; ?></td>
        <td scope="col">
        <a href="delete.php?id=<?php echo $row['sid'];?>" class="btn bg-danger text-white " >delete</a>
        <a href="update.php?id=<?php echo $row['sid'];?>" class="btn bg-primary text-white" >Edit</a>     
        </td>
         
    </tr>
  <?php
        }
        }
    }
    else{
        echo "<h1>No data Found!</h1>";
    }
  ?>
    
</table>
   </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>