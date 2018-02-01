<?php 
//Initialisation
require_once 'includes/init.php';
 ?>
<?php include "config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title><?php echo $config_title; ?> | Sponsorship</title>
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
        
        
        <link href="css/YTPlayer.css" rel="stylesheet"> 
        
        
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <!--owl carousel css-->
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
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
                        <h4>Sponsorship</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->

        <div class="divide40"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h2 class="heading">Sponsoring the 2016 YJA Convention</h2>
                    <p>Our organization's mission is to be recognized as a national and international umbrella organization for Jain youth by establishing a network to share Jain heritage, religion, and philosophy through young people aged 14-29. Our goals are to raise awareness for Jain values and principles, to create a forum for sharing Jain Dharma, and to instill a sense of pride among Jain youth about their heritage.</p>
                    <p>We also aim to address the challenges, difficulties, and concerns facing a new generation of young Jains. Through informed dialogue and social engagement we prepare the Jain youth to become leaders, both inside and outside of their community while developing friendships and building a network among like minded youth. This in turn will lead to strengthening Jain youth groups throughout our local communitities. Young Jains of America (YJA) is a 501(c)3 non-profit organization, parented by the Federation of Jain Associations in North America (JAINA).</p>
                </div>

                <div class="col-md-12 margin30">
                    <h3 class="heading">Become a Sponsor</h3>
                    <h4>For more information on the benefits of becoming a sponsor and the different sponsorship levels, please download our <a href="https://convention.yja.org/assets/2016YJASponsorshipPacketFinal.pdf" target="_blank"><strong>2016 Sponsorship Packet</strong></a>.</h4>
                    <h5>Please e-mail <a href="mailto:fundraising.la@yja.org"><strong>fundraising.la@yja.org</strong></a> if you have any questions.</h5>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">Sponsorship Levels</h3>
                    <table class="table table-hover" id="sponsorship-table">
                    <tr>
                      <th>Sponsor Level</th>
                      <th>Amount</th>
                      <th>Benefits</th>
                    </tr>
                    <tr>
                      <td>Donor</td>
                      <td>$101+</td>
                      <td>Recognition on YJA website & Souvenir Booklet</td>
                    </tr>
                    <tr>
                      <td>Sponsor</td>
                      <td>$501+</td>
                      <td><sup>1</sup>&frasl;<sub>4</sub> Page Ad in Souvenir Booklet</td>
                    </tr>
                    <tr>
                      <td>Bronze Sponsor</td>
                      <td>$1,001+</td>
                      <td><sup>1</sup>&frasl;<sub>2</sub> Page Ad in Souvenir Booklet</td>
                    </tr>
                    <tr>
                      <td>Silver Sponsor</td>
                      <td>$2,501+</td>
                      <td><sup>1</sup>&frasl;<sub>2</sub> Page Ad in Souvenir Booklet & <strong>Highlight!</strong> - Session Speaker (1)</td>
                    </tr>
                    <tr>
                      <td>Gold Sponsor</td>
                      <td>$5,001+</td>
                      <td>Full Page Ad in Souvenir Booklet, Public Recognition During Special Events & <strong>Highlight!</strong> - Session Speaker (3) or Breakfast</td>
                    </tr>
                    <tr>
                      <td>Platinum Sponsor</td>
                      <td>$10,001+</td>
                      <td>Full Page Ad in Souvenir Booklet, Recognition on YJA E-Newsletter & <strong>Highlight!</strong> - Lunch, Keynote, JIA/JAB event, or Day of Hospitality Snacks</td>
                    </tr>
                    <tr>
                      <td>Diamond Sponsor</td>
                      <td>$20,001+</td>
                      <td>Full Page Ad in Souvenir Booklet, Memorable Plaque &  <strong>Highlight!</strong> - Main Event(s), Souvenir Bag, or Dinner</td>
                    </tr>
                  </table>
                  <p><em><strong>*Highlight!:</strong> In honor of your generosity, YJA will be recognizing you, your family, or your sangh’s donation at one or more of our highlight events or sessions. i.e. Posting a sign at the event stating “with blessings from: (insert name here).” Note each highlight is a significant offering. Only one highlight will be offered to each sponsorship group. Available in limited quantities.</em></p>
                </div>
                
                <div class="col-md-12 margin30">
                    <h3 class="heading">Donate to the Future of Jainism Today!</h3>
                    <p>If you would like to donate today using our online donation form, please visit our <a href="donate"><strong>donation page</strong></a>.</p>
                </div>
            </div>
        </div>


      

        <div class="divide40"></div>

            
        <?php include 'config/footer.php' ?>


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

    </body>
</html>
