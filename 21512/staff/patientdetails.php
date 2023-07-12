<head>
<link rel="stylesheet" href="background.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  width:50%;
  height: 50%;
  transition: 0.5s;
  background-color: transparent;
  padding:50px;
 
 
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
 
           section{
   display: flex;
   justify-content: center;
    align-items: center;
 }
 </style>
</head>
<?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost","root","","hospital");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $age = $_REQUEST['age'];
        $gender =  $_REQUEST['gender'];
        $ph=$_REQUEST['ph'];
        $address = $_REQUEST['address'];
        $problem = $_REQUEST['problem'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO patient (patientid,Name,Age,gender,phoneno,address,problem)  VALUES ('$name',
            '$age','$gender','$ph','$address','$problem')"; 

          
        if(mysqli_query($conn, $sql)){
            $last_id = $conn->insert_id;
            echo "<h3>patient details are  stored in a database successfully</h3>";
     echo "<section>";      
    echo"<div class='card' style='border-radius: 1rem;'>";
    echo"<table height=300>";
    echo"<b>";
    echo"<tr>";
    echo"<td><b>patientid:</b></td>";
    echo "<td><b>$last_id</b></td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><b>Name:</b></td>";
    echo "<td><b>$name</b></td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><b>age:</b></td>";
    echo "<td><b>$age</b></td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><b>gender:</b></td>";
    echo "<td><b>$gender</b></td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td> <b>address:</b></td>";
    echo "<td><b>$address</b></td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><b>problem:</b></td>";
    echo "<td><b>$problem</b></td>";
    echo"</tr>";
    echo"</b>";
    echo"</table>";
    echo"</div>";
    echo "<section>";  
           
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        $sql1 ="INSERT INTO medecine (pid) values('$last_id')" ;
        $result1 = $conn->query($sql1);
        // Close connection
        mysqli_close($conn);
        ?><br>
   