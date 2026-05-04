<!DOCTYPE HTML> 



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

$sql = "SELECT * FROM review1";
$result = $conn->query($sql);

?>

 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" href="style1.css">

</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $rateErr= "";
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

<h2><center>update</center></h2>
<p><center><span class="error">* required field</span></center></p>


 <?php 
          if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
	
		$name = $row['name'];
        $comment = $row['comment'];
        $rate = $row['rate'];

                ?>

<form method="post" action="edit.php" ><center>
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
  <input type="submit" name="edit" value="Edit">  
  <input type="submit" name="delete" value="Delete"></center>  
</form>

   <?php 
			   }
			   
			   } else {
             echo 'No review1 added , please add some new Post.';
         }
			   
   ?>     
   
<a href="customerreviews.php"> <button type = "button" style="fornt-size:50 px; padding: 10px 20px; background-color:#bcbcbc;color:#eeeeee">back</button></a>
         
</body>
</html>