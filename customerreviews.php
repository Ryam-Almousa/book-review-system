<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css">
<center><h1 style="background-color: darkgray;">customer review </h1></center>
<style>
body{
background-image : url(imag/photo.jpg);
}
</style>
</head>
<header></header>
<body class ="bg-dark">
<?php

$con = mysqli_connect("127.0.0.1:3307","root","","bookreview");
if(!$con)
{
	die('Could not connect: ');
}
$query = "select * from review1";
$result = mysqli_query($con,$query);
?>
<div class="container">
<div class="row mt-5">
<div class="col">
<div class="card_header">
</div>
 

<div class="card-body">
<table border="2" width="1000px">
<tr><th colspan="4">customer reviews</th></tr>
<tr class="bg-dark text-white">
<td>Name</td>
<td> comment </td> 
<td> rate </td>
<td>update</td>
</tr>
<tr>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['comment'];?></td>
<td><?php echo $row['rate'];?></td>
<td> <a href="update.php"class="btn btn-primary"> <button type = "button" style="fornt-size:25px;background-color:#A6B896;color:#F4F0EA">update</button></a></td>
</tr>
<?php
}
?>
</table>
</div>
<br><br>
<a href="bookreview.php"class="btn btn-primary"> <button type = "button" style="fornt-size:50 px; padding: 10px 20px;background-color:#bcbcbc;color:#eeeeee">add </button></a>
<a href="project.html"> <button type = "button" style="fornt-size:50 px;padding: 10px 20px; background-color:#bcbcbc;color:#eeeeee">back</button></a>
         
</body>

</html>
