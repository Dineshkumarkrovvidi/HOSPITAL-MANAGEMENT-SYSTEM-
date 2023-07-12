<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<body align="center">
        <form>
            <b>patient id:</b><input type="number" name="pid"/>
            <button class="btn btn-default" type="submit""><i class="glyphicon glyphicon-search"></i></button>
        </form>
  </body>
  <body>   
<?php
error_reporting(0);
// Create connection
$conn = mysqli_connect("localhost","root","","hospital");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$pid =  $_REQUEST['pid'];
if($pid!=NULL){
  $sql = "SELECT Patientid, Name, Age, problem,bill FROM patient where patientid='$pid'";
}
else{
$sql = "SELECT Patientid, Name, Age, problem,bill FROM patient ";
}
$result = $conn->query($sql);
echo"<table border=1px align=center width=400 class=table text-align:center>";
    echo"<tr style=text-align:center>";
    echo"<th>patientid:</th>";
    echo"<th>Name:</th>";
    echo"<th> age:</th>";
    echo"<th>pending payments:</th>";
    echo"<th>status</th>"; 
    echo"</tr>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo"<tr style=text-align:center>";
    echo "<td>$row[Patientid]</td>";
    echo "<td>$row[Name]</td>";   
    echo "<td>$row[Age]</td>";
    echo "<td>$row[bill]</td>";
    echo"<td style=text-align:center>";
       if($row["bill"]!=0){
        ?>
         <b style="color:red"><?php echo"inprocess"; ?></b>
         <?php
       }
       else{
        ?>
        <b style="color:green"><?php echo"paid";?></b>
         <?php
       }
    echo"</td>";
    
    echo"</tr>"; 
    
  }
  echo"</table>";
} else {
  echo "0 results";
}   
$conn->close();
?>

</body>
</html>