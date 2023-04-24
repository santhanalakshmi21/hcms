<?php
$Name = $_POST['Name'];
$Phoneno = $_POST['Phoneno'];               
$Age  = $_POST['Age'];
$Place = $_POST['Place'];
$detail=$_POST['techno'];  
$chk="";  
foreach($detail as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

$conn = new mysqli('localhost','root','','hcms');
if($conn->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
}
else {
    $stmt = $conn->prepare("insert into information(Name,Phoneno,Age,Place,detail)
                           values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$Name,$Phoneno,$Age,$Place,$chk);
    $stmt->execute();
    $stmt->close();
    $conn->close();
  
}

if(isset($_POST['submit'])){
    $detail=$_GET['techno']; 
    if($chk1=='Bed'){
        header("Location:bed.php");
    }
    elseif($chk1=='Oxygen Cylinder'){
        header("Location:o2.php");
    }
else{
    header("Location:both.php");
}
}

?>