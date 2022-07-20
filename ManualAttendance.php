


<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manual Mark</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

  <!-- Font awesome -->
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <!-- Fancybox slider -->
  <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" />
  <!-- Theme color -->
  <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

  <!-- Main style sheet -->
  <link href="assets/css/style.css" rel="stylesheet">


  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet'
    type='text/css'>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
            function colorChange(id)
            {   var data = new FormData();
                var flag = 0;
                var para = id.split("#");
                
                data.append('usn',para[0]);
                data.append('date',para[1]);
                data.append('Period',para[2]);
                var property = document.getElementById(id);
                //alert(property.style.backgroundColor);
                if(property.style.backgroundColor == "rgb(127, 255, 0)"){
                    data.append('changeTo','absent');
                    property.style.backgroundColor = "rgb(255, 0, 0)";
                    property.innerHTML  = 'Absent';
                    flag = 1;
                    
                }
                else if(property.style.backgroundColor == "rgb(128, 128, 128)"){
                    window.location.replace("http://localhost/Varsity/AttendanceMark.php");
                    return false;
                }
                else{
                    data.append('changeTo','present');
                    flag = 2;
                    property.style.backgroundColor = "rgb(127, 255, 0)";
                    property.innerHTML  = 'Present';
                    
                }
                
   

                var xhr = new XMLHttpRequest();
                xhr.open("POST","http://localhost/Varsity/changeStatus.php?q=",true);
                xhr.onload = function(){
                    if (flag == 1){
                    property.style.backgroundColor = "rgb(255, 0, 0)";
                    property.innerHTML  = 'Absent';
                    console.log(this.response);
                    }
                    else{
                    property.style.backgroundColor = "rgb(127, 255, 0)";
                    property.innerHTML  = 'Present';
                    console.log(this.response);
                    }
                }
                console.log("sendingg");
                
                xhr.send(data);

for (var key of data.entries()) {
        console.log(key);
    }
                return false;

            }



// $.ajax({
//     type:     "post",
//     data:      {"usn":"fg"},
//     cache:    false,
    
//     url:      "changeStatus.php",
//     dataType: 'text',
//     error: function (request, error) {
//         console.log(arguments);
//         alert(" Can't do because: " + error);
//     },
//     success: function () {
//         alert(" Done ! ");
//     }
// });
//          return false;   }
//         </script>

</head>


<body>

  <!--START SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start menu -->
  <section id="mu-menu" class=>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>Attender</span></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li ><a href="index.html">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <span
                  class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.html">Attendance Manager</a></li>
                <li><a href="course-detail.html">Attende</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="active" href="#" class="dropdown-toggle" data-toggle="dropdown">Mark Attendance<span
                  class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="ManualAttendance.php">Manual</a></li>
                <li><a href="facialRecognition.html">Facial Recognition</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendance record<span
                  class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="blog-archive.html">Today's</a></li>
                <li><a href="blog-single.html">All Data</a></li>
              </ul>
            </li>

            <li><a href="contact.html">Contact</a></li>
            <li><a href="DashboardMain.php">Dashboard</a></li>
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
            
            
            <li style = "padding-left:60px;" ><a href="login.html">Log In</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
  <div class="">

    <!-- Page breadcrumb -->
   <section id="mu-page-breadcrumb">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mu-page-breadcrumb-area">
              <h2>Manual Attendance Marker</h2>
              <ol class="breadcrumb">
                <li ><a class="active" href="ManualAttendance.php">Manual Range Marker</a> </li>
                <li ><a href="AttendanceMark.php">Manual Marker</a> </li>
                <li ><a href="facialRecognition.php">Facial Recognition Marker</a></li>
                


              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End breadcrumb -->

   <!-- <div class="row align-item p-6"> -->
   
      

            <section class="main sec">
      <div class="head">


        <div class="main-top">
          <h1>Marker</h1>
          <i class="fas fa-user-cog"></i>
        </div>
        <div class="dropdowns2">
          <div class="dropdownSem">
            <button class="dropbtn">Subject</button>
            <div class="dropdownSem-content" id = "subjectList">
              
              <script>
                  subjects = JSON.parse(sessionStorage.getItem("subjects"));
                 
                  for(let i = 0;i < subjects.length;i++){
                  var a = document.createElement('a');
                  console.log(subjects[i]);
                  var link = document.createTextNode(subjects[i]);
                  a.appendChild(link);
                  a.href = "#";
                  document.getElementById("subjectList").appendChild(a);  
                  }
            </script>
            </div>
          </div>

          <div class="dropdownSem">
            <button class="dropbtn">Section</button>
            <div class="dropdownSem-content">
              <a href="#">A</a>
              <a href="#">B</a>
            </div>

          </div>
        </div>
      </div>
                <div class="card mt-5">
                    
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="card mt-4">
                    <div class="card-body"> -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>USN</th>
                                    <th>Name</th>
                                    
                                
                            
                            <?php 
                                
                                $con = mysqli_connect("localhost","root","",);
                                
                                mysqli_select_db( $con,"test");
                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                    
                                    $query = "SELECT s.usn,s.name,a.Date,a.Period FROM StudentDetail s,Attendance a WHERE Date BETWEEN '$from_date' AND '$to_date' and s.usn = a.usn";
                                    $query2 = "select Date,max(Period1),max(Period2),max(Period3),max(Period4) from (SELECT Date, case when Period = 1 THEN 1 else 0 end as Period1, case when Period = 2 THEN 1 else 0 end as Period2, case when Period = 3 THEN 1 else 0 end as Period3, case when Period = 4 THEN 1 else 0 end as Period4 from Attendance) AS t1 GROUP by Date";
                                    $query3  = "select usn,name from StudentDetail";
                                    $query_run = mysqli_query($con, $query);
                                    $query2_run = mysqli_query($con, $query2);
                                    $usn = mysqli_query($con, $query3);
                                    
                                    $maxPeriodDict = [];
                                    $attendedDates = [];
                                    foreach($query2_run as $row){
                                        $periods = [];
                                        if ($row["max(Period1)"] == 1){
                                            
                                            array_push($periods,1);
                                        }
                                        
                                        if ($row["max(Period2)"] == 1){
                                            
                                            array_push($periods,2);
                                        }
                                        if ($row["max(Period3)"] == 1){
                                            array_push($periods,3);
                                        }
                                        if ($row["max(Period4)"] == 1){
                                            array_push($periods,4);
                                        }
                                        array_push($attendedDates,$row["Date"]);
                                        $maxPeriodDict[$row["Date"]] = $periods; 
                                    }
                                    
                                    $attendedUsn = [];
                                    foreach($attendedDates as $attendedDate){
                                        $USN = [];
                                        foreach($query_run as $attendance){
                                            if($attendance['Date'] == $attendedDate){
                                                array_push($USN,$attendance['usn']);
                                        }
                                    }
                                        $attendedUsn[$attendedDate] = array_unique($USN);

                                    }

                                    
                                    
                                    if($from_date <= $to_date)
                                    {
                                        $date = $from_date;
                                            while($date != $to_date):
                                                
                                            ?>
                                            <th colspan = "4"> <?= $date ?> </th>
                                            <?php $date = strftime("%Y-%m-%d", strtotime("$date +1 day")); ?>
                                            <?php endwhile; ?>
                                            </tr>
                                            <thead>
                                            <tbody>
                                            <?php
                                        $count = 0;
                                        foreach($usn as $row)
                                        
                                        {   
                                        ?>
                                        
                                        <tr>
                                        <td > <?= $row['usn'] ?> </td>
                                        <td > <?= $row['name'] ?> </td>
                                        <?php
                                            
                                            $date = $from_date;
                                            
                                        while($date != $to_date){
                                            
                                            for($j = 0;$j<4;$j++){
                                                
                                                if(!in_array($date,$attendedDates)){
                                                    $count++;
                                                    $status ="Take<br>Attendance";
                                                    $color="#808080";
                                                    
                                                    
                                                }
                                                elseif(in_array($row['usn'],$attendedUsn[$date]) AND in_array($j+1,$maxPeriodDict[$date]) ){
                                                    $count++;
                                                    $status ="Present";
                                                    $color="#7FFF00";
                                                    
                                                }
                                                elseif(!in_array($row['usn'],$attendedUsn[$date]) AND in_array($j+1,$maxPeriodDict[$date]) ){
                                                    $count++;
                                                    $status ="Absent";
                                                    $color="#FF0000";
                                                    
                                                }

                                                elseif(in_array($row['usn'],$attendedUsn[$date]) AND !in_array($j+1,$maxPeriodDict[$date]) ){
                                                    $count++;
                                                    $status ="Take<br>Attendance";
                                                    $color="#808080";
                                                    
                                                }

                                                elseif(!in_array($row['usn'],$attendedUsn[$date]) AND !in_array($j+1,$maxPeriodDict[$date]) ){
                                                    $count++;
                                                    $status ="Take<br>Attendance";
                                                    $color="#808080";
                                                    
                                                }
                                                
                                                

                                                
                                                
                                                    ?>
                                               
                                        
                                               
                                            <td> <button type="button" id = <?=$row["usn"]."#".$date."#".$j+1?> class="btn-sm" style="background-color:<?=$color?>;" onclick = "colorChange(this.id)"><?= $status ?></button> </td>
                                            
                                            <?php } ?>
                                            
                                            
                                            
                                            <?php $date = strftime("%Y-%m-%d", strtotime("$date +1 day")); ?>
                                            <?php } ?>
                                        
                                            </tr>
                                            <?php
                                    }
                                        
                                        
                                    }
                                    else
                                    {
                                        echo "Date range Doesn't make sense";
                                    }
                                }
                                else{
                                    echo "error";
                                }
                            ?>
                            </tbody>
                        </table>
                    <!-- </div>
                </div> -->

            
    </section>

<!-- <Label> From Date </Label>
<input  type = "date" name = "" max = "" id = "fromDate">

<Label> To Date </Label>
<input  type = "date" name = "" max = "" id = "toDate"> --> 


            
      <!-- </div>  -->
    <!-- jQuery library -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="assets/js/waypoints.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
    <!-- Mixit slider -->
    <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
    <!-- Add fancyBox -->
    <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>


    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>

  </body>