<html>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="background.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
      h4.t{
         float: right;
         
      }
      #fist{
        border: 2px solid black;
      }
   </style>
<?php   
   
    $payment=$_REQUEST['payment'] ;
    $pid=$_REQUEST['pid'];
    $conn = mysqli_connect("localhost","root","","hospital");
    $query="select bill,totalfee from patient where patientid='$pid'";
    $result = $conn->query($query);
    while ($data = mysqli_fetch_assoc($result)){
      $tp=$data['bill']-$payment;
      $p=$data['totalfee']-$tp;
      
    }
    $sql="update patient set bill='$tp' where patientid='$pid'";
    $result = $conn->query($sql);
    $sql1= "SELECT Patientid, Name, Age, phoneno,bill,totalfee FROM patient where patientid='$pid'";
    
    $result1 = $conn->query($sql1);
    $sql2="select SYSDATE() ";
    $result2 = $conn->query($sql2);
    if ($result1->num_rows > 0) {
      while($row = $result1->fetch_assoc()) {
      echo"<div class='card' >
      <div class='card-body mx-4'>
        <div class='container' id='fist'>";  
      echo"<p class='my-5 mx-5' style='font-size: 30px;'>payment is Sucessfull</p>";
      echo"<ul class='list-unstyled'>
      <li class='text-black'>NAME:$row[Name]</li>
      <li class='text-black mt-1'>AGE:$row[Age]</li>
      <li class='text-muted mt-1'>PHONENO:$row[phoneno]</li>
      Date:".date('d/m/y')."</ul> <hr width='100%'>";
      echo"<div class='col-xl-10'>
      <h4 style='color:orange'>TOTAL FEE</h4><div class='col-xl-2'>
      <h4 class='t'>$row[totalfee]</h4></div> </div><hr style='border: 1px solid black;' width='100%'>";
      echo"<div class='col-xl-10'>
      <h4 style='color:green'>PAID AMOUNT</h4><div class='col-xl-2'>
      <h4 class='t'>$payment</h4></div> </div><hr  style='border: 2px solid black;' width='100%'>";
      echo"<div class='col-xl-10'>
      <h4 style='color:red'>TOTAL PAID AMOUNT</h4><div class='col-xl-2'>
      <h4 class='t'>$p</h4></div> </div><hr style='border: 2px solid black;' width='100%'>";
      echo"<div class='col-xl-10'>
      <h4 style='color:red'>PANDINNG AMOUNT</h4><div class='col-xl-2'>
      <h4 class='t'>$row[bill]</h4></div> </div><hr style='border: 2px solid black;' width='100%'>";
      echo"</div>
      </div>
    </div>";
      
      }
      
    }
      else{
        echo "result0";
      }
      
$conn->close();
?>
