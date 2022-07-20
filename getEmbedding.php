<?php

$con = mysqli_connect("localhost","root","",);
                                
mysqli_select_db( $con,"test");

$sql = "select * from studentFaceEmbedding";

$allEbeddings = mysqli_query($con,$sql);

if(mysqli_num_rows($allEbeddings) == 0) {
    echo "f";

}else{
    $rows = array();
    while($r = mysqli_fetch_assoc($allEbeddings)) {
    $rows[] = $r;
}
    $json = json_encode($rows);
    print_r($json);
}
