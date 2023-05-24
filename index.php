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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c14d470b61.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="assets/css/index.css">
<style>
  a:hover{
    list-style-type: none;
    text-decoration: none;
  }
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
<header class="bgimg-1 w3-display-container w3-grayscale-min hdr" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px;">
    <span class="w3-jumbo w3-hide-small" style="color: yellow"><i class="fa-brands fa-bitcoin" style="font-size: 100px;"></i>BSCNewspaper</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium" style="color: yellow"><i class="fa-brands fa-bitcoin" style="font-size: 100px;"></i>BSCNewspaper</span><br>
    <span class="w3-large" style="color: yellow">Stop wasting valuable time with projects that just isn't you.</span>

    <p><a href="#pricing" class="w3-button w3-red w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Pricing</a></p>
  </div> 
</header>

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
<div class="w3-container" style="padding:128px 16px; background-color: black;" id="about">
  <!-- <div class="alert alert-primary" role="alert" style="width: 100%;"> -->
      <?php 
    require 'function.php';
    $bitcoinPrice = (int)getCryptoPrice('BTC');
    $bnbPrice = (int)getCryptoPrice('BNB');
    $ethPrice = (int)getCryptoPrice('ETH');
    $xlmPrice = getCryptoPrice('XLM');
    $dogePrice = getCryptoPrice('DOGE');
    $trxPrice = getCryptoPrice('TRX');
  ?>
  <marquee style="color: yellow;"><b><?php echo "BTC: $".$bitcoinPrice." BNB: $".$bnbPrice." ETH: $".$ethPrice." XLM: $".number_format($xlmPrice,4)." DOGE: $".number_format($dogePrice,4)." TRX: $".number_format($trxPrice,4);?></b></marquee>
    <!-- </div> -->
  <h3 class="w3-center" style="color: white;">BSCNewspaper</h3>
  <p class="w3-center w3-large"style="color: white;">Welcome to BSC Newspaper, the premier media platform dedicated to providing comprehensive coverage of Decentralized Finance (DeFi) on the BNBCHAIN.

As the leading authority in the space, we strive to deliver timely and accurate news, analysis, and insights to keep you informed about the latest developments and trends in the world of DeFi. Our team of expert writers and researchers work tirelessly to bring you exclusive interviews, in-depth articles, and thought-provoking editorials that shed light on the innovative projects and game-changing ideas driving the BNBCHAIN ecosystem.

Whether you're a seasoned DeFi enthusiast or just beginning your journey, BSC Newspaper is your go-to source for up-to-date information on decentralized lending and borrowing, yield farming, liquidity mining, decentralized exchanges, and much more. Our comprehensive coverage spans across projects, protocols, token launches, and market trends, ensuring that you stay ahead of the curve and make informed decisions.

Join our community of like-minded individuals, industry leaders, and passionate DeFi enthusiasts as we explore the limitless possibilities of DeFi on the BNBCHAIN. Subscribe to our newsletter, engage in lively discussions on our forums, and follow us on social media to stay connected and be part of the decentralized finance revolution.

Trust BSC Newspaper to be your trusted guide in navigating the ever-evolving landscape of DeFi on the BNBCHAIN. Together, let's unlock the true potential of decentralized finance!</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa-solid fa-share-nodes" style="font-size: 75px; color: orange;"></i>
      <p class="w3-large"style="color: white;">Shared</p>
      <p style="color: white;">we help you to spread your project into crypto scope that will make many users interested.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa-solid fa-rectangle-ad" style="font-size: 75px; color: orange;"></i>
      <p class="w3-large" style="color: white;">advertising</p>
      <p style="color: white;">We have hundreds of thousands of members who will definitely be interested in the advertisements we display, such as in our telegram community, fanspage and our various social media.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa-solid fa-people-arrows" style="font-size: 75px; color: orange;"></i>
      <p class="w3-large" style="color: white;">introduce</p>
      <p style="color: white;">we always introduce your products with the best tactics so that many target readers are interested in participating in the project</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo" style="font-size: 75px; color: orange;"></i>
      <p class="w3-large" style="color: white;">Build</p>
      <p style="color: white;">By increasing the community, the project will grow greatly, because we believe that behind a great project there is a strong community, that is the basis for how influential a community is..</p>
    </div>
  </div>
</div>

<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px" id="ourcostumers">
  <h3 class="w3-center">Our Costumers</h3>
  <!-- <p class="w3-center w3-large">The ones who runs this company</p> -->
  <div class="w3-row-padding " style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/cointiger.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Cointiger</h3>
          <!-- <p class="w3-opacity">CEO & Founder</p> -->
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <!-- <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p> -->
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/passimpay.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Passimpay</h3>
          <!-- <p class="w3-opacity">CEO & Founder</p> -->
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <!-- <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p> -->
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/mcrt.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>MCRT</h3>
          <!-- <p class="w3-opacity">CEO & Founder</p> -->
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <!-- <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p> -->
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/unidef.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>unidef</h3>
          <!-- <p class="w3-opacity">CEO & Founder</p> -->
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <!-- <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p> -->
        </div>
      </div>
    </div>
  </div>
  <div class="w3-row-padding " style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/gamium.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Gamium</h3>
          <!-- <p class="w3-opacity">CEO & Founder</p> -->
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <!-- <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p> -->
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/xact.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Xact</h3>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/xact.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Xact</h3>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/xact.png" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Xact</h3>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w3-container" style="padding:128px 16px" id="article">
  <h3 class="w3-center">Articles</h3>
  <!-- <p class="w3-center w3-large">The ones who runs this company</p> -->
  <!-- <div class="w3-row-padding " style="margin-top:64px"> -->
    <div class="row row-cols-6">
      <?php
        // require 'function.php';
        $sql = "SELECT * FROM articles";
        $result = $conn->query($sql);
        $batas = 8;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
        $previous = $halaman - 1;
        $next = $halaman + 1;
        $jumlah_data = mysqli_num_rows($result);
        $total_halaman = ceil($jumlah_data / $batas);
        $data_laporan = mysqli_query($conn,"SELECT * FROM articles ORDER BY id DESC LIMIT $halaman_awal, $batas");
        while($d = mysqli_fetch_array($data_laporan)){
          $tempFile = $d['namaFile'];
          $tempContent = $d['content'];
          $title = $d['title_article'];
          $id = $d['id'];
      ?>
      <div class="col-3">
        <div class="card">
          <?php echo "<img class='card-img-top' src='terupload/$tempFile' style='width: 100%' />";?>
            <div class="card-body">
              <h5 class="card-title"><a href="article.php?id=<?php echo $id; ?>" style="color: black;" ><?php echo $title; ?></a>
              </h5>
              <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
      </div>
      <!-- <div class="col-3">1 of 6</div> -->
    <?php
      }
    ?>
    </div>
  </div>
</div>
<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-padding-64" style="background-color: black;">
  <div class="w3-quarter" style="color: yellow;">
    <span class="w3-xxlarge">14+</span>
    <br>Partners
  </div>
  <div class="w3-quarter" style="color: yellow;">
    <span class="w3-xxlarge">55+</span>
    <br>Projects Done
  </div>
  <div class="w3-quarter" style="color: yellow;">
    <span class="w3-xxlarge">89+</span>
    <br>Happy Clients
  </div>
  <div class="w3-quarter" style="color: yellow;">
    <span class="w3-xxlarge">150+</span>
    <br>Meetings
  </div>
</div>

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
<div class="w3-container w3-center " style="padding:128px 16px; background-color: black;" id="pricing">
  <h3 style="color: yellow;">PRICING</h3>
  <p class="w3-large" style="color: yellow">Choose a pricing plan that fits your needs.</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-xlarge w3-padding-32" style="background-color: yellow;">Basic</li>
        <li class="w3-padding-16" style="background-color: #d7d3d3;"><b>5 Days</b> Pinned Message</li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>Published on <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BSC_Newspaper </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>Published on <i class="fa fa-twitter w3-hover-opacity" style="color: blue;"></i> BSC_Newspaper </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>x1 Mass Message to <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BNBBank_Bot users </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>5 Days advertisment on <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BNBBank_Bot button </b></li>
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa-solid fa-dollar-sign" style="color: green;"></i>200</h2>
        </li>
      </ul>
    </div>
    <div class="w3-third">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-xlarge w3-padding-32" style="background-color: yellow;">Pro</li>
        <li class="w3-padding-16" style="background-color: #d7d3d3;"><b>30 Days</b> Pinned Message</li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>Published on <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BSC_Newspaper </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>Published on <i class="fa fa-twitter w3-hover-opacity" style="color: blue;"></i> BSC_Newspaper </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>x5 Mass Message to <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BNBBank_Bot users </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>30 Days advertisment on <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BNBBank_Bot button </b></li>
          <h2 class="w3-wide"><i class="fa-solid fa-dollar-sign" style="color: green;"></i>600</h2>
        </li>
      </ul>
    </div>
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-xlarge w3-padding-32"style="background-color: yellow;">Premium</li>
        <li class="w3-padding-16" style="background-color: #d7d3d3;"><b>10 Days</b> Pinned Message</li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>Published on <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BSC_Newspaper </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>Published on <i class="fa fa-twitter w3-hover-opacity" style="color: blue;"></i> BSC_Newspaper </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>x2 Mass Message to <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BNBBank_Bot users </b></li>
        <li class="w3-padding-16"style="background-color: #d7d3d3;"><b>10 Days advertisment on <i class="fa fa-telegram w3-hover-opacity" style="color: blue;"></i> BNBBank_Bot button </b></li>
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa-solid fa-dollar-sign" style="color: green;"></i>400</h2>
        </li>
      </ul>
    </div>
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
