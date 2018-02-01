<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();

$query = "SELECT * FROM user_misc WHERE id = ".$user->id."";
$complete = User::getData($query);

$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$data = User::getData($query);

$gender = $data["gender"];

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.gender = 'male') AND (user_details.agegroup = 'JNF') AND (user_misc.completed_registration = '1')";

$maleCountJNF = User::getData($query);
$maleRemainingJNF = 98-intval($maleCountJNF[0]);

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.gender = 'female') AND (user_details.agegroup = 'JNF') AND (user_misc.completed_registration = '1')";

$femaleCountJNF = User::getData($query);
$femaleRemainingJNF = 95-intval($femaleCountJNF[0]);


$HSWaitlist = 230;
$CWaitlist = 200;



$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE /*(user_details.is_board = '0') AND*/ (user_details.agegroup = 'College') AND (user_misc.completed_registration = '1')";

$CountCollege = User::getData($query);
$RemainingCollege = $CWaitlist-intval($CountCollege[0]);
/* $CountCollege = intval($CountCollege[0]); */
$CountCollege = 200; /* added after College closed so it's always 0 spots open */

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.agegroup = 'High School') AND (user_misc.completed_registration = '1')";

$CountHigh = User::getData($query);
$RemainingHigh = $HSWaitlist-intval($CountHigh[0]);
/* $CountHigh = intval($CountHigh[0]); */ 
$CountHigh = 230; /* added after HS closed so it's always 0 spots open */


if($complete["got_info"] == 1){
    Util::redirect('/account.php');
}

//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($user->saveProfileSecondary($_POST)) {
        sleep(3); 

 
        include 'email_template/user-registered.php';
        Util::redirect('/process_payment.php');
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
        <title><?php echo $config_title; ?></title>
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

    </head>
    <body>


       <?php include "config/nav.php" ?>

        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Register Step 2/3</h4>
                    </div>
                     
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>


<div class="container">

 

            <div class="row">

                       <form id="signupForm" method="POST" novalidate >
                    <div class="col-md-4">                                   
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls"> 
                                <label>Registration Level<span>*</span></label>
                                <select class="form-control" name="agegroup" id="agegroup_dropdown">

                                <?php 
  
                                    $dob = $data["dob"]; 
                                    $dob = explode("/", $dob); 
                                    $new_format_dob = $dob[2]."-".$dob[0]."-".$dob[1];

                                    $from = new DateTime($new_format_dob);
                                    $to   = new DateTime('2016-07-03');
                                    $age = $from->diff($to)->y;

                                    if($age < 14){ Util::redirect('/error.php?e=1');}

                                    else if(($age >= 14) && ($age < 18)){
                                        if($CountHigh >= $HSWaitlist){
                                            echo '<option value="High School Waitlist">High School WAITLIST</option>';
                                        }
                                        else{
                                            echo '<option value="High School">High School</option>';
                                            $spots = "Remaining High School spots available: ".$RemainingHigh."/".$HSWaitlist;
                                        }
                                    }

                                   else if($age == 18){
                                        if($CountHigh >= $HSWaitlist){
                                            echo '<option value="High School Waitlist">High School WAITLIST</option>';
                                        }
                                        else{
                                            echo '<option value="High School">High School</option>';
                                            $spots = "Remaining High School spots available: ".$RemainingHigh."/".$HSWaitlist;
                                        }


                                        if($CountCollege >= $CWaitlist){
                                            echo '<option value="College Waitlist">College WAITLIST</option>';
                                        }
                                        else{
                                            echo '<option selected="selected" value="College">College</option>';
                                            $spots = $spots."<br>Remaining College spots available: ".$RemainingCollege."/200";
                                        } 
                                    }

                                    else if(($age >= 19) && ($age < 21)){
                                        if($CountCollege >= $CWaitlist){
                                            echo '<option value="College Waitlist">College WAITLIST</option>';
                                        }
                                        else{
                                            echo '<option value="College">College</option>';
                                            $spots = "Remaining College spots available: ".$RemainingCollege."/200";
                                        }
                                    }
                                    else if($age == 21){
                                        if($CountCollege >= $CWaitlist){
                                            echo '<option value="College Waitlist">College WAITLIST</option>';
                                        }
                                        else{
                                            echo '<option value="College">College</option>';
                                            $spots = "Remaining College spots available: ".$RemainingCollege."/200";
                                        }

                                            if (($gender == 'male') /* && ($maleCountJNF[0] >= 98) */){
                                                 echo '<option value="JNF Waitlist">JNF WAITLIST</option>';
                                            }
                                            else if(($gender == 'female') /* && ($femaleCountJNF[0] >= 95) */){
                                                echo '<option value="JNF Waitlist">JNF WAITLIST</option>';
                                            }
                                            /* else{
                                                echo '<option value="JNF">Jain Networking Forum</option>';
                                                 $spots = "Remaining JNF spots available:<br> Male: ".$maleRemainingJNF."/100 Female: ".$femaleRemainingJNF."/100.";
                                            }  */       
                                    }
                                    else if(($age >= 22) && ($age < 30)){
                                        if (($gender == 'male') /* && (intval($maleCountJNF[0]) >= 98) */){
                                             echo '<option value="JNF Waitlist">JNF WAITLIST</option>';
                                        }
                                        else if(($gender == 'female') /* && (intval($femaleCountJNF[0]) >= 95) */){
                                             echo '<option value="JNF Waitlist">JNF WAITLIST</option>';
                                        }
                                        /* else{
                                            echo '<option value="JNF">Jain Networking Forum</option>';
                                            $spots = "Remaining JNF spots available:<br> Male: ".$maleRemainingJNF."/100 Female: ".$femaleRemainingJNF."/100.";
                                        } */
                                    }
                                    else{ Util::redirect('/error.php?e=2'); }

                                    echo $e;
                                ?>
                                                    </select>               
                        
                                                    <p class="help-block"><?php if(isset($spots)){echo $spots;}   ?></p>
                                                </div>
                                            </div>
                                        </div>
 
                                <div id="pricing_stuff" class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <!-- <label>Your price depends on your registration level, if you can afford to do so, please pay the unsubsidized. <a href="registernow.php" target="_blank"> Click here for more information</a>: <span>*</span></label> -->
                                            <label class="radio-inline"><input id="unsub_input" type="radio" name="type" value="unsubsidized" checked>Unsubsidized:  <span style="color:black;" id="unsubsidized"></span></label>
                                            <!-- <label class="radio-inline"><input id="sub_input" type="radio" name="type" value="subsidized">Subsidized:  <span style="color:black;" id="subsidized"></label> -->
                                            <p>*(Unsubsidized Comes with a <span style="color:black;" id="tax_deduction"></span> tax receipt)</p>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>



        
                <div class="col-md-12 margin30">
                    <h3 class="heading">Emergency Information</h3>
                    <p>
                        Please enter your emergency contact information. If you are under 18 years old, your emergency contact must be a parent/guardian. 
                    </p> 
                    <div class="form-contact">
                        <div class="required">
                            <p>( <span>*</span> fields are required )</p>
                        </div>
 

                    <div class="divide30"></div>
                       
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Emergency Contact First Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="First Name" name="emergencyfirstname" id="emergencyfirstname" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div> 

                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Emergency Contact Last Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Last Name" name="emergencylastname" id="emergencylastname" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                            </div>                

                            <div class="row">

                                 <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Emergency Contact Email Address<span>*</span></label>
                                    <input class="form-control" placeholder="Email Address" id="emergencyemailaddress" name="emergencyemailaddress" required>
                                    <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Relationship to Emergency Contact<span>*</span></label>
                                    <input class="form-control" placeholder="Relationship" id="Relationship" name="relationship" required>
                                    <p class="help-block"></p>
                                        </div>
                                    </div>


                                </div>

 

                            </div>

                            <div class="row">
 

                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Emergency Contact Primary Phone Number<span>*</span></label>
                                            <input class="form-control" placeholder="(###) ###-####" id="emergencyprimaryph" name="emergencyprimaryph" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Emergency Contact Secondary Phone Number</label>
                                            <input class="form-control" placeholder="(###) ###-####" id="emergencysecondaryph" name="emergencysecondaryph" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
   
                    <div class="divide30"></div>
                       
                    <h3 class="heading">Insurance Information</h3>
                    <p>
                        If you do not have insurance, skip the next section and go to the next page.
                    </p> 
 
                    <div class="row">
                                <div class="col-md-4">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Policy Holder First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name" name="policyfirstname" id="policyfirstname" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div> 

                                <div class="col-md-4">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Policy Holder Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" name="policylastname" id="policylastname">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Insurance Carrier</label>
                                            <input type="text" class="form-control" placeholder="Carrier" name="insurancecarrier" id="insurancecarrier" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                            </div>                

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Insurance Policy Type (HMO, PPO, etc.. )</label>
                                            <input type="text" class="form-control" placeholder="Policy Type" name="policytype" id="policytype" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div> 

                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Insurance Group Number</label>
                                            <input type="text" class="form-control" placeholder="Group Number" name="groupno" id="groupno">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

                                
                            </div>                

                         <div class="row">
                               <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Insurance ID Number</label>
                                            <input type="text" class="form-control" placeholder="Insurance ID" name="idnumber" id="idnumber" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

                                 
                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Insurance Phone Number</label>
                                            <input type="text" class="form-control" placeholder="(###) ###-####" name="insurancephone" id="insurancephone" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                            </div>       

                    <div class="divide30"></div>
                       
                    <h3 class="heading">Volunteers</h3>
                    <p>
                         Would you like to volunteer? If so, please select a preferred position from the dropdown below. If you do not wish to volunteer, please skip this section and leave the selection on N/A. 
                    </p>

                     <div class="row">
                        <div class="col-md-4">                                   
                            <div class="row control-group">
                                <div class="form-group col-xs-12 controls"> 
                                    <label>Volunteer Preference</label>
                                    <select class="form-control" name="volunteerpreference">
                                        <option value="NA">N/A</option>
                                        <option value="Resident Assistant">Resident Assistant</option>
                                        <option value="Session Monitor">Session Monitor</option>
                                        <option value="Speaker Liason">Speaker Liason</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="divide30"></div>
                       
                    <h3 class="heading">Additional Information</h3>
                    <p>
                        You will be contacted at a later date for roomate information. You will also need to submit transportation information via your profile page once you book a flight,train etc..
                    </p>
                    <div class="row">
                       <div class="col-md-12">
                            <div class="row control-group">
                                <div id="checkRules" class="checkbox col-xs-12 controls">
                                    <label><input id="agreed_rules" name="agreed_rules" value="1" type="checkbox" required>I agree to follow all <a href="assets/RulesRegulations2016.pdf" target="_blank">rules and regulations</a> for the 2016 YJA Convention.<span>*</span></label>
                                    
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div> 
                    </div>     

                 <div class="row">
                       <div class="col-md-12">
                            <div class="row control-group">
                                <div id="checkWaiver" class="checkbox col-xs-12 controls">
                                    <label><input id="agreed_waiver" name="agreed_waiver" value="1" type="checkbox" required>I have read and agree to the <a href="assets/LiabilityWaiver2016.pdf" target="_blank">Release and Waiver of Liability.</a><span>*</span></label>
                                    
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div> 
                    </div>     


                            <div id="success"></div>
                            <div class="row">       

                                <div class="form-group col-xs-6">
                                    <button type="submit" class="btn btn-theme-bg btn-lg">Enter Waitlist</button>
                                </div>
                            </div>
                        </form>

                    </div><!--contact form-->
                </div>
                
            </div>
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


       
  

  <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>  
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.js"></script>
  <script src="/js/init.js"></script>
<script>

window.onload = function() {
  var e = document.getElementById("agegroup_dropdown");
    var agegroup = e.options[e.selectedIndex].value;
    getPrice(agegroup);
};

function getPrice(agegroup){
      if (agegroup == "High School"){

        $("#pricing_stuff").show(); 
        $("#unsubsidized").html("$425");
        $("#subsidized").html("$375");
        $("#tax_deduction").html("$50");
    }
    else if (agegroup == "College"){
        $("#pricing_stuff").show(); 
        $("#unsubsidized").html("$425");
        $("#subsidized").html("$375");
        $("#tax_deduction").html("$50");

    }
    else if (agegroup == "JNF"){
        $("#pricing_stuff").show(); 
        $("#unsubsidized").html("$475");
        $("#subsidized").html("$410");
        $("#tax_deduction").html("$65");
    }
        else if (agegroup == "High School Waitlist"){
        $("#pricing_stuff").hide(); 
    }
        else if (agegroup == "College Waitlist"){
        $("#pricing_stuff").hide(); 
    }
        else if (agegroup == "JNF Waitlist"){
        $("#pricing_stuff").hide(); 
    }
    
}

$( "#agegroup_dropdown" ).change(function() {
    var e = document.getElementById("agegroup_dropdown");
    var agegroup = e.options[e.selectedIndex].value;
    getPrice(agegroup);
  
  
});

</script>

<script>
$("#signupForm").submit(function(e) {

    var ref = $(this).find("[required]");

    $(ref).each(function(){
        if ( $(this).val() == '' )
        { 

            $(this).attr('style', "border-radius: 5px; border:#FF0000 1px solid;");

            $(this).focus();

            e.preventDefault();
            return false;
        }

    }); 



    if(!this.agreed_rules.checked) { 

            $("#checkRules").attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
      this.agreed_rules.focus();
      return false;
    }
    if(!this.agreed_waiver.checked) { 

            $("#checkWaiver").attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
      this.agreed_waiver.focus();
      return false;
    }
    return true;
});






</script>

 
    </body>
</html>
