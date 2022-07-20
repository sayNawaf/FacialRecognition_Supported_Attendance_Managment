<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attender | Home</title>

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
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script>
    var section;
    subject = JSON.parse(sessionStorage.getItem("subjects"))[0];
    date = "2022-05-05";

    function setSubject(id) {
      var property = document.getElementById(id);
      subject = property.value;
    }

    function getSelectValueSub(id) {
      subject = document.getElementById(id).value;
      console.log("inside");
      sessionStorage.setItem("chosenSub", subject);
      console.log(subject);

    }

    function getSelectValueSec(id) {
      section = document.getElementById(id).value;
      console.log("inside");
      sessionStorage.setItem("chosenSec", section);
      console.log(section);

    }

    function colorChange(id) {
      var data = new FormData();
      var flag = 0;
      var para = id.split("#");

      data.append('usn', para[0]);
      data.append('date', para[1]);
      data.append('Period', para[2]);

      var subject = document.getElementById("subjectList").text;
      // var x = document.getElementById("sectionList").selectedIndex;
      // section = document.getElementsByTagName("option")[x].value;     
      // var section = document.getElementById("sectionList").text;
      section = sessionStorage.getItem("chosenSec");
      subject = sessionStorage.getItem("chosenSub");
      console.log(subject);
      console.log(section);
      data.append('section', section);
      data.append('subject', subject);
      var property = document.getElementById(id);
      if (property.style.backgroundColor == "rgb(127, 255, 0)") {
        data.append('changeTo', 'absent');

        flag = 1;

      } else {
        data.append('changeTo', 'present');
        flag = 2;


      }



      var xhr = new XMLHttpRequest();
      xhr.open("POST", "http://localhost/Varsity/changeAttendance.php", true);
      xhr.onload = function() {
        if (this.response == 's') {
          if (flag == 1) {
            property.style.backgroundColor = "rgb(255, 0, 0)";
            property.innerHTML = 'Absent';
          } else {
            property.style.backgroundColor = "rgb(127, 255, 0)";
            property.innerHTML = 'Present';
          }
        } else {
          console.log(this.response);
          alert("could not proccese request at the moment");
        }
      }
      console.log("sendingg");

      xhr.send(data);
    }
  </script>
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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
            <li class="active"><a href="index.html">Home</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <span
                  class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.html">Attendance Manager</a></li>
                <li><a href="course-detail.html">Attende</a></li>
              </ul>
            </li> -->

            <script>
              if (sessionStorage.getItem("profName")) {

                document.write("<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Mark Attendance<spanclass='fa fa-angle-down'></span></a><ul class='dropdown-menu' role='menu'><li><a href='ManualAttendance.php'>Manual</a></li><li><a href='blog-single.html'>Facial Recognition</a></li></ul></li>");
              }
            </script>


            <script>
              if (sessionStorage.getItem("profName")) {

                document.write(" <li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Attendance record<spanclass='fa fa-angle-down'></span></a><ul class='dropdown-menu' role='menu'><li><a href='blog-archive.html'>Today's</a></li><li><a href='blog-single.html'>All Data</a></li></ul></li>");
              }
            </script>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendance record<span
                  class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="blog-archive.html">Today's</a></li>
                <li><a href="blog-single.html">All Data</a></li>
              </ul>
            </li> -->

            <li><a href="contact.html">Contact</a></li>
            <script>
              if (sessionStorage.getItem("profName")) {

                document.write("<li><a href='DashboardMain.php'>Dashboard</a></li>");
              }
            </script>

            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>

            <script>
              if (sessionStorage.getItem("profName")) {
                console.log(sessionStorage.getItem("profName"));
                document.write("<li style = 'padding-left:60px;' onclick = 'LogOut()' ><a href='index.php'>Log Out</a></li>");
              } else {
                console.log(sessionStorage.getItem("profName"));
                console.log(sessionStorage.getItem("profID"));
                document.write("<li style = 'padding-left:60px;' ><a href='login.html'>Log In</a></li>");
              }
            </script>
            <!-- <li style = "padding-left:60px;" ><a href="login.html">Log In</a></li> -->
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


  <!-- Page breadcrumb -->
  <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Manual Attendance Marker</h2>
            <ol class="breadcrumb">
              <li><a href="ManualAttendance.php">Manual Range Marker</a> </li>
              <li><a class="active" href="AttendanceMark.php">Manual Marker</a> </li>
              <li><a href="facialRecognition.php">Facial Recognition Marker</a></li>



            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End breadcrumb -->

  <section class="main sec">
    <div class="head">

      <!-- <form action="" method="GET"> -->
      <div class="main-top">
        <h1>Marker</h1>
        <i class="fas fa-user-cog"></i>
      </div>



      <div class="dropdowns">

        <form action="" method="GET">
          <div class="dropdownSem">

            <button type="submit" class="dropbtn">Confirm</button>
          </div>
          <div class="dropdownSem">
            <div class="card-body">




              <div class="form-group">
                <label>Date</label>
                <input type="date" id="dateInput" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                            echo $_GET['from_date'];
                                                                          } ?>" class="form-control">
              </div>


              <!-- <div class="col-md-4">
                <div class="form-group">
                  <label>Change Date</label> <br>
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>
              </div>
             </div> -->



            </div>
          </div>
          <div class="dropdownSem">
            <button class="dropbtn">Subject</button>

            <div class="dropdownSem-content">
              <select name="Subject" id="subjectList" onchange="getSelectValueSub(this.id)">
                <option value="" selected disabled hidden>Choose Subject</option>
                <script>
                  subjects = JSON.parse(sessionStorage.getItem("subjects"));

                  // for(let i = 0;i < subjects.length;i++){
                  // var a = document.createElement('a');
                  // console.log(subjects[i]);
                  // var link = document.createTextNode(subjects[i]);
                  // a.appendChild(link);
                  // a.href = "#";
                  // a.onclick = "setSubject(this.id)";
                  // document.getElementById("subjectList").appendChild(a);  
                  // }
                  for (let i = 0; i < subjects.length; i++) {
                    var a = document.createElement('option');
                    console.log(subjects[i]);
                    var link = document.createTextNode(subjects[i]);
                    a.appendChild(link);

                    a.value = subjects[i];
                    document.getElementById("subjectList").appendChild(a);
                  }
                </script>
              </select>
            </div>
          </div>

          <div class="dropdownSem">
            <button class="dropbtn">Section</button>
            <div class="dropdownSem-content">
              <select name="Section" id="sectionList" onchange="getSelectValueSec(this.id)">
                <option value="" selected disabled hidden>Choose Section</option>
                <option value="A">A</option>
                <option value="B">B</option>

              </select>
            </div>



          </div>

        </form>
      </div>

      <div class="card mt-5">

        <!-- <div class="card-body">

        <form action="" method="GET">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Date</label>
                <input type="date" id="dateInput" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                            echo $_GET['from_date'];
                                                                          } ?>" class="form-control">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Change Date</label> <br>
                <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div> -->

        <table class="table2" style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>USN</th>
              <th>Name</th>
              <th>Period-1</th>
              <th>Period-2</th>
              <th>Period-3</th>
              <th>Period-4</th>
            </tr>
          </thead>
          <tbody>



            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            $con = mysqli_connect("localhost", "root", "",);

            mysqli_select_db($con, "test");
            if (isset($_GET['from_date'])) {

              $date = $_GET['from_date'];
            } else {
              $date  = "2022-05-05";
              //date("Y/m/d"); 



            }
            if (isset($_GET['Subject']) && isset($_GET['Section']) && isset($_GET['from_date'])) {
              $subject = $_GET['Subject'];
              $section = $_GET['Section'];


              $query = "SELECT s.usn,s.name,a.Date,a.Period FROM StudentDetail s,Attendance a WHERE Date = '$date' and s.usn = a.usn and a.subject = '$subject' and a.section = '$section'";
              $query2 = "select Date,max(Period1),max(Period2),max(Period3),max(Period4) from (SELECT Date, case when Period = 1 THEN 1 else 0 end as Period1, case when Period = 2 THEN 1 else 0 end as Period2, case when Period = 3 THEN 1 else 0 end as Period3, case when Period = 4 THEN 1 else 0 end as Period4 from Attendance where subject = '$subject' and section = '$section') AS t1 GROUP by Date";
              $query3  = "select usn,name from StudentDetail";
              $query_run = mysqli_query($con, $query);
              $query2_run = mysqli_query($con, $query2);
              $usn = mysqli_query($con, $query3);

              $maxPeriodDict = [];
              $attendedDates = [];
              foreach ($query2_run as $row) {
                $periods = [];
                if ($row["max(Period1)"] == 1) {

                  array_push($periods, 1);
                }

                if ($row["max(Period2)"] == 1) {

                  array_push($periods, 2);
                }
                if ($row["max(Period3)"] == 1) {
                  array_push($periods, 3);
                }
                if ($row["max(Period4)"] == 1) {
                  array_push($periods, 4);
                }
                array_push($attendedDates, $row["Date"]);
                $maxPeriodDict[$row["Date"]] = $periods;
              }

              $attendedUsn = [];
              foreach ($attendedDates as $attendedDate) {
                $USN = [];
                foreach ($query_run as $attendance) {
                  if ($attendance['Date'] == $attendedDate) {
                    array_push($USN, $attendance['usn']);
                  }
                }
                $attendedUsn[$attendedDate] = array_unique($USN);
              }




            ?>

              <h1 id="header"><?php echo "Attendance on " . $date . " for " . $subject . " in section " . $section ?></h1>
              <!-- <script>
            var property = document.getElementById('header');
            var e = document.getElementById('subjectList');
            subject = e.options[e.selectedIndex].value;
            console.log("o");
            console.log(subject);
            var e = document.getElementById('sectionList');
            section = e.options[e.selectedIndex].value;
            if (!date) {
              date = "2022-05-05";
            }


            property.innerHTML = "Attendance on " + date + " for " + subject + "in section "+section;
          </script> -->
              <?php
              $count = 0;
              foreach ($usn as $row) {
                $count++;
              ?>

                <tr>
                  <td> <?= $count ?> </td>
                  <td> <?= $row['usn'] ?> </td>
                  <td> <?= $row['name'] ?> </td>
                  <?php




                  if (mysqli_num_rows($query_run) > 0) {
                    for ($j = 0; $j < 4; $j++) {

                      if (!in_array($date, $attendedDates)) {

                        $status = "Take<br>Attendance";
                        $color = "#808080";
                      } elseif (in_array($row['usn'], $attendedUsn[$date]) and in_array($j + 1, $maxPeriodDict[$date])) {

                        $status = "Present";
                        $color = "#7FFF00";
                      } elseif (!in_array($row['usn'], $attendedUsn[$date]) and in_array($j + 1, $maxPeriodDict[$date])) {

                        $status = "Absent";
                        $color = "#FF0000";
                      } elseif (in_array($row['usn'], $attendedUsn[$date]) and !in_array($j + 1, $maxPeriodDict[$date])) {

                        $status = "Take<br>Attendance";
                        $color = "#808080";
                      } elseif (!in_array($row['usn'], $attendedUsn[$date]) and !in_array($j + 1, $maxPeriodDict[$date])) {

                        $status = "Take<br>Attendance";
                        $color = "#808080";
                      }





                  ?>



                      <td> <button type="button" id=<?= $row["usn"] . "#" . $date . "#" . $j + 1 ?> class="btn-sm" style="background-color:<?= $color ?>;" onclick="colorChange(this.id)"><?= $status ?></button> </td>

                    <?php } ?>





                </tr>
                <?php
                  } else {
                    for ($j = 0; $j < 4; $j++) {



                      $status = "Take<br>Attendance";
                      $color = "#808080";

                ?>



                  <td> <button type="button" id=<?= $row["usn"] . "#" . $date . "#" . $j + 1 ?> class="btn-sm" style="background-color:<?= $color ?>;" onclick="colorChange(this.id)"><?= $status ?></button> </td>

          <?php }
                  }
                }
              } else {
                echo "Please select your subject and section for which u wish to view attendance";
              }




          ?>
          </tbody>
        </table>