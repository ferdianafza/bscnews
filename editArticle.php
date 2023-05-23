 <?php    
session_start();
    function isUserLoggedIn() {
    return isset($_SESSION['username']);
}
  if (isUserLoggedIn()) {
      
    } else {
      header("Location: index.php");
      exit;
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
  <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<div class="w3-container" style="padding:128px 16px" id="ourcostumers">
  <h3 class="w3-center">Create Article</h3>
  <!-- <p class="w3-center w3-large">The ones who runs this company</p> -->
  <div class="w3-row-padding " style="margin-top:64px">
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
          $id = $data['id'];
        }
      ?>
    <form action="update-article.php" method="post" enctype="multipart/form-data" id="laporkan" >
    <div class="form-group">
      </div>
      <div class="form-group">
    <label>Input Banner</label>
    <!-- <input type="form-control" type="text" readonly="" name=""> -->
    <input class="form-control" type="file" name="foto" />
      </div>
    <div class="form-group">
      <input type="text" class="form-control" id="exampleInputEmail1" name="id" placeholder="Title Article" style="width: 100%;" value="<?php echo $id;?>" hidden>
      <br/>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="exampleInputEmail1" name="title_article" placeholder="Title Article" style="width: 100%;" value="<?php echo $title_article;?>">
      <br/>
    </div>
    <div class="form-group">
      <textarea class="ckeditor form-control " id="ckedtor" name="content" value="<?php echo $content;?>"></textarea>
    </div>
    <center>
        <input class="btn btn-primary" type="submit" name="tambah" value="Kirim ">
    </center>
  </form>
  </div>
</div>

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right" style="color: white;"></i> Indonesian</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> +62 878-68683722</p>
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
