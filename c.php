<?php
include 'database.php';

if (isset($_POST['submit'])) 
{

    $full_Name = $_POST['full_name'];
    $Email = $_POST['Email'];
    $gender = $_POST['gender'];
    $Password = $_POST['Password'];
    $Confirm_Password = $_POST['Confirm_Password'];


      $sql="insert into register(full_name,Email,gender,Password,Confirm_Password)
      values('$full_Name','$Email','$gender','$Password','$Confirm_Password')";
      if(mysqli_query($con,$sql))
      {
         echo"<script>alert('new record inserted')</script>";
      }
      else
      {
        echo "error:".mysqli_error($con);
     }
        mysqli_close($con);
}
?>
