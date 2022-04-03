<?php

$uname1 = $_POST['uname1'];
$upwsd1 = $_POST['upwsd1'];

$con =  new mysqli("localhost", "root","","eb");
if($con->connect_error){
  die("Failed to connect : ".$con->connect_error);
}
else{
  $stmt = $con->prepare("select * from signup where uname1 = ?");
  $stmt->bind_param("s", $uname1);
  $stmt->execute();
  $stmt_result = $stmt->get_result();
  if($stmt_result->num_rows > 0){
    $data = $stmt_result->fetch_assoc();
    if ($data['upwsd1'] === $upwsd1) {
      header("Location: Home.html");
      die;
    }
    else{
      echo "Invalid password";
      
      
    }
  }
  else {
    echo "Invalid username";
  }
}

 ?>
