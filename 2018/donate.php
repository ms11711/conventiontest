<?php require_once 'includes/init.php'; ?>

 

<?php include "config/config.php" ?>


 


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Donate</title>
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
        <script src="https://checkout.stripe.com/checkout.js"></script>

    </head>
    <body>


       <?php include "config/nav.php" ?>

        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Donate</h4>
                    </div> 
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide40"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h2 class="heading">Donate to the Future of Jainism!</h2>
                    <p>Make a donation to contribute to the 2016 Convention using the form below! A donation of any amount will go a very long way in helping us plan a successful convention.</p>
                    <p><strong>Interested in sponsoring?</strong> For more information on the benefits of becoming a sponsor and the different sponsorship levels, please visit our <a href="https://convention.yja.org/assets/2016YJASponsorshipPacketFinal.pdf" target="_blank"><strong>2016 Sponsorship Packet</strong></a>. Please e-mail <a href="mailto:fundraising.la@yja.org"><strong>fundraising.la@yja.org</strong></a> if you have any questions.</p>   
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p><em>Disclaimer: If you would like to donate more than $1,000, please email <a href="mailto:fundraising.la@yja.org">fundraising.la@yja.org</a> instead of donating using the form below.</em></p>
                    <div class="required">
                        <p>( <span>*</span> fields are required )</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-contact">
                   <form name="donate" id="donate" method="post" action="donation_charge.php" >
                    <?php $letter = chr(rand(64, 90)) . chr(rand(64, 90));   ?>
                    <input type="hidden" name="id" value="<?php echo $letter.time(); ?>"
                       <div class="row">                

                            <div class="col-md-12">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                       <label>Business or Individual Name<span>*</span></label>
                                        <input class="form-control" placeholder="Name" id="donate_name" name="donate_name" >
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>
           

                            <div class="col-md-6">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                       <label>Phone Number</label>
                                        <input class="form-control" placeholder="(###) ###-####" id="donate_phone" name="donate_phone" >
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                       <label>Email Address<span>*</span></label>
                                        <input class="form-control" placeholder="Email Address" id="donate_email" name="donate_email"  >
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">                                   
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="City" id="donate_city" name="donate_city" >
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">                                   
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls"> 
                                        <label>State</label>
                                       <input type="text" class="form-control" placeholder="State" id="donate_state" name="donate_state" >
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                       <label>Amount<span>*</span></label>
                                        <input class="form-control" placeholder="Enter Amount Here" type="number" step="5" id="donate_amount" min="0" name="donate_amount" required>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">                                   
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                       <label>Message<span>*</span></label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="donate_message" name="donate_message" ></textarea>
                                <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">                                   
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                                           
                               <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_live_UJiilhAuh1MZ7uVvEWpBFvoM"            
                            data-image="https://convention.yja.org/img/stripelogo.png"
                            data-name="yja.org"
                            data-label="Click Here to Donate"
                            data-description="YJA2016 Donation">
                          </script>
                                         </div>
                                </div>
                            </div>



                        </div>
                    </form>

                </div>
                 <!--contact form-->                 
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

        
 
   
 
    </body>
</html>
