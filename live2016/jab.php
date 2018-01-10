<?php 

require_once 'includes/init.php'; 

//Require the user to be logged in before they can see this page.
if(Auth::getInstance()->isLoggedIn()){

    $user = Auth::getInstance()->getCurrentUser();
     
    $query = "SELECT * FROM user_details WHERE id = ".$user->id."";
    $data = User::getData($query);

    $query = "SELECT * FROM user_misc WHERE id = ".$user->id."";
    $complete = User::getData($query);
 

}


//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($user->saveJAB($_POST)) {  
        sleep(3); 
        Util::redirect('/jab_success.php');
    }
}

?>


<?php include "config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Jain Academic Bowl</title>
        <meta name="description" <?php echo 'content="'.$config_description.'"'; ?> >
        <meta name="keywords" <?php echo 'content="'.$config_keywords.'"'; ?> >

        <?php echo $config_favicon; ?>   

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css (blue color by default) -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
    
        <!-- font awesome for icons -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- flex slider css -->
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <!-- animated css  -->
        <link href="css/animate.css" rel="stylesheet" type="text/css" media="screen">
        
        
        
             <!-- flex slider css -->
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <!-- animated css  -->
        <link href="css/animate.css" rel="stylesheet" type="text/css" media="screen">
        <!--owl carousel css-->
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
        <!--mega menu -->
        <link href="css/yamm.css" rel="stylesheet" type="text/css">
        <!--popups css-->
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
        <!--mega menu -->
        <link href="css/yamm.css" rel="stylesheet" type="text/css">

        <!--popups css-->
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>




       <?php include "config/nav.php" ?>


        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Jain Academic Bowl</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->


        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">JAIN ACADEMIC BOWL (JAB) 2016</h3>
                    <p><strong>The Jain Center of Southern California (JCSC), the Federation of Jain Associations in North America (JAINA) Education Committee, and Young Jains of America (YJA) Daytime Programming Committee invite you to participate in the YJA Jain Academic Bowl (JAB).</strong></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">What is the Jain Academic Bowl?</h3>
                    <p>The Jain Academic Bowl (JAB) is a team-based competition for young Jains. Topics range from Jain scriptures, prayers, and philosophy to Jain geography, history, and Jainism in the modern world.</p>
                    <p>This YJA Convention, we will be changing the format of the traditional JAB game by breaking up the game into three new rounds, each of which will encourage teamwork and collaboration. We hope that the new style will be fun, exciting, and informative for everyone involved!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin30">
                    <div id="work-carousel" class="owl-carousel owl-spaced">
                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JAB2" class="img-responsive" src="/assets/JAB2.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JAB2.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->

                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JAB3" class="img-responsive" src="/assets/JAB3.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JAB3.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->

                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JAB4" class="img-responsive" src="/assets/JAB4.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JAB4.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->

                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JAB5" class="img-responsive" src="/assets/JAB5.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JAB5.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">JAB Semi-Finalists</h3>
                    <p align="center"><strong>Congratulations to the following 16 JAB Semifinalists who will be competing for 1st place in July!</strong></p>
                </div>

                <div class="col-md-6">
                    <h4 align="center"><strong>Micchami Dukkadam</strong></h4>
                    <div class="item-img-wrap ">                                
                    <img alt="red" class="img-responsive" src="/assets/jab_red_sm.jpg" />
                        <div class="item-img-overlay">
                            <a href="/assets/jab_red.jpg" class="show-image">
                                <span></span>
                            </a>
                        </div>
                    </div> <!--item img wrap-->                           
                </div>

                <div class="col-md-6">
                    <h4 align="center"><strong>Not Your Average Navkar</strong></h4>
                    <div class="item-img-wrap ">                                
                    <img alt="blue" class="img-responsive" src="/assets/jab_blue_sm.jpg" />
                        <div class="item-img-overlay">
                            <a href="/assets/jab_blue.jpg" class="show-image">
                                <span></span>
                            </a>
                        </div>
                    </div> <!--item img wrap-->                           
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 margin15">
                    <div class="col-md-3"><p align="center"><strong>Anish Shah</strong><br>Florida</p></div>
                    <div class="col-md-3"><p align="center"><strong>Khyati Raka</strong><br>Arizona</p></div>
                    <div class="col-md-3"><p align="center"><strong>Sanjana Shah</strong><br>Texas</p></div>
                    <div class="col-md-3"><p align="center"><strong>Shreyal Gandhi (C)</strong><br>Virginia</p></div>
                </div>
                <div class="col-md-6 margin15">
                    <div class="col-md-3"><p align="center"><strong>Darshi Shah</strong><br>New York</p></div>
                    <div class="col-md-3"><p align="center"><strong>Kanvi Shah (C)</strong><br>Virginia</p></div>
                    <div class="col-md-3"><p align="center"><strong>Mohini Shah</strong><br>Florida</p></div>
                    <div class="col-md-3"><p align="center"><strong>Veeraj Shah</strong><br>New Jersey</p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h4 align="center"><strong>Vardhaman Lions</strong></h4>
                    <div class="item-img-wrap ">                                
                    <img alt="white" class="img-responsive" src="/assets/jab_white_sm.jpg" />
                        <div class="item-img-overlay">
                            <a href="/assets/jab_white.jpg" class="show-image">
                                <span></span>
                            </a>
                        </div>
                    </div> <!--item img wrap-->
                </div>                           

                <div class="col-md-6">
                    <h4 align="center"><strong>Once Upon a Kal</strong></h4>
                    <div class="item-img-wrap ">                                
                    <img alt="green" class="img-responsive" src="/assets/jab_green_sm.jpg" />
                        <div class="item-img-overlay">
                            <a href="/assets/jab_green.jpg" class="show-image">
                                <span></span>
                            </a>
                        </div>
                    </div> <!--item img wrap-->                           
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 margin30">
                    <div class="col-md-3"><p align="center"><strong>Chandni Shah</strong><br>New Jersey</p></div>
                    <div class="col-md-3"><p align="center"><strong>Divya Shah</strong><br>Texas</p></div>
                    <div class="col-md-3"><p align="center"><strong>Dhruvil Shah</strong><br>Virginia</p></div>
                    <div class="col-md-3"><p align="center"><strong>Shreyans Munot (C)</strong><br>Michigan</p></div>
                </div>
                <div class="col-md-6 margin30">
                    <div class="col-md-3"><p align="center"><strong>Ayushi Sangoi (C)</strong><br>New Jersey</p></div>
                    <div class="col-md-3"><p align="center"><strong>Karina Patel</strong><br>Pennsylvania</p></div>
                    <div class="col-md-3"><p align="center"><strong>Palash Shah</strong><br>Virginia</p></div>
                    <div class="col-md-3"><p align="center"><strong>Rushabh Shah</strong><br>Florida</p></div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="heading">Format & Guidelines</h3>
                    <p>We hope this format will be accessible to both people who have played JAB previously and people who have never participated. Regardless of prior experience, everyone is encouraged to partake in JAB. Additionally, the teams will be composed of participants from different cities, allowing players to meet new people!</p>
                    <p>The tournament will consist of two matches during the YJA convention. All teams will compete in the semifinal round and the winning teams will advance to the final round. Due to limited capacity, we may hold a preliminary selection of players depending on the level of interest.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <p><strong>Round 1</strong><br>Buzzer Round (Q&A): Teams will compete to answer Jain knowledge-based questions using buzzers.</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Round 2</strong><br>Jain Minute to Win It: Teams will compete to complete a variety of 60-second challenges involving Jainism.</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Round 3</strong><br>Jain Family Feud: Contestants will try to guess the answers to questions about Jain theory and practices that are most popular with the audience.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin30">
                    <p><a href="https://docs.google.com/document/d/1_5abDDtJ71eHRLU9_ghwRSUtfaZ5C920FjkbPAEG60A/edit?usp=sharing">Formal Rules and Guidelines</a> and a <a href="https://docs.google.com/document/d/1oFL3661qUqVHVXkkyXr8NWRPtgNF8O3_6gS9Rz7E0ZU/edit?usp=sharing">Sample Game</a> are now available! We hope you are excited as us for this new version of the Jain Academic Bowl!</p>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-12 margin30">
                    <h3 class="heading">Preparation</h3>
                    <p>If you are interested in learning some of the content for JAB, a good resource to look at is the <a href="http://www.jainlibrary.org/JAB/01_JAB_2015_Manual_Final.pdf">JAB Manual</a>, which can be found online at <a href="http://jainlibrary.org/">jainelibrary.org</a>. We will later let teams know which chapters in the manual the competition questions will be drawn from.</p>
                    <p><strong>You must be 21 years of age or under to register for JAB. For those of you that are eligible for both <a href="jia">Jains In Action (JIA)</a> and JAB, you will only be able to participate in one or the other, but not both.</strong></p>
                    <p>If you are interested, please submit the following information no later than <strong>April 19th, 2016</strong>:</p>
                </div>
            </div>

<!--
            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="heading">Sign Up</h3>
                </div>
            </div>



            <?php if ($complete["jia_signedup"] == 1): ?>
        
             <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><strong><?php echo $data["firstname"]. " " .$data["lastname"];?></strong>, you have already signed up for JIA. Unfortunately, due to time constraints, attendees cannot participate in both JAB and JIA. If you would like to participate in JAB instead, please email <a href="reghelp@yja.org">reghelp@yja.org</a>.</p>
                </div>
            </div>


            <?php elseif ($complete["jab_signedup"] == 1): ?>
        
             <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><strong><?php echo $data["firstname"]. " " .$data["lastname"];?></strong>, you have already signed up for JAB.</p>
                </div>
            </div>


            <?php elseif($complete["completed_registration"] == 1): ?> 


            <div class="form-contact"> 


            <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><strong><?php echo $data["firstname"]. " " .$data["lastname"];?></strong>, Are you interested in signing up for JAB? Please enter any past JAB experience you may have had below. If it is your first time doing JAB, no problem just leave the field blank and click the SIGN ME UP button below!</p>
                </div>
            </div>
 
                <form id="signupForm" method="post" action="jab.php">
                        
                <input type="hidden" name="id" value=<?php echo '"'.$data["id"].'"';?>
                <div class="row">
                    <div class="col-md-12">                                   
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label>Have you had any prior experience with JAB?</label>
                                <textarea class="form-control" placeholder="Please describe your JAB experience here." id="experience" name="experience"></textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">      
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-theme-bg btn-lg">Sign me up for JAB!</button>
                    </div>
                </div>
            </form>

<?php else: ?>

                <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><em>You must be logged in and registered for YJA to sign up for JAB.</em></p>
                    <p>Registered attendees can login <a href="login">here.</a></p>
                </div>
            </div>
 

        <?php endif; ?>

            <div class="row"> 
                <div class="col-md-12 margin30">
                    <p>There is absolutely nothing to lose and a lot to learn! If you have any questions, do not hesitate to contact us at <a href="mailto:daytime@yja.org">daytime@yja.org</a>.</p>
                </div>
            </div>


--> 

            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="heading">JAB Administrative Team</h3>
                </div>
            </div>



            <div class="row">
                <div class="col-md-3" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-md-12" id="carousel-bounding-box">
                            <div id="myCarousel" class="carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item" data-slide-number="0">
                                        <img alt="Anish Doshi" class="img-responsive" src="/assets/AnishDoshi.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="1">
                                    <img alt="Anjali Doshi" class="img-responsive" src="/assets/AnjaliDoshi.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="2">
                                    <img alt="Foram Shah" class="img-responsive" src="/assets/ForamShah.png" />
                                    </div>
                                    <div class="item" data-slide-number="3">
                                    <img alt="Salil Ojha" class="img-responsive" src="/assets/SalilOjha.png" />
                                    </div>
                                    <div class="item" data-slide-number="4">
                                    <img alt="Siddharth Shah" class="img-responsive" src="/assets/SiddharthShah.jpg" />
                                    </div> 
                                </div><!--/carousel-inner-->
                            </div><!--/carousel-->
                            <ul class="carousel-controls-mini list-inline text-center">
                              <li><a href="#myCarousel" data-slide="prev">‹</a></li>
                              <li><a href="#myCarousel" data-slide="next">›</a></li>
                            </ul><!--/carousel-controls-->
                      </div><!--/col-->     
                    </div><!--/row-->
                </div><!--/col-->

                <div class="col-md-9">
                    <p>Your 2016 JAB Administrative Team consists of Anish Doshi (IL), Anjali Doshi (IL), Foram Shah (DC), Salil Ojha (TX), and Siddharth Shah (TX).</p>
                    <p>Helping them are your 2016 Daytime Programming Committee Co-Leads: Chintav Shah (NJ), Kayuri Shah (DC), and Mahima Shah (NJ).
                </div>
            </div>

            </div>



        </div>
        <div class="divide40"></div>
                  
        <?php include "config/footer.php" ?>

        <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>        
        <!--bootstrap js plugin-->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <!--easing plugin for smooth scroll-->
        <script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <!--flex slider plugin-->
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <!--parallax background plugin-->
        <script src="js/jquery.stellar.min.js" type="text/javascript"></script>
        
        
        <!--digit countdown plugin-->
        <script src="js/waypoints.min.js"></script>
        <!--digit countdown plugin-->
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="js/wow.min.js" type="text/javascript"></script> 
        <!--owl carousel slider-->
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <!--popup js-->
        <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <!--you tube player-->
        <script src="js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
        
        
        <!--customizable plugin edit according to your needs-->
        <script src="js/custom.js" type="text/javascript"></script>

        <script>
        $('#myCarousel').carousel({
              interval: 3000
            }); 
</script>
 
       
    </body>
</html>
