

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
  <script defer src="face-api.min.js"></script>
  <script defer src="facialRecognition.js"></script>
  <script>
    function update(){
     
      var List = JSON.parse(sessionStorage.getItem("detected"));
      const usnList = List.map(name => {
        usn = name.split('-')[0];
	return usn; 
});
      console.log(usnList);
      subject = sessionStorage.getItem("subject");
      section = sessionStorage.getItem("section");
      date = sessionStorage.getItem("date")
      for(i = 0;i<usnList.length;i++){
        var data = new FormData();
      var xhr = new XMLHttpRequest();
      data.append('usn', usnList[i]);
      data.append('date', date);
      data.append('Period', "1");
      data.append('section', section);
      data.append('subject', subject);
      data.append('changeTo',"present");
      xhr.open("POST", "http://localhost/Varsity/changeAttendance.php", true);
      xhr.onload = function() {
        if (this.response == 's') {
          alert("successfully added");
      } else{
        console.log(this.response);
      }
    }
    xhr.send(data);

    }}
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
            <li class="active"><a href="index.html">Home</a></li>
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
                <li><a href="ManualAttendace.html">Manual</a></li>
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
  

    <!-- Page breadcrumb -->
   <section id="mu-page-breadcrumb">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mu-page-breadcrumb-area">
              <h2>Facial Recognition Marker</h2>
              <ol class="breadcrumb">
                <li ><a  href="ManualAttendance.php">Manual Range Marker</a> </li>
                <li ><a href="AttendanceMark.php">Manual Marker</a> </li>
                <li ><a class="active" href="facialRecognition.html">Facial Recognition Marker</a></li>
                


              </ol>
            </div>
          </div>
        </div>
      </div>
    </section> 
    <!-- End breadcrumb  -->

    <section class="main sec">
    <div class="head">

      <!-- <form action="" method="GET"> -->
      <div class="main-top">
        <h1>Facial<Br>Recognition<Br>Marker</h1>
        <i class="fas fa-user-cog"></i>
      </div>



      <div class="dropdowns3">

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
    <?php
if (isset($_GET['Subject']) && isset($_GET['Section']) && isset($_GET['from_date'])) {
  echo '<script> sessionStorage.removeItem("detected");</script>';
  echo '<script> sessionStorage.setItem("subject", "' . $_GET['Subject'] . '");</script>';
  echo '<script> sessionStorage.setItem("section", "' . $_GET['Section'] . '");</script>';
  echo '<script> sessionStorage.setItem("date", "' . $_GET['from_date'] . '");</script>';
  
    ?>
    
    <div id = "vidCont">
  <video id="video" width="720" height="560" autoplay muted></video>
  </div>
  <div>
  <button onclick="update()">Update Attendance</button>
  </div>
<?php }else{
  echo "Please enter section and subject for which u wish to take attendance";
} ?>

</body>
</html>