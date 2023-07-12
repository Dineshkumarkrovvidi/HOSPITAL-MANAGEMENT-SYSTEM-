
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      #n1{
       width:250;
      }
      button{
        background-color:green;
        color:white;
        width:100;
      }
      #n2{
        width:100;
      }
      </style>
</head>
  <script>
    function myfun(){
       alert("payment session is openning.....");
    }
    function myfun1(){
       alert("payment recepit is genrating don't close this tab");
    }
    </script>
<body align="center">
        <form>
            <b>patient id:</b><input type="number" name="pid"><br>
            <center><input type="submit" onclick="myfun();"></center>
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

$sql = "SELECT Patientid, Name, Age, problem,bill,totalfee FROM patient where patientid='$pid'";
$result = $conn->query($sql);
echo"<table border=1px align=center class=table>";
    echo"<tr>";
    echo"<th>PATIENTID</th>";
    echo"<th>NAME</th>";
    echo"<th> AGE</th>";
    echo"<th>TOTAL AMOUNT</th>";
    echo"<th>PENDING AMOUNT</th>";
    echo"<th>STATUS</th>";
    echo"</tr>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo"<tr>";
    echo "<td>";?><form action="pay.php" ><input type="none" name="pid" id="n2" value="<?php echo"$row[Patientid]"?>"readonly></input><?php
    echo"</td>";
    echo "<td>";?><input type="none" id="n1" value="<?php echo"$row[Name]"?>"readonly></input><?php
    echo"</td>";   
    echo "<td>";?><input type="none" value="<?php echo"$row[Age]"?>"readonly></input><?php
    echo"</td>";
    echo "<td>";?><input type="none" value="<?php echo"$row[totalfee]"?>"readonly></input><?php
    echo"</td>";
    echo "<td>";?><input type="none"  value="<?php echo"$row[bill]"?>"readonly></input><?php
     echo"</td>";
   
    if($row["bill"]!=0){
      
        echo"<td>";?>
       <b style="color:red"><?php echo"inprocess"; ?></b>
       <?php
        echo"</td>";
        echo"<td>";?><input type="text" name="payment" value="<?php echo"$row[bill]"?>"><button type="submit" value="pay" onclick="myfun1();">pay</button></form><?php echo"</td>";
     }
     else{
      echo"<td>";
      ?>
      <b style="color:green"><?php echo"paid";?></b>
       <?php
        echo"</td>";
     }
   
    echo"</tr>"; 
    echo"</table>";
  }
} else {
  echo "0 results";
}   
$conn->close();
?>

</body>
</html>