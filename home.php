<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "electronics");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }

 if(isset($_GET['prod_id'])){
    $prod_id = $_GET['prod_id'];
    $username = $_SESSION['username'];
    // $query = "SELECT FROM product WHERE id='$prod_id' ";
    // $result = mysqli_query($connect, $query);
    // $row = mysqli_fetch_array($result);

    $query = "INSERT INTO cart(`prod_id`, `username`) VALUES('$prod_id', '$username')";
    mysqli_query($connect, $query);
 }
 ?> 
<!DOCTYPE html>
 
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.1.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.1.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets3/images/1608526896930-277x168.png" type="image/x-icon">
  <meta name="description" content="">
  <!-- <title>Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>   -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
     
  
  
  <title>Home</title>
  <link rel="stylesheet" href="assets3/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets3/tether/tether.min.css">
  <link rel="stylesheet" href="assets3/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets3/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets3/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets3/dropdown/css/style.css">
  <link rel="stylesheet" href="assets3/socicon/css/styles.css">
  <link rel="stylesheet" href="assets3/theme/css/style.css">
  <link rel="preload" as="style" href="assets3/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets3/mobirise/css/mbr-additional.css" type="text/css">
  <style>
  .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
  </style>
</head>
<body>
  
  <section class="menu menu2 cid-sjGRJdS1gL" once="menu" id="menu2-0">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="https://mobiri.se">
                        <img src="assets3/images/1608526896930-277x168.png" alt="Mobirise" style="height: 5.9rem;">
                    </a>
                    
                </span>
               
                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            
         
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black display-7" href="http://index.html">
                            Home</a></li><li class="nav-item"><a class="nav-link link text-black display-7">
                            About us</a></li><li class="nav-item"><a class="nav-link link text-black display-7">
                            Gadget Zone</a></li>
                           
                    
                    <li class="nav-item"><a class="nav-link link text-black display-7" href="https://mobiri.se">Contact Us</a>
                    </li></ul>
                    <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
</section>

<section class="slider1 cid-sjH5Vb2f46" id="slider1-4">
    
    <div class="carousel slide" id="smbcdK8zt4" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-slide-to="0" class="active" data-target="#smbcdK8zt4"></li>
            <li data-slide-to="1" data-target="#smbcdK8zt4"></li><li data-slide-to="2" data-target="#smbcdK8zt4"></li><li data-slide-to="3" data-target="#smbcdK8zt4"></li><li data-slide-to="4" data-target="#smbcdK8zt4"></li>
            
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item slider-image item active">
                <div class="item-wrapper">
                    <img class="d-block w-100" src="assets3/images/maxresdefault.jpg">
                    
                    
                </div>
            </div>
            
            <div class="carousel-item slider-image item">
                <div class="item-wrapper">
                    <img class="d-block w-100" src="assets3/images/pexels-mohi-syed-47261-5472x3648.jpg">
                    
                    
                </div>
            </div><div class="carousel-item slider-image item">
                <div class="item-wrapper">
                    <img class="d-block w-100" src="assets3/images/a7442d32-f379-bd0a-4b22-a262258e2756-1-3500x1971.jpg">
                    
                    
                </div>
            </div><div class="carousel-item slider-image item">
                <div class="item-wrapper">
                    <img class="d-block w-100" src="assets3/images/588526fb6f293bbfae451a3a-1-603x339.png">
                    
                    
                </div>
            </div><div class="carousel-item slider-image item">
                <div class="item-wrapper">
                    <img class="d-block w-100" src="assets3/images/realme-30w-dart-power-bank-india-1-1200x782.jpg">
                    
                    
                </div>
            </div>
        </div>
        <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#smbcdK8zt4">
            <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#smbcdK8zt4">
            <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section class="features15 cid-sjYZWDGpIl" id="features16-a">

    

    
    <div class="container">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="col-12 col-lg">
                    <div class="text-wrapper">
                        <p> </p>
                        <h6 class="card-title mbr-fonts-style display-2">
                             <strong>About Us</strong></h6>
                          
                            
                            
                        <p class="mbr-text mbr-fonts-style mb-4 display-4">Subbu give the content</p>
                        
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="image-wrapper">
                        <img src="assets3/images/1608526896930-806x490.png" alt="Mobirise">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery5 mbr-gallery cid-sjYK1LyRk1" id="gallery5-8">
    

    

    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center m-0 display-2"><strong>Gadget Zone</strong></h3>
            
            
            
        </div>
        <div class="row mbr-gallery mt-4">
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-target="#smbcdMyku8-modal">
                    <img class="w-100" src="assets3/images/0038140-vivo-s1-pro-blue8gb-ram128gb-storage-251-250x250.jpeg" alt="" data-slide-to="0" data-target="#lb-smbcdMyku8">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                <a href="?cat_id=1" class="mbr-item-subtitle mbr-fonts-style align-center mb-2 mt-2 display-7" >Mobiles</a>
            </div><div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-target="#smbcdMyku8-modal">
                    <img class="w-100" src="assets3/images/download-laptop-png-picture-506x321.png" alt="" data-slide-to="1" data-target="#lb-smbcdMyku8">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                <a href="?cat_id=2" class="mbr-item-subtitle mbr-fonts-style align-center mb-2 mt-2 display-7">Laptops</a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-target="#smbcdMyku8-modal">
                    <img class="w-100" src="assets3/images/unnamed-506x392.png" alt="" data-slide-to="3" data-target="#lb-smbcdMyku8">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                <a href="?cat_id=3" class="mbr-item-subtitle mbr-fonts-style align-center mb-2 mt-2 display-7">Television</a>
            </div>
            
            
            
        </div>

        <div class="modal mbr-slider" tabindex="-1" role="dialog" aria-hidden="true" id="smbcdMyku8-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="carousel slide carousel-fade" id="lb-smbcdMyku8" data-interval="5000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="assets3/images/0038140-vivo-s1-pro-blue8gb-ram128gb-storage-251-250x250.jpeg" alt="">
                                </div><div class="carousel-item">
                                    <img class="d-block w-100" src="assets3/images/download-laptop-png-picture-506x321.png" alt="">
                                </div><div class="carousel-item">
                                    <img class="d-block w-100" src="assets3/images/xiaomi-power-bank-16000mah-506x506.jpg" alt="">
                                </div><div class="carousel-item">
                                    <img class="d-block w-100" src="assets3/images/unnamed-506x392.png" alt="">
                                </div>
                                
                                
                                
                            </div>
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" class="active" data-target="#lb-smbcdMyku8"></li>
                                <li data-slide-to="1" data-target="#lb-smbcdMyku8"></li>
                                <li data-slide-to="2" data-target="#lb-smbcdMyku8"></li>
                                <li data-slide-to="3" data-target="#lb-smbcdMyku8"></li>
                            </ol>
                            <a role="button" href="" class="close" data-dismiss="modal" aria-label="Close">
                            </a>
                            <a class="carousel-control-prev carousel-control" role="button" data-slide="prev" href="#lb-smbcdMyku8">
                                <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next carousel-control" role="button" data-slide="next" href="#lb-smbcdMyku8">
                                <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content4 cid-sk0DPvQ962" id="content4-d">
<div style="display: flex; flex-wrap: flex; justify-content: center;">
    <?php

        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $query = "SELECT * FROM product WHERE `cat_id`='$cat_id' ";
            $products = mysqli_query($connect, $query);

            while($row = mysqli_fetch_array($products)){
                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                $id = $row['id'];

                echo '
                <div class="card">
                    <img src="images/'. $image. '" alt="" style="width: 150px; height: 150px;">
                    <h1>'. $name .'</h1>
                    <p class="price">'. $price .'</p>
                    <p><a href="?prod_id='.$id.'"><button>Add to Cart</button></a></p>
                </div>
                ';
            }
        }


    ?>
    </div>
</section>

<section class="contacts1 cid-sjZ1OQaHS5" id="contacts1-c">

    

    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Contact us</strong></h3>
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="card col-12 col-lg-6">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mobi-mbri-letter mobi-mbri" style="font-size: 50px;"></span>
                        </div>
                        <h4 class="card-title mbr-fonts-style mb-2 display-7">
                            <strong>Email</strong>
                        </h4>
                        <p class="mbr-text mbr-fonts-style mb-2 display-4">
                            subbu.r2199@gmail.com<br>vasumsv131@gmail.com</p>
                        
                    </div>
                </div>
            </div>
            <div class="card col-12 col-lg-6">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mobi-mbri-phone mobi-mbri" style="font-size: 50px;"></span>
                        </div>
                        <h4 class="card-title mbr-fonts-style align-center mb-2 display-7">
                            <strong>Phone</strong>
                        </h4>
                        <p class="mbr-text mbr-fonts-style mb-2 display-4">Call: +91 9480378832<br>&nbsp; &nbsp; &nbsp; &nbsp;+91 7090167375</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer5 cid-sjI8MEBp8r" once="footers" id="footer5-5">

 
    <div class="container">
        <div class="media-container-row">
            <div class="col-md-2 col-6">
                <div class="media-wrap">
                    <a href="https://mobirise.co/">
                        <img src="assets3/images/1608526896930-309x188.png" alt="Mobirise">
                    </a>
                </div>
            </div>
            <div class="col-10 col-6">
                <p class="mbr-text align-right links mbr-fonts-style display-7"><a href="#" class="text-black">About</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" class="text-black">Terms</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" class="text-black">Careers</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" class="text-black">Contact</a>
                </p>
            </div>
        </div>
        <!-- <div class="media-container-row">
            <div class="col-md-12"> -->
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row">
                <div class="col-md-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2020 - All Rights Reserved
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon" style="color: rgb(68, 121, 217); fill: rgb(68, 121, 217);"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon" style="color: rgb(11, 65, 167); fill: rgb(11, 65, 167);"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon" style="color: rgb(255, 0, 0); fill: rgb(255, 0, 0);"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com/mobirise" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon" style="color: rgb(215, 0, 120); fill: rgb(215, 0, 120);"></span>
                            </a>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <!-- </div>
            </div> -->
        </div>

    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/d" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="https://mobirise.site/s" style="color:#aaa;">Site</a> was started with Mobirise web themes</p></section><script src="assets3/web/assets/jquery/jquery.min.js"></script>  <script src="assets3/popper/popper.min.js"></script>  <script src="assets3/tether/tether.min.js"></script>  <script src="assets3/bootstrap/js/bootstrap.min.js"></script>  <script src="assets3/smoothscroll/smooth-scroll.js"></script>  <script src="assets3/dropdown/js/nav-dropdown.js"></script>  <script src="assets3/dropdown/js/navbar-dropdown.js"></script>  <script src="assets3/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets3/theme/js/script.js"></script>  
  
  
</body>
</html>