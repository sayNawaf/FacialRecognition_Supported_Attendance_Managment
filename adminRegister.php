
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
  <script defer src="face-api.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
      async function loadModels() {
        Promise.all([
    faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('./models')
  
]).then(console.log("models loaded"));
}
            async function getEmbedding()
            {   var data = new FormData();
                var usn = document.getElementById('usn').value;
                var name = document.getElementById('name').value;
                var photo1 = document.getElementById('image1');
                var photo2 = document.getElementById('image2');
                var photo3 = document.getElementById('image3');
                image1 = await faceapi.bufferToImage(photo1.files[0]);
                image2 = await faceapi.bufferToImage(photo2.files[0]);
                image3 = await faceapi.bufferToImage(photo3.files[0]);
                const detections1 = await faceapi.detectSingleFace(image1).withFaceLandmarks().withFaceDescriptor()
                const detections2 = await faceapi.detectSingleFace(image2).withFaceLandmarks().withFaceDescriptor()
                const detections3 = await faceapi.detectSingleFace(image3).withFaceLandmarks().withFaceDescriptor()
                //const description = [detections1.descriptor,detections2.descriptor,detections3.descriptor];
                
                data.append('embedding1',detections1.descriptor);
                data.append('embedding2',detections2.descriptor);
                data.append('embedding3',detections3.descriptor);
                
                
                data.append("usn",usn);
                data.append("name",name);
                //data.append("embedding", description);
                var xhr = new XMLHttpRequest();
                xhr.open("POST","http://localhost/Varsity/addEmbedding.php",true);
                xhr.onload = function(){
                    if(this.response == 's'){
                    alert("Student Facial Embedding added successfully.");
                }
            else{
                alert(this.response);
            }};
                xhr.send(data);
                

                return false;

             }

</script>
</head>


<body onload="loadModels()">

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
            <li ><a href="index.php">Home</a></li>
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
              <h2>Register</h2>
              <ol class="breadcrumb">
                <li ><a class="active" href="ManualAttendance.php">Student Photo</a> </li>
                <li ><a href="AttendanceMark.php">Professor</a> </li>
                <li ><a href="facialRecognition.html">Subjects</a></li>
                


              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End breadcrumb -->

    <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Student Photo</h2>
            <p>Register with a minimum of 3 photos for respective Student Usn</p>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                                  
                    
                    
                    <p class="comment-form-url">
                      <label for="subject">USN:<label>
                      <input type="text" name="subject" id = "usn">  
                    </p>
                    <p class="comment-form-url">
                      <label for="subject">Name:<label>
                      <input type="text" name="subject" id = "name">  
                    </p>
                    <p class="comment-form-comment">
                      <label for="comment">Photo-1</label>
                      <input  accept="image/*"  name="upload-photo-1" type="file" id="image1" />
                    </p>
                    <p class="comment-form-comment">
                      <label for="comment">Photo-2</label>
                      <input  accept="image/*"  name="upload-photo-1" type="file" id="image2" />
                    </p>   
                    <p class="comment-form-comment">
                      <label for="comment">Photo-3</label>
                      <input  accept="image/*"  name="upload-photo-1" type="file" id="image3" />
                    </p>               
                    <p >
                      <button onclick = "getEmbedding()">Submit</button>
                    </p>        
                  
                </div>
              </div>
              
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->