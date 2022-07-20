<?php

$usn = $_POST['usn'];
$date = $_POST['date'];
$Period = $_POST['Period'];
$subject = $_POST['subject'];
$section = $_POST['section'];

$changeTo = $_POST['changeTo'];

$con = mysqli_connect("localhost","root","",);
                                
mysqli_select_db($con,"test");

if($changeTo == "absent"){
$query = "delete from Attendance where Date = '$date' and usn = '$usn' and Period = $Period and subject = '$subject' and section = '$section'";
}else{
    $query = "insert into Attendance values ('$date','$usn',$Period,'$subject','$section')";
}




if($con->query($query) === TRUE) {
    echo "s";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  $con->close();