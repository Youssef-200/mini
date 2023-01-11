<!DOCTYPE html>
<html lang="en">
   <head>
      
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      
      <title>Village Touristique</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      
      <link rel="stylesheet" href="css/bootstrap.min.css">
      
      <link rel="stylesheet" href="css/style.css">
     
      <link rel="stylesheet" href="css/responsive.css">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
   </head>
   
   <body class="main-layout">
      
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="" /></div>
      </div>
      
      
        
        <?php
            include("head.php");
        ?>
     
      <div class=" banner_main">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <div class="bg_white">
                           <h1>Welcome To our <span class="yello">Village</span></h1>
                           
                        </div>
                        <a class="read_more" href="Javascript:void(0)">reservez</a>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <div class="bg_white">
                           <h1>Hotel <span class="yello">with one click</span></h1>
                           
                        </div>
                        <a class="read_more" href="Javascript:void(0)">reservez</a>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <div class="bg_white">
                           <h1>Bungalow <span class="yello">with one click</span></h1>
                           
                        </div>
                        <a class="read_more" href="Javascript:void(0)">reservez</a>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
    
      <div class="building">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>SI VOUS CHERCHEZ UN VACANCE AGREABLE <br><span class="yello">C'EST ICI QUE SA COMMENCE <br></span> SITE DE VILLAGE
                     </h2>
                     <p>Sur ce site, vous trouverez des informations sur les différents villages,hôtels,chambres et bungalows que nous avons ,ainsi que les différents tarifs que nous proposons.
                        De plus, afin de rendre votre séjour chez nous le plus agréable possible, nous mettons à votre disposition différents services tels que:
                      coiffeur ou une blanchisserie. Plus quun simple hébergement, nos villages de vacances vous proposent de faire des activités qui sont gratuites comme laccès aux piscines et aux terrains de jeux mais aussi des activités payantes de toutes genres (sportives, culturelles, touristiques, et détente).
                      Nous vous offrons la possibilité de réserver une combinaison de 5 activités différentes dans un "package" pour ainsi profiter de nos réductions</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
    
      <div class="services_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Services</h2>
                     
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <ul class="nav nav-tabs md-tabs border_none" id="myTabMD" role="tablist">
                     <li class="nav-item lisertab">
                        <a class="nav-link servi_tab active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
                           aria-selected="true">HOTEL</a>
                     </li>
                     <li class="nav-item lisertab">
                        <a class="nav-link servi_tab" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
                           aria-selected="false">Bungalow</a>
                     </li>
                     <li class="nav-item lisertab">
                        <a class="nav-link servi_tab" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md"
                           aria-selected="false">Chambre</a>
                     </li>
                  </ul>
                  <div class="tab-content card back_bg" id="myTabContentMD">
                     <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                        <div class="row">
                           <div class="col-md-4 col-sm-6 padding_0 margin_right20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img1.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>SOULAGEMENT</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 padding_0 margin_top70p margin_right20 margin_left20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img2.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>FLUIDITE</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 padding_0 margin_left20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img3.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>BON QUALITE</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 offset-md-8 col-sm-6 padding_0 margin_top170">
                              <div class="services margin_left60">
                                 <div class="services_img">
                                    <figure><img src="images/service_img4.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>MEILLEUR PRIX</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <a class="read_more" href="Javascript:void(0)">reservez</a>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                        <div class="row">
                           <div class="col-md-4 col-sm-6 padding_0 margin_right20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img3.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>FLUIDITE</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 padding_0 margin_top70p margin_right20 margin_left20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img2.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>SOULAGEMENT</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 padding_0 margin_left20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img4.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>BON QUALITE</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 offset-md-8 col-sm-6 padding_0 margin_top170">
                              <div class="services margin_left60">
                                 <div class="services_img">
                                    <figure><img src="images/service_img1.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>MEILLEUR PRIX</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <a class="read_more" href="Javascript:void(0)">reservez</a>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
                        <div class="row">
                           <div class="col-md-4 col-sm-6 padding_0 margin_right20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img4.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>SOULAGEMENT</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 padding_0 margin_top70p margin_right20 margin_left20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img2.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>BON QUALITE</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 padding_0 margin_left20">
                              <div class="services">
                                 <div class="services_img">
                                    <figure><img src="images/service_img1.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>MEILLEUR PRIX</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 offset-md-8 col-sm-6 padding_0 margin_top170">
                              <div class="services margin_left60">
                                 <div class="services_img">
                                    <figure><img src="images/service_img3.png" alt="#" />  </figure>
                                    <div class="ho_dist">
                                       <span>FLUIDITE</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <a class="read_more" href="Javascript:void(0)">reservez</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <div class="instant">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="titlepage text_align_left">
                     <h2>Ne rate plus la chance</h2>
                     <a class="read_more" href="Javascript:void(0)">reservez</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="instant_img">
                     <figure><img src="images/pc.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <ul class="social_icon text_align_center">
                        <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="reader">
                        <a href="index.html"></a>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-6">
                     <div class="reader">
                        <h3>Explore</h3>
                        <ul class="xple_menu">
                           <li><a href="index.php">Home</a></li>
                           
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="reader">
                        <h3>Recent Posts</h3>
                        <ul class="re_post">
                           <li><img src="images/re_img1.jpg" alt="#"/></li>
                           <li><img src="images/re_img2.jpg" alt="#"/></li>
                           <li><img src="images/re_img3.jpg" alt="#"/></li>
                           <li><img src="images/re_img4.jpg" alt="#"/></li>
                        </ul>
                     </div>
                  </div>
                  
               </div>
            </div>
            
         </div>
      </footer>
   
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
   </body>
</html>
