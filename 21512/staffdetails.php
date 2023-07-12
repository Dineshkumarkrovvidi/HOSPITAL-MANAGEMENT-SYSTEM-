<html>
  <head>
  <link rel="stylesheet" href="background.css">
</head>
 <form action=addstafflogin.html>
    <input type="submit" value=addstaff>   
<?php
// Create connection
$conn = mysqli_connect("localhost","root","","hospital");
// Check connection

$sql = "SELECT * FROM stafflogin";
$result = mysqli_query($conn,$sql);
echo"<table border=1 width=500 align=center>";
echo "<tr>";
echo "<th>name</th>";
echo "<th>password</th>";
echo "</tr>";
  while(($row = mysqli_fetch_array($result))!=NULL ){
  echo "<tr>";
  echo "<td>$row[0]</td>";
  echo "<td>$row[1]</td>";
  echo "</tr>";
  
} 
echo "</table>";
mysqli_close($conn);
?>
<html>
  
    