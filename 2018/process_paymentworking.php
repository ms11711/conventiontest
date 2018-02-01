<?php

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();

$query = "SELECT * FROM user_payment WHERE id = ".$user->id."";
$payment = User::getData($query);

$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$details = User::getData($query);

if($details["is_waitlist"] == 1){
    Util::redirect('/account.php');
}

if($payment["paid"] == 1){
    Util::redirect('/account.php');
}

$agegroup = $payment["agegroup"];
$type = $payment["type"];

switch ($agegroup) {
    case "High School":
        if($type == "subsidized"){
            $amount = "33900";
        }
            
        else if ($type == "unsubsidized") {
            $amount = "42500";
        }

        else 
            $error = "error";
        break;

    case "College":
        if($type == "subsidized"){
            $amount = "33900";
        }
            
        else if ($type == "unsubsidized") {
            $amount = "42500";
        }

        else 
            $error = "error";
        break;

    case "JNF":
        if($type == "subsidized"){
            $amount = "37500";
        }
            
        else if ($type == "unsubsidized") {
            $amount = "47500";
        }

        else 
            $error = "error";
        break;
    default:
        echo "Error";
}

?>


<?php include "config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $config_title; ?> | Registration - Step 3</title>
        <meta name="description" <?php echo 'content="'.$config_description.'"'; ?> >
        <meta name="keywords" <?php echo 'content="'.$config_keywords.'"'; ?> >

        <?php echo $config_favicon; ?>   
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css (blue color by default) -->

        <link href="sky-form/css/sky-forms.css" rel="stylesheet">

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
                        <h4>Register Step 3/3</h4>
                    </div>
                     
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>
 


        <div class="container">
         <form action="charge.php" method="POST">    
            <div class="row">
                            <div class="col-md-6 margin20">
                <h4 class="margin30">Suggested Donations</h4>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Registration Fee</th>                            
                            <th>Donation Amount</th>
                            <th>Total</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (($agegroup == "High School") && ($type == "subsidized")) { 
                            echo "
                            <tr>
                                <td>$339</td>
                                <td>$12</td>
                                <td><strong>$351</strong></td>
                            </tr>
                            <tr>
                                <td>$339</td>
                                <td>$62</td>
                                <td><strong>$401</strong></td>
                            </tr>
                            ";
                        } 
                        else if (($agegroup == "High School") && ($type == "unsubsidized")) { 
                            echo "
                            <tr>
                                <td>$425</td>
                                <td>$26</td>
                                <td>$451</th>
                            </tr>
                            <tr>
                                <td>$425</td>
                                <td>$76</td>
                                <td><strong>$501</strong></td>
                            </tr>
                            ";
                        } else if (($agegroup == "College") && ($type == "subsidized")) { 
                            echo "
                            <tr>
                                <td>$339</td>
                                <td>$12</td>
                                <td><strong>$351</strong></td>
                            </tr>
                            <tr>
                                <td>$339</td>
                                <td>$62</td>
                                <td><strong>$401</strong></td>
                            </tr>
                            ";
                        } else if (($agegroup == "College") && ($type == "unsubsidized")) { 
                            echo "
                            <tr>
                                <td>$425</td>
                                <td>$26</td>
                                <td><strong>$451</strong></td>
                            </tr>
                            <tr>
                                <td>$425</td>
                                <td>$76</td>
                                <td><strong>$501</strong></td>
                            </tr>
                            ";
                        } else if (($agegroup == "JNF") && ($type == "subsidized")) { 
                            echo "
                            <tr>
                                <td>$375</td>
                                <td>$26</td>
                                <td><strong>$401</strong></td>
                            </tr>
                            <tr>
                                <td>$375</td>
                                <td>$76</td>
                                <td><strong>$451</strong></td>
                            </tr>
                            ";
                        } else if (($agegroup == "JNF") && ($type == "unsubsidized")) { 
                            echo "
                            <tr>
                                <td>$425</td>
                                <td>$26</td>
                                <td><strong>$451</strong></td>
                            </tr>
                            <tr>
                                <td>$425</td>
                                <td>$76</td>
                                <td><strong>$501</strong></td>
                            </tr>
                            ";
                        } 
                        else 
                            $error = "error";
                        

                        ?> 
                        
                    </tbody>
                </table>
            </div>
                <div class="col-md-6 margin20">
                    <h4 class="margin30">Amount Due</h4>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th> 
                                <tH></th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><?php echo $agegroup?> Registration</td>
                                <td></td>
                                <td><?php echo "$".number_format(($amount/100), 2, '.', ' '); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Donation</td>
                                <td></td>
                                <td><input class="form-control" id="donation" name="donation" type="number" value="" step="5" min="0" placeholder="Enter Donation Amount" /></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td> 
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_live_UJiilhAuh1MZ7uVvEWpBFvoM"            
            data-image="https://convention.yja.org/img/stripelogo.png"
            data-name="yja.org"
            data-label="Click Here to Pay"
            data-description="YJA2016 Registration">
          </script>
 

        </form></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="divide40"></div> 
                </div>

              
              
            </div><!--about intro-->
            <div class="divide60"></div>


        </div>
        <div class="divide40"></div>

 
        <div class="divide60"></div>
       
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

<script>


window.onload = function() {
  var e = document.getElementById("agegroup_dropdown");
    var agegroup = e.options[e.selectedIndex].value;
    getPrice(agegroup);
};

function getPrice(agegroup){
      if (agegroup == "High School"){
        $("#unsubsidized").html("$425");
        $("#subsidized").html("$339");
    }
    else if (agegroup == "College"){
        $("#unsubsidized").html("$425");
        $("#subsidized").html("$339");

    }
    else if (agegroup == "JNF"){
        $("#unsubsidized").html("$475");
        $("#subsidized").html("$375");

    }
}

$( "#agegroup_dropdown" ).change(function() {
    var e = document.getElementById("agegroup_dropdown");
    var agegroup = e.options[e.selectedIndex].value;
    getPrice(agegroup);    
});
 

</script>
                  <script type="text/javascript">
    $(function() {
        $('#donation').click(function(event) {
            var amount = $('#donation').val();        
            $('.stripe-button active').attr('data-amount', amount)
        });
    });
</script>


  <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>  
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.js"></script>
  <script src="/js/init.js"></script>


 
    </body>
</html>
