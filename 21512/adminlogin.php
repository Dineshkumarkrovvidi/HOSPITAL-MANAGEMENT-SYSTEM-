<?php
// Create connection
$conn = mysqli_connect("localhost","root","","hospital");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$u= $_REQUEST['username'];
$p=$_REQUEST['psw'];
$res=mysqli_query($conn,"select * from adminlogin where username='".$u."' and password='".$p."'");
if(!empty($res))
{
    if($row=mysqli_fetch_array($res)){
        header("location:admin.html");
    }
    else{
         header("location:loginform.html");
    }
}
?>