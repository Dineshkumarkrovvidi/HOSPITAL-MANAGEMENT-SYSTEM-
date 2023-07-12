<html>
    <head>
    <link rel="stylesheet" href="background.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    div.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  width:50%;
  transition: 0.5s;
  height: fit-content;
  display: flex;
   justify-content: center;
    align-items: center;
     color:black;
    margin:10px;
    background-color: transparent;
    
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

section.login{
   display: flex;
   justify-content: center;
    align-items: center;

 }
 img:hover{
  width: 700px;
  height: 700px;
}
 p.card{
  padding:10px;
 }
    </style>
    <script>
    function myfun(){
        alert("hi your want see your scanning report");
    }
</script>
</head>
    <body align="center">
        <form action="">
        <center>
            <b>patient id:</b><input type="number" name="pid"><br>
            <input type="submit" onclick="myfun();"></center>
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
session_start();
$_SESSION['pid']=$_REQUEST['pid'];
$pid=$_REQUEST['pid'];
$sql = "SELECT Patientid, Name, Age, problem,report FROM patient where patientid='$pid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo"<center>";
    echo"<div class='card' style='border-radius: 1rem;'>";
    echo"<table boader=0>";
    echo"<tr>";
    echo"<td><b>patientid</b></td>";
    echo "<td>:$row[Patientid]</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><b>Name</b></td>";
    echo "<td>:$row[Name]</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><b>age</b></td>";
    echo "<td>:$row[Age]</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><b>problem</b></td>";
    echo "<td>:$row[problem]</td>";
    echo"</tr>";
   
    echo"</table>";
    
    echo"<section class='login'>";
    echo"<div class='card' style='border-radius: 1rem;'>";
    echo"<b>Scanning report:</b>";
   

   ?><img src="../image/<?php echo $row["report"]; ?>" alt="noreport" width=200 height=200>
    <?php
       echo"</div>";
     echo"<div class='card' style='border-radius: 1rem;'>";
     echo"<b>blood report</b>";
 
    ?><img src="./image/<?php echo $row["report1"]; ?>" alt="noreport" width=200 height=200>
     <?php
     $sql1 = "SELECT * FROM medecine where pid='$pid'";
     $result1 = $conn->query($sql1);
     
      echo"</div>";
      echo"</section>";
      echo"</div>";
      echo"</center>";
      echo"<p class='card' style='border-radius: 1rem;' width=100%>";
      echo"<b>medicine description:</b>";
      while($row1 = $result1->fetch_assoc()) {
      echo"<i>$row1[date]</i>";  
      echo"<i>$row1[medicine]</i>";
      }
      echo"</p>";
      
      echo"<button><a href='updatemed.php?pid='>update</a></button>";
      
     
  }
} 
$conn->close();
?>

