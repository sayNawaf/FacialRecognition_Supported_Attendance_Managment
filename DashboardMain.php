
<?php
function PercentArray($a1,$a2){
  $lenght = count($a1);
  $a3 = [];
  for($i = 0;$i < $lenght;$i++){
    $percent = ($a1[$i]/$a2)*100;
    array_push($a3,$percent);
  }
  return $a3;
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
 $connection = mysqli_connect('localhost','root','');

 mysqli_select_db( $connection,"test");
 $result = mysqli_query( $connection,"SELECT usn  FROM Attendance  where  Date = '2022-05-05' and Period = 1"); 
 $usn = mysqli_query($connection,"SELECT * FROM StudentDetail");
 $usn2 = mysqli_query($connection,"SELECT * FROM StudentDetail");
 $usnlist =  mysqli_query($connection,"SELECT usn FROM StudentDetail");
 
 

 $attendancePerUsn = [];
 while($usnList = mysqli_fetch_assoc($usnlist)){
   
 
 $totalAttendance1 = mysqli_query($connection,"SELECT count(usn) FROM `Attendance` where usn = "."'" .$usnList["usn"]."'" ."");
 $totalAttendance1 = mysqli_fetch_all($totalAttendance1);
 
 array_push($attendancePerUsn,(int)$totalAttendance1[0][0]);


 }

 
 $Attendedusn = mysqli_fetch_all($result);
$AttendedCount = count($Attendedusn);

$totalAttendance1 = mysqli_query($connection,"SELECT count(DISTINCT Date) FROM `Attendance` group by Period order by period asc");
$totalAttendance1 = mysqli_fetch_all($totalAttendance1);
$q = 0;
$arr = [];
while($q < count($totalAttendance1)){
 array_push($arr,(int)$totalAttendance1[$q][0]);
 $q += 1;
}
 $totalClass = array_sum($arr);

 $AttendancePercent = PercentArray($attendancePerUsn,$totalClass);
 

 $date = '2022-05-05';
 ?>


 
 
   
  






 <!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

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
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <span
                  class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.html">Attendance Manager</a></li>
                <li><a href="course-detail.html">Attende</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mark Attendance<span
                  class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="ManualAttendance.php">Manual</a></li>
                <li><a href="blog-single.html">Facial Recognition</a></li>
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
            <li><a href="DashboardMain.html">Dashboard</a></li>
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
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
              <h2>Dashboard</h2>
              <ol class="breadcrumb">
                <li ><a class="active" href="">Home</a> </li>
                <li class=""><a href="">Attendance Table</a></li>
                <li class=""><a href="">Profiles</a> </li>


              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End breadcrumb -->

    <!-- Example single danger button -->







    <!-- end side abr -->


    <!-- <div class="row align-item p-6"> -->
    <section class="main sec">
      <div class="head">


        <div class="main-top">
          <h1>Attendance</h1>
          <i class="fas fa-user-cog"></i>
        </div>
        <div class="dropdowns">
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
     
      <div class="users">
      <?php
$j = 0;
 while($detail = mysqli_fetch_assoc($usn2)):
  $j++;
  if ($j == 6){
    break;
  }
?> 
        <div class="card">
          <img src="./pic/img1.jpg">
          <h4><?= $detail["name"] ?></h4>
          <p><?= $detail['usn'] ?></p>
          <div class="per">
            <table>
              <tr>
                <td><span><?= number_format((float)$AttendancePercent[$j], 1, '.', '') ?></span></td>
                <td><span><?= number_format((float)$AttendancePercent[$j], 1, '.', '') ?></span></td>
              </tr>
              <tr>
                <td>Month</td>
                <td>Sem</td>
              </tr>
            </table>
          </div>
          <button>Profile</button>
        </div>
        <?php endwhile; ?>
        </div>
      
        <section class="attendance">
        <div class="attendance-list">
        <h1>Attendance List</h1>
          <table class="table2" style = "width: 100%;">
            <thead>
              <tr>
                <th>Date</th>
                <th>Name</th>
                <th>USN</th>
                <th>Status</th>
                <th>Total Attendance</th>

              </tr>
            </thead>
            <tbody>
            <?php
 while($allArray = mysqli_fetch_assoc($usn)):
$i = 0;
$att = "Absent";
$active = "active";

?> 

<?php
while($i < $AttendedCount){

  if ($allArray['usn'] == $Attendedusn[$i][0]){
  
    $att = "Present";
    $active = "";
    break;
  }
  $i = $i+1;
  }

?>



<tr class = <?= $active ?> >
 
<td> <?= $date; ?> </td>

<td> <?= $allArray['name']; ?> </td>

<td> <?= $allArray['usn']; ?> </td>

<td > <?= $att ?> </td>

<td > <?= number_format((float)$AttendancePercent[$i]); ?> %</td>

</tr>

<?php endwhile; ?>
            




  
  
  
        
              
            </tbody>
          </table>
        </div>
      
      </section>
    </section>

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

</html> 