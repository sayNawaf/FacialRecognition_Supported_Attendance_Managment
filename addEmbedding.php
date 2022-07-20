<?php
$usn =  $_POST['usn'];
$name =  $_POST['name'];
$embedding1 =  json_encode($_POST['embedding1']);
$embedding2 =  json_encode($_POST['embedding2']);
$embedding3 =  json_encode($_POST['embedding3']);

$con = mysqli_connect("localhost","root","",);
                                
mysqli_select_db( $con,"test");

$sql = "insert into studentFaceEmbedding values ('$usn','$name','$embedding1','$embedding2','$embedding3')";

if ($con->query($sql) === TRUE) {
    echo "s";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  $con->close();

