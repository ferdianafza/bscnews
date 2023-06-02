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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
  <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">HOME</a>
  <a href="index.php#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="index.php#article" onclick="w3_close()" class="w3-bar-item w3-button">ARTICLES</a>
  <a href="index.php#ourcostumers" onclick="w3_close()" class="w3-bar-item w3-button">OUR COSTUMERS</a>
  <a href="index.php#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="index.php#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<div class="w3-container" style="padding:128px 16px" id="ourcostumers">
  <center>
    <a href="creatArticle.php" class="btn btn-primary">Create Article</a>
  </center>
  <br/>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        require 'function.php';
        $sql = "SELECT * FROM articles";
        $result = $conn->query($sql);
        $batas = 8;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
        $previous = $halaman - 1;
        $next = $halaman + 1;
        $jumlah_data = mysqli_num_rows($result);
        $total_halaman = ceil($jumlah_data / $batas);
        $data_laporan = mysqli_query($conn,"SELECT * FROM articles ORDER BY id DESC");
        while($d = mysqli_fetch_array($data_laporan)){
          $tempFile = $d['namaFile'];
          $tempContent = $d['content'];
          $title = $d['title_article'];
          $id = $d['id'];
      ?>
    <tr>
      <th scope="row"><?php echo $id;?></th>
      <td><?php echo $title;?></td>
      <td>
        <?php echo '<p>
          <a href="editArticle.php?id='.$d['id'].'">
            <button class="btn btn-success">Edit
            </button>
          </a>
          <a href="hapusArticle.php?id='.$d['id'].'">
            <button class="btn btn-danger">Hapus
            </button>
          </a>
        </p>';
         ?>
      </td>
    </tr>
    <?php
      }
    ?>
    
    
  </tbody>
</table>
</div>

<!-- Contact Section -->
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
