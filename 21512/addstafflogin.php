
    <?php
        $conn = mysqli_connect("localhost","root","","hospital");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['use'];
        $pwd = $_REQUEST['pwd'];
       
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO stafflogin VALUES ('$name',
            '$pwd')"; 
        if(mysqli_query($conn, $sql)){
            header("location:staffdetails.php");
            
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
   