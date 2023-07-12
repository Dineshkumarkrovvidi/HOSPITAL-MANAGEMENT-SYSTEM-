
<html>
    <head>
    <link rel="stylesheet" href="background.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    function myfun(){
        alert("hi your want see your scanning report");
    }
</script>
</head>
    <body align="center">
        <form action="">
            <b>patient id:</b><input type="number" name="pid"><br>
            <center><input type="submit" onclick="myfun();"></center>
        </form>
    </body>
</html>
<?php
error_reporting(0);
// Create connection
$conn = mysqli_connect("localhost","root","","hospital");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$pid =  $_REQUEST['pid'];

$sql = "SELECT Patientid, Name, Age, problem,report FROM patient where patientid='$pid'";
$result = $conn->query($sql);
echo"<table border=1px align=center width=400 class=table text-align:center>";
    echo"<tr style=text-align:center>";
    echo"<th>patientid:</th>";
    echo"<th>Name:</th>";
    echo"<th>Problem</th>";
    echo"<th>scanning report</th>";
    echo"<th>blood test</th>";
    echo"</tr>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo"<tr>";
    echo "<td>$row[Patientid]</td>";
    echo "<td>$row[Name]</td>";
    echo "<td>$row[problem]</td>";
    echo "<td>"; if($row["report"] != NULL)
    {
      ?><b style="color:green"><a href="./image/<?php echo $row["report"];?>">YES</a></b>
      <?php
    }
    else{
      ?>
      <b style="color:red">NO</b>
      <?php
    }
      
    echo"</td>";
    echo "<td>"; if($row["blood"] != NULL)
    {
      ?><b style="color:green">YES</b>
      <?php
    }
    else{
      ?>
      <b style="color:red">NO</b>
      <?php
    }
    echo"</td>";
    echo"</tr>"; 
  }
} 
$conn->close();
?>
<html>
    <body>
        <a href="image.php">click me to upload scanningreport</a>
</body> 
</html>