<?php
$uname1 = $_POST['uname1'];
$email = $_POST['email'];
$upwsd1 = $_POST['upwsd1'];


if (!empty($uname1)|| !empty($email) || !empty($upwsd1)) {
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "eb";

  //connecting
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
  if (mysqli_connect_error()) {
    die('Connect Error('.mysqli_connect_errno() .')'. mysqli_connect_error());
  }
  else {
    $SELECT = "SELECT email From signup Where email =? Limit 1";
    $INSERT = "INSERT Into signup(uname1, email, upwsd1)values(?,?,?)";

    //preparing statement
  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->num_rows;

  //checing username
    if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $uname1, $email, $upwsd1);
      $stmt->execute();
      echo "New record inserted successfully";
      header ('Location: index.html');
      
    }
    else {
      echo "Email already signed up";
    }
    $stmt->close();
    $conn->close();
  }
}
else {
  echo "Every fields are required";
  die();
}

 ?>
