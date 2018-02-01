<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?><?php include "config/db_connect.php" ?>

<?php

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();


//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($_POST["updateCat"] == "emergency"){
        if ($user->saveProfileEmergency($_POST)) {  
            sleep(3); 
        }
    }

    else if($_POST["updateCat"] == "insurance"){
        if ($user->saveProfileInsurance($_POST)) {  
            sleep(3); 
        }
    }

    else if($_POST["updateCat"] == "flight"){
        if ($user->saveProfileFlight($_POST)) {  
            sleep(3); 
        }
    }    

    else if($_POST["updateCat"] == "roomate"){
        if ($user->saveRoomate($_POST)) {  
            sleep(3); 
        }


    }
}

$query = "SELECT * FROM user_sessions WHERE userid = ".$user->id."";
$sessions = User::getData($query);

$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$data = User::getData($query); 

$query = "SELECT * FROM user_misc WHERE id = ".$user->id."";
$complete = User::getData($query);


if($complete["got_info"] == 0){
    Util::redirect('/registration3.php');
}

$query = "SELECT * FROM user_flight WHERE id = ".$user->id."";
$flight = User::getData($query);

$query = "SELECT * FROM user_emergency WHERE id = ".$user->id."";
$emergency = User::getData($query);

$query = "SELECT * FROM user_insurance WHERE id = ".$user->id."";
$insurance = User::getData($query);

$query = "SELECT * FROM user_volunteer WHERE id = ".$user->id."";
$volunteer = User::getData($query); 

$query = "SELECT * FROM user_payment WHERE id = ".$user->id."";
$payment = User::getData($query);

$query = "SELECT * FROM user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_misc.completed_registration = '1') AND (user_details.agegroup = '".$data["agegroup"]."') AND (user_details.gender = '".$data["gender"]."')";
$agegroup_users = User::getAllData($query);

$query = "SELECT * FROM user_roomate WHERE selector = ".$user->id."";
$roomie = User::getData($query); 
$query = "SELECT * FROM user_details WHERE id = ".$roomie["selected"]."";
$roomate = User::getData($query);

// Using this to get the dates and times from user and/or set default values.
$date_requested = $_GET["day"];

$time_requested = $_GET["time"];
 
//Get the TEST Session list
$sqlii = "SELECT * FROM Sessions";
$result = mysql_query($sqlii);

$sessions_test = array(); 

while ($row = mysql_fetch_object($result)) {
    $sessions_test[$row->keyval] = $row->title; 
}

echo mysql_error();


//Get the full Session list
$SQL = "SELECT * FROM Sessions";
$result = mysql_query($SQL);

$sessions_list = array();

while ($row = mysql_fetch_object($result)) {
    array_push($sessions_list, $row); 
}



function cmp($a, $b) {
    return strcmp($a["firstname"], $b["firstname"]);
}
usort($agegroup_users, "cmp");

/*
while (list($key, $value) = each($agegroup_users)) {
    //Print Value Array
}
*/

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | My Profile</title>
        <meta name="description" <?php echo 'content="'.$config_description.'"'; ?> >
        <meta name="keywords" <?php echo 'content="'.$config_keywords.'"'; ?> >

        <?php echo $config_favicon; ?>   

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css (blue color by default) -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
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

        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>        

<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-transitions.js"></script>
<script type="text/javascript" src="/js/bootstrap-collapse.js"></script>
 
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
    </head>

    <body>
 
    <?php include "config/nav.php" ?>

        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>My Account</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>
        <div class="container">

            <?php if ($complete["completed_registration"] == 0): ?>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">Account Information</h3>
                    <p>Welcome to your YJA convention account!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 margin30">
                    <?php 
                        if ($data["is_waitlist"] == 1 && $data["agegroup"] != "JNF Waitlist") {
                             echo '<p>You have been placed on the waitlist. We will contact you via email when a spot opens up.</p>';
                        
                        }

                        else if ($data["is_waitlist"] == 1 && $data["agegroup"] == "JNF Waitlist") {
                            echo '
                                <p>Jai Jinendra,</p>
          
                                  <p>We regret to inform you that there has been very minimal movement in the JNF Waitlist. Unfortunately, your chance of obtaining a spot for the convention are slim at this point. Once again, we sincerely apologize for the lack of communication and delay in providing an answer to you. We were hoping to see some movement, but this wasn’t the case.</p>
                                  <p>Please stay up-to-date with everything going on YJA related by visiting our <a href="http://yja.org">website</a>, and following us on social media.
                                    <ul>
                                        <li>Facebook: <a href="https://www.facebook.com/youngjains/">YoungJains</a></li>
                                        <li>Twitter: <a href="https://twitter.com/yjatweets">@YJAtweets</a></li>
                                        <li>Instagram: <a href="https://www.instagram.com/youngjainsofamerica/">@youngjainsofamerica</a></li>
                                    </ul>
                                  </p>
                                  
                                  <p>We have <a href="http://yja.org/events/">regular events</a> in cities across the country which we highly recommend attending. There are also <a href="http://yja.org/events/regional-retreats/">regional retreats</a> every year. Visit your region page on our website and also join your regions Facebook group.</p>
                                    <ul>
                                        <li><a href="https://www.facebook.com/groups/yjamidatlantic/">Mid-Atlantic</a>: Delaware, Maryland, New Jersey, New York (South of Westchester County), Pennsylvania, Virginia, Washington, D.C., and West Virginia</li>
                                        <li><a href="https://www.facebook.com/groups/yjamidwest/">Mid-West</a>: Illinois, Indiana, Iowa, Kansas, Michigan, Minnesota, Missouri, Nebraska, North Dakota, Ohio, South Dakota, Wisconsin, Ontario, Canada, and Manitoba, Canada</li>
                                        <li><a href="https://www.facebook.com/groups/yjanortheast/">Northeast</a>: Connecticut, Maine, Massachusetts, New Hampshire, New York (North of Westchester County, exclusive), Rhode Island, Vermont, and Quebec, Canada</li>
                                        <li><a href="https://www.facebook.com/groups/yjasouth/">South</a>: Arkansas, Louisiana, New Mexico, Oklahoma, and Texas</li>
                                        <li><a href="https://www.facebook.com/groups/yjasoutheast/">Southeast</a>: Alabama, Florida, Georgia, Kentucky, Mississippi, North Carolina, South Carolina, and Tennessee</li>
                                        <li><a href="https://www.facebook.com/groups/yjawest/">West</a>: Alaska, Arizona, California, Colorado, Hawaii, Idaho, Montana, Nevada, Oregon, Utah, Washington, Wyoming, Alberta, Canada, British Columbia, Canada, and Saskatchewan, Canada</li>
                                    </ul>
                                  </p>
                                    
                                  <p>Additionally, if you would like to get more involved with YJA, we would love to have you as a <a href="http://yja.org/regions/local-representatives/">Local Representative</a> for your region or even a part of our executive board! Elections for <a href="http://yja.org/about/elections/">executive board</a> will begin a few weeks after the convention.</p>

                                  <p>Lastly, we truly hope to see you at the next YJA convention in 2018!</p>
                                  <p>With #yjalove,<br>Your 2016 YJA Convention Committee</p>

                             ';
                        
                        }

                        else if($payment["paid"] == 0){
                            echo '<p><strong>You have not paid your registration dues.</strong> You will not be registered for YJA until the payment has been made.</p><a href="/process_payment.php" class="btn btn-theme-bg btn-lg">Make Payment</a><br>';
                            
                        }
                    ?>
                </div>

                <div class="col-md-3 margin30">

                    <?php
                        if ($data["agegroup"] != "JNF Waitlist") {
                        echo '
                            <p>
                            <strong>'.$data["firstname"].' '.$data["lastname"].'</strong><br>
                            '.$data["address1"].', '.$data["address2"].'<br>
                            '.$data["city"].', '.$data["state"].' '.$data["zipcode"].'<br>
                            Primary Phone: '.$data["primaryphone"].'<br>
                            Secondary Phone: '.$data["secondaryphone"].'<br>
                            '.$data["emailaddress"].'
                            </p>

                            <p>
                            <strong>Gender: </strong>'.$data["gender"].'<br>
                            <strong>Date of Birth: </strong>'.$data["dob"].'<br>
                            <strong>Age Group: </strong>'.$data["agegroup"].'<br>
                            </p>
                            ';
                        }
                    ?>

                </div>
            </div>


            <?php elseif($complete["completed_registration"] == 1): ?>


            <div class="row">
                <div class="col-md-12 margin30">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#main" aria-expanded="true">My Account</a></li>
                            <!-- <li class=""><a data-toggle="tab" href="#emergency" aria-expanded="false">Emergency Contact</a></li>
                            <li class=""><a data-toggle="tab" href="#insurance" aria-expanded="true">Health Insurance</a></li> --?
                            <!-- <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Volunteer</a></li> -->
                            <!-- <li class=""><a data-toggle="tab" href="#travel" aria-expanded="true">Travel Plans</a></li>
                            <li class=""><a data-toggle="tab" href="#sessions" aria-expanded="true">My Sessions</a></li>
                            <li class=""><a data-toggle="tab" href="#roommate" aria-expanded="true">Roommate Selection</a></li> -->
                            <li class=""><a data-toggle="tab" href="#souvenirs" aria-expanded="true">Souvenir Book</a></li>
                            <?php 
                                if ($data["agegroup"] == "JNF") {
                                    echo '<li class=""><a data-toggle="tab" href="#jnf-fb" aria-expanded="true">JNF Facebook Group</a></li>';
                                }

                            ?>
                        </ul>
                        <div class="tab-content">

                            <!-- My Account --> 
                            <div id="main" class="tab-pane active">
                                 <div class="row">
                                    <div class="col-md-12 margin30">
                                        <!--<p>Welcome to your YJA convention account! Your account information is shown below. Emergency contact, health insurance, and travel information can be edited using the tabs above. If any of your personal information is incorrect, please email <a href="mailto:reghelp@yja.org">reghelp@yja.org</a>.</p>-->
                                        <h3>Thank you for attending the 2016 YJA Convention!</h3>
                                        <p><strong>The souvenir book is now available to view and download by clicking on the Souvenir Book tab!</strong></p>
                                        <p>If you would like to view the convention videos, please <a href="videos">click here</a>.</p> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 margin30">
                                        <h3 class="heading">Personal Information</h3>
                                        <?php
                                            echo '
                                                <p>
                                                <strong>'.$data["firstname"].' '.$data["lastname"].'</strong><br>
                                                '.$data["address1"].', '.$data["address2"].'<br>
                                                '.$data["city"].', '.$data["state"].' '.$data["zipcode"].'<br>
                                                Primary Phone: '.$data["primaryphone"].'<br>
                                                Secondary Phone: '.$data["secondaryphone"].'<br>
                                                '.$data["emailaddress"].'
                                                </p>

                                                <p>
                                                <strong>Gender: </strong>'.$data["gender"].'<br>
                                                <strong>Date of Birth: </strong>'.$data["dob"].'<br>
                                                <strong>Age Group: </strong>'.$data["agegroup"].'<br>
                                                <strong>Diet: </strong>'.$data["vegan"].'<br>
                                                <strong>Allergies: </strong>'.$data["allergies"].'<br>
                                                <strong>Shirt Size: </strong>'.$data["shirtsize"].'<br>
                                                <strong>Souvenir Book Type: </strong>'.$data["souvenirbook"].'<br>
                                                <strong>Special Needs: </strong>'.$data["specialneeds"].'<br>
                                                </p>

                                                <p><strong>Account ID: </strong>'.$data["id"].'</p>
                                                ';
                                        ?>
                                    </div>
<!--
                                    <div class="col-md-4 margin30">
                                        <h3 class="heading">Emergency Contact Information</h3>
                                        <?php
                                            echo '
                                                <p>
                                                <strong>'.$emergency["firstname"].' '.$emergency["lastname"].'</strong><br>
                                                <strong>Relationship: </strong>'.$emergency["relation"].'<br>
                                                Primary Phone: '.$emergency["primaryph"].'<br>
                                                Secondary Phone: '.$emergency["secondaryph"].'<br>
                                                '.$emergency["emailaddress"].'
                                                </p>
                                                ';
                                        ?>

                                        <h3 class="heading">Insurance Information</h3>
                                        <?php
                                            echo '
                                                <p>
                                                <strong>Policy Holder Name: </strong>'.$insurance["firstname"].' '.$insurance["lastname"].'<br>
                                                <strong>Carrier: </strong>'.$insurance["carrier"].'<br>
                                                <strong>Policy Type: </strong>'.$insurance["policyno"].'<br>
                                                <strong>ID Number: </strong>'.$insurance["idnumber"].'<br>
                                                <strong>Group Number: </strong>'.$insurance["groupno"].'<br>
                                                <strong>Phone Number: </strong>'.$insurance["phonenumber"].'<br>
                                                </p>
                                                ';
                                        ?>
                                    </div>

                                    <div class="col-md-4 margin30">
                                        <h3 class="heading">Roommate Preference</h3>
                                        <?php
                                            if ($complete["roomate_done"] == "0") {
                                                echo '<p>You have not selected a roommate. You will be assigned a random roommate.</p>';
                                            } elseif ($complete["roomate_done"] == "1") {
                                                echo '<p><strong>Preferred Roommate: </strong>'.$roomate["firstname"].' '.$roomate["lastname"].'</p>';
                                            }
                                        ?>

                                        <h3 class="heading">Travel Information</h3>
                                        <?php
                                            if ($flight["unsure"] == "1") {
                                                echo '<p>You are unsure of your travel plans at this time.</p>';
                                            } elseif ($flight["notflying"] == "1") {
                                                echo '
                                                    <p><strong>You are not flying to Los Angeles.</strong><br>
                                                    <strong>Arrival Time: </strong>'.$flight["arrival"].'<br>
                                                    <strong>Departure Time: </strong>'.$flight["departure"].'<br>
                                                    </p>
                                                    ';
                                            } elseif ($flight["notflying"] == "0") {
                                                echo '
                                                    <p><strong>You are flying to Los Angeles.</strong><br>
                                                    <strong>Arrival Flight: </strong>'.$flight["arrival_airline"].' '.$flight["arrival_flightno"].'<br>
                                                    <strong>Arrival Time: </strong>'.$flight["arrival"].'<br>
                                                    <strong>Departure Flight: </strong>'.$flight["departure_airline"].' '.$flight["departure_flightno"].'<br>
                                                    <strong>Departure Time: </strong>'.$flight["departure"].'<br>
                                                    </p>
                                                    ';
                                            }
                                        ?>

                                        <h3 class="heading">Volunteer Information</h3>
                                        <?php
                                            if ($volunteer["preference"] == "NA") {
                                                echo '<strong>Volunteer Type: </strong>Not Volunteering';
                                            } else {
                                                echo '<strong>Volunteer Type: </strong>.$volunteer["preference"].';
                                            }
                                        ?>

                                    </div>
                                    -->

                                </div>


                            </div>
                            <!-- My Account -->
                            
                            <!-- Emergency --> 
                            <div id="emergency" class="tab-pane">
                                <h3 class="heading">Emergency Information</h3>
                                <form method="POST" id="emergencyinfo">
                                    <input type="hidden" name="updateCat" value="emergency" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Emergency Contact First Name<span>*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo $emergency["firstname"]; ?>" value="<?php echo $emergency["firstname"]; ?>" name="emergencyfirstname" id="emergencyfirstname" required>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Emergency Contact Last Name<span>*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo $emergency["lastname"]; ?>" value="<?php echo $emergency["lastname"]; ?>" name="emergencylastname" id="emergencylastname" required>
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
                                        <input class="form-control" placeholder="<?php echo $emergency["emailaddress"]; ?>" value="<?php echo $emergency["emailaddress"]; ?>" id="emergencyemailaddress" name="emergencyemailaddress" required>
                                        <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                               <label>Relationship to Emergency Contact<span>*</span></label>
                                        <input class="form-control" placeholder="<?php echo $emergency["relation"]; ?>" value="<?php echo $emergency["relation"]; ?>" id="Relationship" name="relationship" required>
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
                                                <input class="form-control" placeholder="<?php echo $emergency["primaryph"]; ?>" value="<?php echo $emergency["primaryph"]; ?>" id="emergencyprimaryph" name="emergencyprimaryph" required>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                               <label>Emergency Contact Secondary Phone Number</label>
                                                <input class="form-control" placeholder="<?php echo $emergency["secondaryph"]; ?>" value="<?php echo $emergency["secondaryph"]; ?>" id="emergencysecondaryph" name="emergencysecondaryph" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">       
                                    <div class="form-group col-xs-6">
                                        <button type="submit" class="btn btn-theme-bg btn-lg">Update</button>
                                    </div>
                                </div>
                                </form>

                            </div>                           
                            <!-- Emergency --> 


                            <!-- Insurance --> 
                            <div id="insurance" class="tab-pane">
                                <form id="insuranceupdate" method="POST">
                                <h3 class="heading">Insurance Information</h3>
                                <input type="hidden" name="updateCat" value="insurance" />
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Policy Holder First Name</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $insurance["firstname"]; ?>" value="<?php echo $insurance["firstname"]; ?>" name="policyfirstname" id="policyfirstname" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-4">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Policy Holder Last Name</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $insurance["lastname"]; ?>" value="<?php echo $insurance["lastname"]; ?>" name="policylastname" id="policylastname">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Insurance Carrier</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $insurance["carrier"]; ?>" value="<?php echo $insurance["carrier"]; ?>" name="insurancecarrier" id="insurancecarrier" >
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
                                                <input type="text" class="form-control"  placeholder="<?php echo $insurance["policyno"]; ?>" value="<?php echo $insurance["policyno"]; ?>" name="policytype" id="policytype" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-6">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Insurance Group Number</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $insurance["groupno"]; ?>" value="<?php echo $insurance["groupno"]; ?>" name="groupno" id="groupno">
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
                                                <input type="text" class="form-control" placeholder="<?php echo $insurance["idnumber"]; ?>" value="<?php echo $insurance["idnumber"]; ?>" name="idnumber" id="idnumber" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="col-md-6">
                                        <div class="row control-group">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Insurance Phone Number</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $insurance["phonenumber"]; ?>" value="<?php echo $insurance["phonenumber"]; ?>" name="insurancephone" id="insurancephone" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                                
                                <div class="row">       
                                    <div class="form-group col-xs-6">
                                        <button type="submit" class="btn btn-theme-bg btn-lg">Update</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- Insurance --> 

                            <!-- Travel --> 
                            <div id="travel" class="tab-pane">
                                <h3 class="heading">Travel Plans</h3>

                                <form method="POST" id="flightinfo" >
                                <input type="hidden" name="updateCat" value="flight" />

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row control-group">
                                            <div id="checkUnsure" class="checkbox col-xs-12 controls">
                                                <?php
                                                if ($flight["unsure"] == "1") {
                                                    echo '<label><input id="unsure" name="unsure" value="1" type="checkbox" onchange="hideAllTravel()" checked><strong>I am unsure of my travel plans at this time.</strong></label>';
                                                } elseif ($flight["unsure"] == "0") {
                                                    echo '<label><input id="unsure" name="unsure" value="1" type="checkbox" onchange="hideAllTravel()"><strong>I am unsure of my travel plans at this time.</strong></label>';
                                                }
                                                ?>
                                                <script type="text/javascript">
                                                    $(function () {
                                                        if($('#unsure').is(":checked")) {
                                                            $('#checkNotFlying').hide();
                                                            $('#allArrivalInfo').hide();
                                                            $('#allDepartureInfo').hide();
                                                            $('#arr_time').hide();
                                                            $('#dep_time').hide();
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row control-group">
                                            <div id="checkNotFlying" class="checkbox col-xs-12 controls">
                                                <?php
                                                if ($flight["notflying"] == "1") {
                                                    echo '<label><input id="notflying" name="notflying" value="1" type="checkbox" onchange="hideFlight()" checked><strong>I will NOT be flying to Los Angeles.</strong></label>';
                                                } elseif ($flight["notflying"] == "0") {
                                                    echo '<label><input id="notflying" name="notflying" value="1" type="checkbox" onchange="hideFlight()"><strong>I will NOT be flying to Los Angeles.</strong></label>';
                                                }
                                                ?>
                                                <script type="text/javascript">
                                                    $(function () {
                                                        if($('#notflying').is(":checked")) {
                                                            $('#arr_airline').hide();
                                                            $('#arr_flightno').hide();
                                                            $('#dep_airline').hide();
                                                            $('#dep_flightno').hide();
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 

                                <div class="row">
                                    <div class="col-md-6" id="allArrivalInfo">
                                        <h3 class="heading">Arrival Information</h3>
                                        <div class="row control-group" id="arr_airline">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Airline<span>*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo $flight["arrival_airline"]; ?>" value="<?php echo $flight["firstname"]; ?>" name="arrivalairline" id="arrivalairline" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <div class="row control-group" id="arr_flightno">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Flight Number<span>*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo $flight["arrival_flightno"]; ?>" value="<?php echo $flight["lastname"]; ?>" name="arrivalflightnumber" id="arrivalflightnumber" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-6" id="allDepartureInfo">
                                        <h3 class="heading">Departure Information</h3>
                                        <div class="row control-group" id="dep_airline">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Airline<span>*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo $flight["departure_airline"]; ?>" value="<?php echo $flight["firstname"]; ?>" name="departureairline" id="departureairline" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <div class="row control-group" id="dep_flightno">
                                            <div class="form-group col-xs-12 controls">
                                                <label>Flight Number<span>*</span></label>
                                                <input type="text" class="form-control" placeholder="<?php echo $flight["departure_flightno"]; ?>" value="<?php echo $flight["lastname"]; ?>" name="departureflightnumber" id="departureflightnumber" >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-6 margin30" id="arr_time">
                                        <label>Arrival Date/Time<span>*</span></label>
                                        <div style="overflow:hidden;">
                                            <div class="form-group">
                                                <div id="datetimepicker12"></div>
                                            </div>
                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker12').datetimepicker({
                                                        defaultDate: <?php echo '"'.$flight['arrival'].'"' ?>,
                                                        inline: true,
                                                        sideBySide: true
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-6 margin30" id="dep_time">
                                        <label>Departure Date/Time<span>*</span></label>
                                        <div style="overflow:hidden;">
                                            <div class="form-group">
                                                <div id="datetimepicker22"></div>
                                            </div>
                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker22').datetimepicker({
                                                        defaultDate: <?php echo '"'.$flight['departure'].'"' ?>,
                                                        inline: true,
                                                        sideBySide: true
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>

                                </div>  

                                <div class="row">       
                                    <div class="form-group col-xs-6">
                                        <button type="submit" class="btn btn-theme-bg btn-lg">Update</button>
                                    </div>
                                </div>              


                                <script>
                                $("#flightinfo").submit(function(e){
                                    e.preventDefault(); 
                                    var a = $('#datetimepicker12').data('date');
                                    var d = $('#datetimepicker22').data('date');
                                    $('<input />').attr('type', 'hidden')
                                    .attr('name', 'arrival')
                                    .attr('value', a)
                                    .appendTo('#flightinfo');

                                    $('<input />').attr('type', 'hidden')
                                    .attr('name', 'departure')
                                    .attr('value', d)
                                    .appendTo('#flightinfo');

                                    this.submit();
                                                        });
                                </script>

                                </form>
                            </div>
                            <!-- Travel --> 


                            <!-- Sessions -->
                            <div id="sessions" class="tab-pane">

                                <?php /* if ($complete["travel_done"] == 0):  */ ?>
                                    <!-- <div class="row">
                                        <div class="col-md-12 margin30">
                                            <h3 class="heading">Session Registration</h3>
                                            <div role="alert" class="alert alert-danger"><center><strong>You MUST complete your Travel Plans in order to access session registration.</strong> Please click on the "Travel Plans" tab above to enter your travel arrangements. Once you submit your travel plans, click on the Session Registration tab and you will be able to register for sessions.<br>If you are having trouble entering your travel plans, please email reghelp@yja.org.</center></div>
                                        </div>
                                    </div>
                                    -->
                                <?php  /* elseif($complete["travel_done"] == 1): */ ?>
                                    <div class="row">
                                         <!-- <div class="col-md-6 margin30"> 
                                            <h3 class="heading">Session Registration</h3>
                                            <p>To register for a session, please click on the button below. Session registration is first come, first served. </p>
                                            <p>On the next page, click a time slot on the left. Choose a session that you like and click on the Register button for that session. You must do this for each time slot. If you would like to unregister for a session and/or choose a different session, go to that time slot and click on the Unregister button. At that point, you will be able to register for a different session.</p>
                                            <p>You can view all of your sessions by clicking on the "My Sessions" tab on the left.</p>
                                            <p><strong>Deadline to register is Sunday, June 12, 11:59 PM PST.</strong></p>
                                            <p>If you are having trouble registering for sessions, please email <a href="mailto:reghelp@yja.org">reghelp@yja.org</a>.</p>
                                            <a href="session_registration?schedule=1" class="btn btn-theme-bg btn-lg">Register for Sessions</a>
                                        </div>-->

                                        <div class="col-md-12 margin30"> 
                                            <h3 class="heading">My Sessions</h3>
                                            <p>Session registration has now closed. We will place you in a session if you did not sign up for a session during a specific time slot. Thank you!</p>
                                            <table class="table table-hover" id="sponsorship-table">
                                                <thead>
                                                    <tr>
                                                        <th>Day and Time</th>
                                                        <th>Session</th>  
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    foreach (array_slice($sessions,1) as $key => $value) {
                                                 

                                                        if (!is_numeric($key)){

                                                            //Breaks down the column into usable strings for time
                                                            $datetemp = date_create($key); 
                                                         
                                                            $day_temp = date_format($datetemp, 'l');
                                                            $time_temp = date_format($datetemp, 'g:i A');


                                                            if($value == 0){
                                                               echo "<tr><td>".$day_temp." ".$time_temp."</td><td><strong>No Session Registered</strong></td></tr>";
                                                            }    

                                                            else{ 
                                                               echo "<tr><td>".$day_temp." ".$time_temp."</td><td>".$sessions_test[$value]."</td></tr>";
                                                            }

                                                                       
                                                            
                                                        }

                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                <?php /* endif; */ ?>

                            </div>
                               

                            <!-- Roommate --> 
                            <div id="roommate" class="tab-pane">
                                <h3 class="heading">Roommate Selection</h3>

                                <?php if ($complete["roomate_done"] == 0): ?>
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <p>You did not select a preferred roommate. You will be assigned a random roommate.</p>
                                        </div>
                                    </div>
                                        
                                    <!--
                                    <p>If you would like to be roomed with a certain person, select that individual using the dropdown below and click submit. You are allowed to choose only one preferred roommate. If you do not request anyone, you will be assigned a random roommate.<br>
                                    NOTE: Only those of the same gender and age group are possible roommates.</p>
                                    <p><strong>** BOTH you and your roommate must request each other in order for your request to be eligible. **</strong></p>   

                                    <form method="POST" id="roomate">
                                    <div class="row">
                                        <input type="hidden" name="updateCat" value="roomate" />
                                        <input type="hidden" name="id" value=<?php /* echo '"'.$data["id"].'"'; */ ?>>
                                        <div class="col-md-6">
                                            <div class="row control-group">
                                                <div class="form-group col-xs-12 controls">
                                                <label>Select your preferred roommate from the dropdown:<span>*</span></label> 
                                                <select name="selected" class="form-control" >
                                                    <?php
                                                        /* 
                                                        for($i=0; $i<sizeof($agegroup_users);$i++){
                                                            echo '<option value="'.$agegroup_users[$i]["id"].'">'.ucfirst(strtolower($agegroup_users[$i]["firstname"])).' '.ucfirst(strtolower($agegroup_users[$i]["lastname"])).' | '.$agegroup_users[$i]["city"].', '.$agegroup_users[$i]["state"].'</option>';
                                                        }
                                                        */ 
                                                    ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>                                         
                                    </div>      
                                    <div class="row">       
                                        <div class="form-group col-xs-6">
                                            <button type="submit" class="btn btn-theme-bg btn-lg">Submit</button>
                                        </div>
                                    </div>
                                    </form>

                                -->
          
                                <?php elseif($complete["roomate_done"] == 1): ?>
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <p>You have selected <strong><?php echo $roomate["firstname"]. " " . $roomate["lastname"]; ?></strong> as your roommate. We will do our best to accomodate your request. Thank you.</p>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                            <!-- Roommate -->

                            <!-- Souvenir Book -->
                            <div id="souvenirs" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-6 margin30">
                                        <h3 class="heading">Souvenir Book</h3>
                                        <p>To view and/or download the souvenir book, click on the link below.</p>
                                        <p><a href="assets/SouvenirBook2016.pdf" target="_blank">Souvenir Book</a></p>
                                        <?php 
                                            if ($data["agegroup"] == "JNF") {
                                                echo '<p><a href="assets/SouvenirBook_JNF.pdf" target="_blank">JNF Souvenir Book</a></p>';
                                            }

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- JNF Facebook -->

                            <!-- JNF Facebook -->
                            <div id="jnf-fb" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-6 margin30">
                                        <h3 class="heading">JNF Facebook Group</h3>
                                        <p>If you are interested in joining the JNF Facebook group, please <a href="https://www.facebook.com/groups/jnf2016/"><strong>click here</strong></a>.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- JNF Facebook -->

                        </div>
                    </div>
                </div><!--column end-->
            </div><!--column end-->

            <?php endif; ?>

        </div>

        </div><!--.container-->
        
        <div class="divide60"></div>
        
        <?php include "config/footer.php" ?>

        <!--scripts and plugins -->

 <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script> 
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.js"></script>
  <script src="/js/init.js"></script>


<script>
function hideFlight()
{
    if($('#notflying').is(":checked")) {
        $('#arr_airline').hide();
        $('#arr_flightno').hide();
        $('#dep_airline').hide();
        $('#dep_flightno').hide();
    } else {
        $('#arr_airline').show();
        $('#arr_flightno').show();
        $('#dep_airline').show();
        $('#dep_flightno').show();
    }
}
</script>

<script>
function hideAllTravel()
{
    if($('#unsure').is(":checked")) {
        $('#checkNotFlying').hide();
        $('#allArrivalInfo').hide();
        $('#allDepartureInfo').hide();
        $('#arr_time').hide();
        $('#dep_time').hide();
    } else {
        $('#checkNotFlying').show();
        $('#allArrivalInfo').show();
        $('#allDepartureInfo').show();
        $('#arr_time').show();
        $('#dep_time').show();
    }
}
</script>



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
