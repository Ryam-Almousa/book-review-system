
<!DOCTYPE HTML> 

<link rel="stylesheet" href="style1.css">



<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "bookreview";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $rateErr = "";
$name = $rate = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["rate"])) {
    $rateErr = "rate is required";
  } else {
    $rate = test_input($_POST["rate"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<center><h2>Customer review</h2></center>
<center><p><span class="error">* required field</span></p></center>
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" >  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  rate:
  <input type="radio" name="rate" <?php if (isset($rate) && $rate=="excellent") echo "checked";?> value="excellent">excellent
  <input type="radio" name="rate" <?php if (isset($rate) && $rate=="average") echo "checked";?> value="average">average
  <input type="radio" name="rate" <?php if (isset($rate) && $rate=="poor") echo "checked";?> value="poor">poor  
  <span class="error">* <?php echo $rateErr;?></span>
  <br><br>
  <input type="submit" name="add" value="Insert">  
</form>

         
          <?php
           if(isset($_POST['add'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $rate = $_POST['rate'];
       
        
        $resulty = mysqli_query($conn, 'select * from review1 where name ="'.$name.'"');
        
            if (mysqli_num_rows($resulty) == 1){
                   echo '</br><p style="color:red;padding:5px; background-color:white;width:100%">Already Added</p>';
            }else {
            $sql = "INSERT INTO review1(name,comment,rate)
                    VALUES ('$name','$comment','$rate')";
            mysqli_query($conn, $sql);
           echo '<br /><p style="color:green;padding:5px; background-color:white;width:100%">New  added Successfully.</p>';
         }
        }
        
        ?>
		<a href="customerreviews.php"> <button type = "button" style="fornt-size:50 px; padding: 10px 20px; background-color:#bcbcbc;color:#eeeeee">back</button></a>
         

</body>
</html>


