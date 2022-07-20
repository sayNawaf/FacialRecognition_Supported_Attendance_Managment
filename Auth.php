<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');


$con = mysqli_connect("localhost","root","",);
                                
mysqli_select_db( $con,"test");
$name = $_POST['name'];
$pass = $_POST['password'];





$profDetail = mysqli_query($con,"SELECT * FROM ProfessorDetail WHERE Name = '$name' and Password = '$pass'");
if(mysqli_num_rows($profDetail) == 0) {
     echo "not found";

} else {
    foreach($profDetail as $row){
        $profID = $row["profID"];
        $profName = $row["Name"];
    }
    $result = mysqli_query($con,"SELECT s.Name FROM SubjectsTaken st,Subjects s WHERE st.profID = '$profID' and st.Code = s.code");
    $arr = [];
    foreach($result as $row){
    $subjectName= $row["Name"];
    array_push($arr,$subjectName);
    
    }
    $responseData["Subjects"] = json_encode($arr);
    $responseData["profID"] = $profID;
    $responseData["profName"] = $profName;
    $jsonData = json_encode($responseData);
    print_r($jsonData);
}
