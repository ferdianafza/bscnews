 <?php    
session_start();
    function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

 ?> 
<!DOCTYPE html>
<html>
<head>
<title>BSCNewspaper-Make Your Project Shared To People</title>
<link rel="icon" type="image/x-icon" href="images/logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/c14d470b61.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="assets/css/index.css">
<style>
  .hdr {
    background: linear-gradient(270deg, black, orange, black);
    background-size: 600% 600%;

    -webkit-animation: AnimationName 30s ease infinite;
    -moz-animation: AnimationName 30s ease infinite;
    animation: AnimationName 30s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}


/* Add a gray background color with some padding */
/*body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}*/

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide"><img src="images/logo.png" width="90" height="40"></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <a href="#article" class="w3-bar-item w3-button">Article</a>
      <a href="#ourcostumers" class="w3-bar-item w3-button"></i>Our Customers</a>
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#pricing" class="w3-bar-item w3-button"> Pricing</a>
      <a href="#contact" class="w3-bar-item w3-button"> Contact Us</a>
      <?php 
      if (isUserLoggedIn()) {
        echo "<a href='manageArticle.php' class='w3-bar-item w3-button'><i class='fa fa-off'></i> Manage Article</a>";
        echo "<a href='logout.php' class='w3-bar-item w3-button'><i class='fa fa-off'></i> Logout</a>";
      }
      ?>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">HOME</a>
  <a href="index.php#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="index.php#article" onclick="w3_close()" class="w3-bar-item w3-button">ARTICLES</a>
  <a href="index.php#ourcostumers" onclick="w3_close()" class="w3-bar-item w3-button">OUR COSTUMERS</a>
  <a href="index.php#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="index.php#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>
<br>
<br>

<!-- Header with full-height image -->
<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <?php
      require ("function.php");
        $id = $_GET['id'];
        $sql = "SELECT * FROM articles WHERE id ='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows < 0)  {
            echo '<script>window.history.back()</script>';
        }else{
          $data = $result->fetch_assoc();
          $title_article = $data['title_article'];
          $content = $data['content'];
          $namaFile = $data['namaFile'];
        }
      ?>
      <h2><?php echo $title_article ?></h2>
      <div class=""><?php echo "<img class='fakeimg' src='terupload/$namaFile' style='' />";?></div>
      <p><?php echo $content; ?></p> 
    </div>
  </div>
  <div class="rightcolumn">
    <!-- <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div> -->
    <div class="card">
      <br/>
      <br/>
      <br/>
      <h3>Other Articles</h3>
      <?php 
        // require 'function.php';
        $sql = "SELECT * FROM articles";
        $result = $conn->query($sql);
        $data_laporan = mysqli_query($conn,"SELECT * FROM articles ORDER BY id DESC LIMIT 4");
        while($d = mysqli_fetch_array($data_laporan)){
          $tempFile = $d['namaFile'];
          $tempContent = $d['content'];
          $title = $d['title_article'];
          $id = $d['id'];
      ?>
      <div class="fakeimg"><?php echo $title;?></div><br>
      <?php 
    }
      ?>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<!-- <div class="bgimg-1 slideshow-container">

      <div class="mySlides fade">
        <img class="image-banner" src="images/banner-pubg.jpg">
        <div class="text"> </div>
      </div>

      <div class="mySlides fade">
        <img class="image-banner" src="images/banner-cod.jpg">
        <div class="text"> </div>
      </div>

      <div class="mySlides fade">
        <img class="image-banner" src="images/banner-ros.jpg">
        <div class="text"> </div>
      </div>

      <div class="mySlides fade">
        <img class="image-banner" src="images/banner-gtav.jpg">
        <div class="text"> </div>
      </div>

      </div>
      <br>

      <div class="down-banner">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span>
      </div> -->

<!-- About Section -->

<!-- Work Section -->

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Skills Section -->

<!-- Pricing Section -->

<!-- Contact Section -->


<!-- Footer -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right" style="color: red;"> </i>BSCNewspaper@mail.com</p>
    <p><i class="fa fa-telegram w3-hover-opacity w3-xxlarge w3-margin-right" style="color: blue;"></i> BSC_Newspaper</p>
    <p><i class="fa fa-twitter w3-hover-opacity w3-xxlarge w3-margin-right" style="color: blue;"></i> BSC_Newspaper</p>
    <br>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>
<script type="text/javascript">
  var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>
