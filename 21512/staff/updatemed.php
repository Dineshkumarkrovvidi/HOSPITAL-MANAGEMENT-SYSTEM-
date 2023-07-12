<html>
    <head>
    <link rel="stylesheet" href="background.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
             .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  width:30%;
  transition: 0.5s;
  background-color: transparent;
 
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
        input{
  padding:10px 50px 0px 10px;
   margin:8px;
   align-items: center;
   font-size:18px;
   width: 300;
 }
 textarea{
  padding:10px 50px 0px 10px;
   margin:8px;
   align-items: center;
   font-size:18px;
   width: 300;
   height:300;
 }
        div{
    
   margin:0;
   padding:10px;
   width:fit-content;
   display: flex;
   height: fit-content;
   background-color: antiquewhite;
   text-align: center;
}
        section.login{
   display: flex;
   justify-content: center;
    align-items: center;

 }

#n1:hover{
   background-color: green;
}

          </style>
    </head>
    <body>
    <?php
error_reporting(0);
 $conn = mysqli_connect("localhost","root","","hospital");
 if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
session_start();      
$pid=$_SESSION['pid'];
$sql = "SELECT Patientid, Name FROM patient where patientid='$pid'";
$result = $conn->query($sql);
$sql1 = "SELECT medicine FROM medecine where pid='$pid'";
$result1 = $conn->query($sql1);

      while($row = $result->fetch_assoc()) {
        ?>
          <section class="login">
            <div class="card" style="border-radius: 1rem;">
            <form >
                <label><b>patientid:</b></label><br>
                <input type="text" name="id" value="<?php echo"$row[Patientid]"?>"readonly><br>
                <lable><b>patient Name</b></label><br>
                <input type="text" name="id" value="<?php echo"$row[Name]"?>"readonly><br>
                <label>medicine</label><br>
                <?php
      }    
      if ($result1->num_rows > 0) {
       while($row1 = $result1->fetch_assoc()) {   
        ?> 
            <textarea value="<?php echo"$row1[medicine]"?>" name="med"><?php echo"$row1[medicine]"?></textarea><br>  
                <?php
      }    
    }
      else{
        ?>
        <textarea value="" name="med"></textarea><br>  
                <?php
      }
      ?> 
      
               <button type="submit" id="n1" onclick="alert(' details are saved')">submit</button>
             </form>
</div>
</section>
      
</body>

<?php
$med=$_REQUEST['med'];
$sql2= "UPDATE medecine set medicine='$med',date=curdate() where pid='$pid'"; 
mysqli_query($conn, $sql2);
mysqli_close($conn);
?>