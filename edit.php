<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "bookreview";

// Create connection
$connect = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



if(isset($_POST['edit'])){
       
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $rate = $_POST['rate'];
           
           $resultyyy = mysqli_query($connect, 'select * from review1 where name ="'.$name.'"  ');
            if (mysqli_num_rows($resultyyy) == 1){
              $sql = "UPDATE review1 SET comment='$comment',rate ='$rate'"
                      
                      . "  WHERE name='$name'  " ;
            mysqli_query($connect, $sql);
             echo '<p style="color:green">Course Updated successfully</p>';
             header('location:update.php');
            }else {
                echo ' not found';
            header('location:update.php');
            }
        }
       
        
        
if(isset($_POST['delete'])){
             
          $name = $_POST['name'];
           
          $resultyyy = mysqli_query($connect, 'select * from review1 where name ="'.$name.'" ');
            if (mysqli_num_rows($resultyyy) == 1){
              $sql = "DELETE FROM review1 WHERE name = '$name' " ;
                if ($connect->query($sql) === TRUE) {
                 echo '<p style="color:green">Gift Deleted successfully</p>';
                 header('location:update.php');
                } else {
                    echo "Error deleting record: " . $connect->error;
                    header('location:update.php');
                }
            }else {
                echo ' not found';
                header('location:update.php');
            }
        }        

