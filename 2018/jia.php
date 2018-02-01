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

    if ($user->saveJIA($_POST)) {  
        sleep(3); 
        Util::redirect('/jia_success.php');
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

        <title><?php echo $config_title; ?> | Jains in Action</title>
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
                        <h4>Jains in Action</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->


        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">JAINS IN ACTION (JIA)</h3>
                    <p><strong>The Daytime Programming and Jain Networking Forum Committees invite you to participate in YJA’s first ever Jains In Action (JIA)!</strong></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">What is JIA?</h3>
                    <p>Jains in Action (JIA) is taking YJA beyond just the convention.</p>
                    <p>JIA provides a platform for today’s Agents of Change to use Jain values, personal knowledge, and past experiences to solve some of today’s most pressing issues. Similar to a social hackathon, JIA participants will present their issue and solution to a panel of judges. This solution can take the form of a product, business, organization, or movement that inspires others to act.</p>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-5 margin30">
                    <div class="item-img-wrap ">                                
                            <img alt="JIA1" class="img-responsive" src="/assets/jia_format.png" />
                                <div class="item-img-overlay">
                                    <a href="/assets/jia_format.png" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->     
                </div>
                <div class="col-md-7 margin30">
                    <h3 class="heading">Format & Guidelines</h3>
                    <p>One month before convention, all JIA participants will need to decide on the problem they intend to tackle. The plan should relate to the convention theme - Agents of Change - and a few sample themes will be provided beforehand for guidance. Participants will answer two questions: "What are the details of the problem I am tackling?" and "How does solving this problem make the world a better place?"</p>
                    <p>After this, the team formation process will begin so that team members can get to know each other and begin discussing multiple solutions to consider.</p>
                    <p>During convention, the teams will be able to collaborate with their teammates during the JIA sessions to create, organize, and finalize their actionable solution. The top three teams will then present to a panel of judges in front of the entire convention audience.</p>
                    <p>Finally, the winning team will be given a grant (upwards of $1000) to carry out the proposed solution in the real world, potentially working with an investor to take their project to the next level!</p>
                    <p>Due to limited capacity, there may be a short application process. Nevertheless, everyone is encouraged to sign up! If you have any questions, please email <a href="daytime@yja.org">daytime@yja.org</a>.</p>
                    <p><strong>Note: Only attendees in the College/JNF age groups will be eligible to partake in JIA. Due to time constraints, attendees will NOT be able to participate in <em>both</em> JIA and <a href="jab">JAB</a>.</strong></p>
                </div>
            </div>


            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="heading">JIA Judges</h3>
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
                                        <img alt="Ankit Jain" class="img-responsive" src="/assets/AnkitJain.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="1">
                                        <img alt="Ankit Shah" class="img-responsive" src="/assets/AnkitShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="2">
                                        <img alt="Hiten Shah" class="img-responsive" src="/assets/HitenShah.jpg" />
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
                    <p>Our judges at #YJA16 - Ankit Jain, Ankit Shah, and Hiten Shah - have various experiences starting their own businesses and/or consulting with high growth startups. They will be on our panel during the JIA final pitches offering their advice and choose the winning team!</p>
                </div>
            </div>



            <div class="row"> 
                <div class="col-md-12 margin30">
                    <h3 class="heading">Sample Themes & Topics</h3>
                    <p><a href="https://docs.google.com/document/d/1AQFEJy7NKKDuX3Nkzu4itkm-q2_08_0_OKvUQnJNuNY/edit">Sample ideas and topics</a> are now available - check them out to see the types of problems we are looking to solve this convention! </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin30">
                    <div id="work-carousel" class="owl-carousel owl-spaced">
                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JIA1" class="img-responsive" src="/assets/JIA1.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JIA1.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->

                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JIA2" class="img-responsive" src="/assets/JIA2.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JIA2.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->

                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JIA3" class="img-responsive" src="/assets/JIA3.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JIA3.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->

                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JIA4" class="img-responsive" src="/assets/JIA4.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JIA4.jpg" class="show-image">
                                        <span></span>
                                    </a>
                                </div>
                            </div> <!--item img wrap-->                           
                        </div><!--owl item-->

                        <div>
                            <div class="item-img-wrap ">                                
                            <img alt="JIA5" class="img-responsive" src="/assets/JIA5.jpg" />
                                <div class="item-img-overlay">
                                    <a href="/assets/JIA5.jpg" class="show-image">
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
                    <h3 class="heading">Sign Up</h3>
                </div>
            </div>


            <?php if ($complete["jab_signedup"] == 1): ?>
        
             <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><strong><?php echo $data["firstname"]. " " .$data["lastname"];?></strong>, you have already signed up for JAB. Unfortunately, due to time constraints, attendees cannot participate in both JAB and JIA. If you would like to participate in JIA instead, please email <a href="reghelp@yja.org">reghelp@yja.org</a>.</p>
                </div>
            </div>

            <?php elseif ($complete["jia_signedup"] == 1): ?>
        
             <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><strong><?php echo $data["firstname"]. " " .$data["lastname"];?></strong>, you have already signed up for JIA.</p>
                </div>
            </div>


            <?php elseif($complete["completed_registration"] == 1): ?> 


            <div class="form-contact"> 


            <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><strong><?php echo $data["firstname"]. " " .$data["lastname"];?></strong>, Are you interested in signing up for JIA? Please enter why below and click sign up.</p>
                </div>
            </div>
 
                <form id="signupForm" method="post" action="jia.php">
                        
                <input type="hidden" name="id" value=<?php echo '"'.$data["id"].'"';?>
                <div class="row">
                    <div class="col-md-12">                                   
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label>Why are you interested in JIA?</label>
                                <textarea class="form-control" placeholder="Please describe your interest in JIA here." id="interest" name="interest"></textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">      
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-theme-bg btn-lg">Sign me up for JIA!</button>
                    </div>
                </div>
            </form>

            <div class="divide40"></div>
            
            <?php else: ?>

                <div class="row"> 
                <div class="col-md-12 margin30">
                    <p><em>You must be logged in and registered for YJA to sign up for JIA.</em></p>
                    <p>Registered attendees can login <a href="login">here.</a></p>
                </div>
            </div>
 

            <?php endif; ?>

        
            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="heading">JIA Administrative Team</h3>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <p>Your 2016 JIA Administrative Team consists of Anish Doshi (IL), Chintav Shah (NJ), Kayuri Shah (DC), Neelam Savla (CA), and Shrenik Shah (CA).</p>
                    <p>Assisting them are your Co-Chairs Akash Shah (CA) and Puja Savla (CA).</p>
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
