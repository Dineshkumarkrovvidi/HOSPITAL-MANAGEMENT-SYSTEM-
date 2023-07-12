<html>
    <head><title>NEW register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="background.css">  
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
        input,textarea{
  padding:10px 50px 0px 20px;
   margin:8px;
   align-items: center;
   font-size:18px;
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
    <body style="align-items: center;">
    <section class="login">
        <div class="card" style="border-radius: 1rem;">
        
        <form method="post" action="patientdetails.php">
            
                
                <b><label>patient name</label><br></b>
                <input type="text" name="name"><br>
                <b><label>patient age</label><br></b>
                <input type="number" name="age"><br>
                <b><label>gender</label></b>
                <td><input type="radio" name="gender" value="male">male<input type="radio" name="gender" value="female">female</td><br>
                <b><label>phoneno</label><br></b>
                <input type="number" name="ph"><br>
                <b><label>patientAddress</label><br></b>
                <input type="textarea" name="address"><br>
                <b><label>patient problem</label></b><br>
                <textarea name="problem"></textarea><br>
                <input type="submit" id="n1">
             

        </form>
        </div>
</section>
    </body>
</html>