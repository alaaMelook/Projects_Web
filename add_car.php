<?php
session_start();
include "db.php";


if($_SERVER['REQUEST_METHOD']=="POST")
{
    //something got posted
    $id=$_POST['id'];
    $model=$_POST['model'];
    $year=$_POST['year'];
    $color=$_POST['color'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $cost=$_POST['cost'];
    $status=$_POST['status'];

    
 $sql = "SELECT * FROM flower WHERE id = '$id'";
 $result = mysqli_query($conn, $sql);
 $rowcount = mysqli_num_rows($result);
 if($rowcount > 0){
    header("Location: add_car.html?error=ID already exits!");
    exit();
 }

 if(!empty($id)&& !empty($model) && !empty($year) && !empty($color) && !empty($country) && !empty($city) && !empty($cost) && !empty($status))
 {
    
         //save to database
        
          $query=" INSERT INTO flower (id,model,city,country,color,year,cost,status) values (?,?,?,?,?,?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          $prepareStmt = mysqli_stmt_prepare($stmt,$query);
          if($prepareStmt){
              mysqli_stmt_bind_param($stmt,"ssssssss",$id,$model,$city,$country,$color,$year,$cost,$status);
              mysqli_stmt_execute($stmt);
              header("Location: add_car.php?error=flower Added successfully.");
              exit();
     }

 }else
 {
    header("Location: add_car.html?error=please enter valid information!");
    exit();
 }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title >add flower</title><br>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scala=1.0">


<link rel="stylesheet"  href="signup.css">

<script>
     
        //information validation
        function validateForm(){
     
            var cost_=document.forms["myForm"]["cost"].value;
            if(cost=="" || cost <= 0 ){
                alert("Please check car cost again");
                return false;
            }
            var status=document.forms["myForm"]["status"].value;
            if(status==""){
                alert("Car status must be filled out");
                return false;
            }
            if (status != "Active" && status != "Out of service" && status != "Rented") {
                alert("Invalid car status!!");
                return false;
            }
            
        }

    </script>

</head>

<body>
    <header>
        <a href="#" class="logo">Floward</a>
    </header>
 <form  action="add_car.php" method="post">
<h2>add flower</h2>

<?php if (isset($_GET['error'])) {?>
    <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <label> ID</label>
 <input type="number" name="id" id="" placeholder="Enter  Id">

 <label>Model</label>
 <input type="text" name="model" id="" placeholder="Enter flower model">

 <label>Year</label>
 <input type="number" name="year" id="" placeholder="Enter model year">

 <label>Color</label>
   <input type="text" name="color" placeholder="Enter flower color"><br>

   <label>Country</label>
    <input type="text" name="country" placeholder="Enter country"><br>

    <label>City</label>
    <input type="text" name="city" placeholder="Enter city"><br>

     <label>Cost </label>
    <input type="number" name="cost" placeholder="Enter car cost"><br>

     <label> status</label>
     <input type="text" name="status" placeholder="Active/Out of service"><br>

<button type="submit" name ="button">Add flower</button>

</form>
</body>



