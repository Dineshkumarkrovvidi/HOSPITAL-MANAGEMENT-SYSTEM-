<html>
    <head>
    <link rel="stylesheet" href="background.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  width:fit-content;
  height: fit-content;
  transition: 0.5s;
  background-color: transparent;
  padding:10px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
 #n1{
    padding:10px 10px 10px 10px;
    text-align: center;
 }
           
 button:hover{
   background-color: darkgreen;
   
   color:wheat;
   cursor: pointer;
   
 }
           section{
   display: flex;
   justify-content: center;
    align-items: center;
 }
          </style>
    </head>
    <body>
          <section>
            <div class="card" style="border-radius: 1rem;">
            <form>
                <label><b>patientid:</b></label>
                <input type="text" name="id" id="n1"><br>
                <ul>
                <tr><h2>SCANNING</h2></tr>
                <tr><li><input type="checkbox" onclick="fun1();" id="a">MRL Scanning     </input><span id="msg1" style="color:red"></span></li></td>
                <tr><li><input type="checkbox"onclick="fun2();" id="b">CITY Scanning     <span id="msg2" style="color:red"></span></li></tr>
                <tr><li><input type="checkbox" onclick="fun3();" id="c">X-RAY      <span id="msg3" style="color:red"></span></li></tr>
                <tr><li><input type="checkbox" onclick="fun4();" id="d">ECG        <span id="msg4" style="color:red"></span></li></tr>
                <tr><h2>BLOOD TEST</h2></tr>
                <tr><li><input type="checkbox" onclick="fun5();" id="e">SUGUR Test   <span id="msg5" style="color:red"></span></input></li></tr>
                <tr><li><input type="checkbox" onclick="fun6();" id="f">URIN Test    </input><span id="msg6" style="color:red"></span></li></tr><span id="msg3" style="color:red">
               </ul>
                Toalamount:<input type="text" name="fee" id="msg7"><br>
                <p style="color:red">if you click submit buuton you don't change anything</p><br>
               <button type="submit" onclick="alert('Test details are saved')">submit</button>
             </form>
</div>
</section>

</body>
<script>
    var t=0;
    function fun1(){
        
        document.getElementById("msg1").innerHTML="2000";
        fa = document.getElementById('a');
       if (fa.checked == true){
               t+=2000;
               document.getElementById("msg7").setAttribute('value',t);
            }
            else{
                t-=2000;
                document.getElementById("msg7").setAttribute('value',t);
            }
        
        return flase;
    }
    function fun2(){
       
    document.getElementById("msg2").innerHTML="2200/-";
    fa = document.getElementById('b');
       if (fa.checked == true){
            t+=2200;
            document.getElementById("msg7").setAttribute('value',t);
            }
            else{
                t-=2200;
                document.getElementById("msg7").setAttribute('value',t);
            }
    return flase;
    }
    function fun3(){
    
    document.getElementById("msg3").innerHTML="1200";
    fa = document.getElementById('c');
       if (fa.checked == true){
            t+=1200;
            document.getElementById("msg7").setAttribute('value',t);
            }
            else{
                t-=1200;
                document.getElementById("msg7").setAttribute('value',t);
            }
    return flase;
    }
    function fun4(){
    
    document.getElementById("msg4").innerHTML="1000";
    fa = document.getElementById('d');
       if (fa.checked == true){
            t+=1000;
            document.getElementById("msg7").setAttribute('value',t);
            }
            else{
                t-=1000;
                document.getElementById("msg7").setAttribute('value',t);
            }
    return flase;
    }
    function fun5(){
    document.getElementById("msg5").innerHTML="500";
    fa = document.getElementById('e');
       if (fa.checked == true){
            t+=500;
            document.getElementById("msg7").setAttribute('value',t);
            }
            else{
                t-=500;
                document.getElementById("msg7").setAttribute('value',t);
            }
    return flase;
    }
    function fun6(){
   
    document.getElementById("msg6").innerHTML="500";
    fa = document.getElementById('f');
       if (fa.checked == true){
            t+=500;
            document.getElementById("msg7").setAttribute('value',t);
            }
            else{
                t-=500;
                document.getElementById("msg7").setAttribute('value',t);
            }
    return flase;
    }
    
    
    </script>

</html> 
<?php
error_reporting(0);
 $conn = mysqli_connect("localhost","root","","hospital");
 if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$fee=$_REQUEST['fee'];
$id=$_REQUEST['id'];
$sql = "UPDATE patient set bill=(bill + '$fee'),totalfee=(totalfee + '$fee') where patientid='$id'"; 
mysqli_query($conn, $sql);
mysqli_close($conn);
?>