<?php

/**
 * Sign Up a New User
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to NOT be logged in before they can see this page
Auth::getInstance()->requireGuest();

//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = User::signup($_POST);

    if (empty($user->errors)) {

    //Redirect to Signup Success Page
    Util::redirect('/registration3.php');
    exit;
    }

} elseif (isset( $_REQUEST["provider"] )) {    // One Click Social Login
  // the selected provider
  $provider_name = $_REQUEST["provider"];

  if (Auth::getInstance()->socialauth($provider_name)) {
    if (isset($_SESSION['return_to'])) {
     $url = '/'.$_SESSION['return_to'];
     unset($_SESSION['return_to']);
    } else {
      $url = '/index.php';
    }
    Util::redirect($url);
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
        <title><?php echo $config_title; ?> | Registration - Step 1</title>
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
                        <h4>Register Step 1/3</h4>
                    </div>
                     
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>





<?php if (isset($user)): ?>
  <ul class="errors">
    <?php foreach ($user->errors as $error): ?>
      <li><?php echo $error; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>



        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">Register an Account</h3>
                    <p>
                        Please fill out the information below in order to begin the registration process. This will create a login for you so you can edit account details or make payments. Until you receive an email with a 2016 YJA Convention registration confirmation, you still need to submit information. View your application status on your account page.
                    </p>
                    <div class="divide30"></div>
                    <div class="form-contact">
                        <div class="required">
                            <p>( <span>*</span> fields are required )</p>
                        </div>

                       <form id="signupForm" method="post" novalidate >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Legal First Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" required >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-4">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Legal Middle Name</label>
                                            <input type="text" class="form-control" name="middlename" placeholder="Middle Name" id="middlename">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Legal Last Name<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" required >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                            </div>                

                            <div class="row">

                                 <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Email Address<span>*</span></label>
                                    <input class="form-control" placeholder="Email Address" id="emailaddress" name="emailaddress" required >
                                    <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-3">

                                    <label>Enter Your Birthdate (i.e. 01/01/1992)<span>*</span></label>
                                    <div class="row control-group">

                                        <div class="form-group col-xs-4 controls">
                                            <input type="text" class="form-control" placeholder="mm" maxlength="2" id="dobmonth" name="dobmonth" required >
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group col-xs-4 controls"> 
                                            <input type="text" class="form-control" placeholder="dd" maxlength="2" id="dobday" name="dobday" required >
                                            <p class="help-block"></p>
                                        </div>

                                           <div class="form-group col-xs-4 controls"> 
                                            <input type="text" class="form-control" placeholder="yyyy" maxlength="4" id="dobyear" name="dobyear" required >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

                                 <div class="col-md-3">
                                            <label>Gender: <span>*</span></label>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label class="radio-inline"><input type="radio" name="gender" value="male" required>Male</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>

 

                            </div>


                            <div class="row control-group">
                                <div class="form-group col-xs-12 controls">
                                    <label>Password<span>*</span></label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required  >
                                    <p class="help-block"></p>
                                </div>

                                <div class="form-group col-xs-12 controls">
                                    <label>Confirm Password<span>*</span></label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" data-match="#password" name="password_confirmation" id="passwordconf" required >
                                    <p class="help-block"></p>
                                </div>

                            </div>
                            <br>
                             <div class="row">                               

                                <div class="col-md-12">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Address Line 1<span>*</span></label>
                                            <input class="form-control" placeholder="Address Line 1" id="address1" name="address1" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Address Line 2</label>
                                            <input class="form-control" placeholder="Address Line 2" id="address2" name="address2" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">                                   
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Country<span>*</span></label>
                                            <select class="form-control" id="country" name="country" required>
                                                <option selected="selected" value="USA">United States</option>
                                                <option value="AFG">Afghanistan</option>
                                                <option value="ALA">Åland Islands</option>
                                                <option value="ALB">Albania</option>
                                                <option value="DZA">Algeria</option>
                                                <option value="ASM">American Samoa</option>
                                                <option value="AND">Andorra</option>
                                                <option value="AGO">Angola</option>
                                                <option value="AIA">Anguilla</option>
                                                <option value="ATA">Antarctica</option>
                                                <option value="ATG">Antigua and Barbuda</option>
                                                <option value="ARG">Argentina</option>
                                                <option value="ARM">Armenia</option>
                                                <option value="ABW">Aruba</option>
                                                <option value="AUS">Australia</option>
                                                <option value="AUT">Austria</option>
                                                <option value="AZE">Azerbaijan</option>
                                                <option value="BHS">Bahamas</option>
                                                <option value="BHR">Bahrain</option>
                                                <option value="BGD">Bangladesh</option>
                                                <option value="BRB">Barbados</option>
                                                <option value="BLR">Belarus</option>
                                                <option value="BEL">Belgium</option>
                                                <option value="BLZ">Belize</option>
                                                <option value="BEN">Benin</option>
                                                <option value="BMU">Bermuda</option>
                                                <option value="BTN">Bhutan</option>
                                                <option value="BOL">Bolivia, Plurinational State of</option>
                                                <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BIH">Bosnia and Herzegovina</option>
                                                <option value="BWA">Botswana</option>
                                                <option value="BVT">Bouvet Island</option>
                                                <option value="BRA">Brazil</option>
                                                <option value="IOT">British Indian Ocean Territory</option>
                                                <option value="BRN">Brunei Darussalam</option>
                                                <option value="BGR">Bulgaria</option>
                                                <option value="BFA">Burkina Faso</option>
                                                <option value="BDI">Burundi</option>
                                                <option value="KHM">Cambodia</option>
                                                <option value="CMR">Cameroon</option>
                                                <option value="CAN">Canada</option>
                                                <option value="CPV">Cape Verde</option>
                                                <option value="CYM">Cayman Islands</option>
                                                <option value="CAF">Central African Republic</option>
                                                <option value="TCD">Chad</option>
                                                <option value="CHL">Chile</option>
                                                <option value="CHN">China</option>
                                                <option value="CXR">Christmas Island</option>
                                                <option value="CCK">Cocos (Keeling) Islands</option>
                                                <option value="COL">Colombia</option>
                                                <option value="COM">Comoros</option>
                                                <option value="COG">Congo</option>
                                                <option value="COD">Congo, the Democratic Republic of the</option>
                                                <option value="COK">Cook Islands</option>
                                                <option value="CRI">Costa Rica</option>
                                                <option value="CIV">Côte d'Ivoire</option>
                                                <option value="HRV">Croatia</option>
                                                <option value="CUB">Cuba</option>
                                                <option value="CUW">Curaçao</option>
                                                <option value="CYP">Cyprus</option>
                                                <option value="CZE">Czech Republic</option>
                                                <option value="DNK">Denmark</option>
                                                <option value="DJI">Djibouti</option>
                                                <option value="DMA">Dominica</option>
                                                <option value="DOM">Dominican Republic</option>
                                                <option value="ECU">Ecuador</option>
                                                <option value="EGY">Egypt</option>
                                                <option value="SLV">El Salvador</option>
                                                <option value="GNQ">Equatorial Guinea</option>
                                                <option value="ERI">Eritrea</option>
                                                <option value="EST">Estonia</option>
                                                <option value="ETH">Ethiopia</option>
                                                <option value="FLK">Falkland Islands (Malvinas)</option>
                                                <option value="FRO">Faroe Islands</option>
                                                <option value="FJI">Fiji</option>
                                                <option value="FIN">Finland</option>
                                                <option value="FRA">France</option>
                                                <option value="GUF">French Guiana</option>
                                                <option value="PYF">French Polynesia</option>
                                                <option value="ATF">French Southern Territories</option>
                                                <option value="GAB">Gabon</option>
                                                <option value="GMB">Gambia</option>
                                                <option value="GEO">Georgia</option>
                                                <option value="DEU">Germany</option>
                                                <option value="GHA">Ghana</option>
                                                <option value="GIB">Gibraltar</option>
                                                <option value="GRC">Greece</option>
                                                <option value="GRL">Greenland</option>
                                                <option value="GRD">Grenada</option>
                                                <option value="GLP">Guadeloupe</option>
                                                <option value="GUM">Guam</option>
                                                <option value="GTM">Guatemala</option>
                                                <option value="GGY">Guernsey</option>
                                                <option value="GIN">Guinea</option>
                                                <option value="GNB">Guinea-Bissau</option>
                                                <option value="GUY">Guyana</option>
                                                <option value="HTI">Haiti</option>
                                                <option value="HMD">Heard Island and McDonald Islands</option>
                                                <option value="VAT">Holy See (Vatican City State)</option>
                                                <option value="HND">Honduras</option>
                                                <option value="HKG">Hong Kong</option>
                                                <option value="HUN">Hungary</option>
                                                <option value="ISL">Iceland</option>
                                                <option value="IND">India</option>
                                                <option value="IDN">Indonesia</option>
                                                <option value="IRN">Iran, Islamic Republic of</option>
                                                <option value="IRQ">Iraq</option>
                                                <option value="IRL">Ireland</option>
                                                <option value="IMN">Isle of Man</option>
                                                <option value="ISR">Israel</option>
                                                <option value="ITA">Italy</option>
                                                <option value="JAM">Jamaica</option>
                                                <option value="JPN">Japan</option>
                                                <option value="JEY">Jersey</option>
                                                <option value="JOR">Jordan</option>
                                                <option value="KAZ">Kazakhstan</option>
                                                <option value="KEN">Kenya</option>
                                                <option value="KIR">Kiribati</option>
                                                <option value="PRK">Korea, Democratic People's Republic of</option>
                                                <option value="KOR">Korea, Republic of</option>
                                                <option value="KWT">Kuwait</option>
                                                <option value="KGZ">Kyrgyzstan</option>
                                                <option value="LAO">Lao People's Democratic Republic</option>
                                                <option value="LVA">Latvia</option>
                                                <option value="LBN">Lebanon</option>
                                                <option value="LSO">Lesotho</option>
                                                <option value="LBR">Liberia</option>
                                                <option value="LBY">Libya</option>
                                                <option value="LIE">Liechtenstein</option>
                                                <option value="LTU">Lithuania</option>
                                                <option value="LUX">Luxembourg</option>
                                                <option value="MAC">Macao</option>
                                                <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MDG">Madagascar</option>
                                                <option value="MWI">Malawi</option>
                                                <option value="MYS">Malaysia</option>
                                                <option value="MDV">Maldives</option>
                                                <option value="MLI">Mali</option>
                                                <option value="MLT">Malta</option>
                                                <option value="MHL">Marshall Islands</option>
                                                <option value="MTQ">Martinique</option>
                                                <option value="MRT">Mauritania</option>
                                                <option value="MUS">Mauritius</option>
                                                <option value="MYT">Mayotte</option>
                                                <option value="MEX">Mexico</option>
                                                <option value="FSM">Micronesia, Federated States of</option>
                                                <option value="MDA">Moldova, Republic of</option>
                                                <option value="MCO">Monaco</option>
                                                <option value="MNG">Mongolia</option>
                                                <option value="MNE">Montenegro</option>
                                                <option value="MSR">Montserrat</option>
                                                <option value="MAR">Morocco</option>
                                                <option value="MOZ">Mozambique</option>
                                                <option value="MMR">Myanmar</option>
                                                <option value="NAM">Namibia</option>
                                                <option value="NRU">Nauru</option>
                                                <option value="NPL">Nepal</option>
                                                <option value="NLD">Netherlands</option>
                                                <option value="NCL">New Caledonia</option>
                                                <option value="NZL">New Zealand</option>
                                                <option value="NIC">Nicaragua</option>
                                                <option value="NER">Niger</option>
                                                <option value="NGA">Nigeria</option>
                                                <option value="NIU">Niue</option>
                                                <option value="NFK">Norfolk Island</option>
                                                <option value="MNP">Northern Mariana Islands</option>
                                                <option value="NOR">Norway</option>
                                                <option value="OMN">Oman</option>
                                                <option value="PAK">Pakistan</option>
                                                <option value="PLW">Palau</option>
                                                <option value="PSE">Palestinian Territory, Occupied</option>
                                                <option value="PAN">Panama</option>
                                                <option value="PNG">Papua New Guinea</option>
                                                <option value="PRY">Paraguay</option>
                                                <option value="PER">Peru</option>
                                                <option value="PHL">Philippines</option>
                                                <option value="PCN">Pitcairn</option>
                                                <option value="POL">Poland</option>
                                                <option value="PRT">Portugal</option>
                                                <option value="PRI">Puerto Rico</option>
                                                <option value="QAT">Qatar</option>
                                                <option value="REU">Réunion</option>
                                                <option value="ROU">Romania</option>
                                                <option value="RUS">Russian Federation</option>
                                                <option value="RWA">Rwanda</option>
                                                <option value="BLM">Saint Barthélemy</option>
                                                <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KNA">Saint Kitts and Nevis</option>
                                                <option value="LCA">Saint Lucia</option>
                                                <option value="MAF">Saint Martin (French part)</option>
                                                <option value="SPM">Saint Pierre and Miquelon</option>
                                                <option value="VCT">Saint Vincent and the Grenadines</option>
                                                <option value="WSM">Samoa</option>
                                                <option value="SMR">San Marino</option>
                                                <option value="STP">Sao Tome and Principe</option>
                                                <option value="SAU">Saudi Arabia</option>
                                                <option value="SEN">Senegal</option>
                                                <option value="SRB">Serbia</option>
                                                <option value="SYC">Seychelles</option>
                                                <option value="SLE">Sierra Leone</option>
                                                <option value="SGP">Singapore</option>
                                                <option value="SXM">Sint Maarten (Dutch part)</option>
                                                <option value="SVK">Slovakia</option>
                                                <option value="SVN">Slovenia</option>
                                                <option value="SLB">Solomon Islands</option>
                                                <option value="SOM">Somalia</option>
                                                <option value="ZAF">South Africa</option>
                                                <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SSD">South Sudan</option>
                                                <option value="ESP">Spain</option>
                                                <option value="LKA">Sri Lanka</option>
                                                <option value="SDN">Sudan</option>
                                                <option value="SUR">Suriname</option>
                                                <option value="SJM">Svalbard and Jan Mayen</option>
                                                <option value="SWZ">Swaziland</option>
                                                <option value="SWE">Sweden</option>
                                                <option value="CHE">Switzerland</option>
                                                <option value="SYR">Syrian Arab Republic</option>
                                                <option value="TWN">Taiwan, Province of China</option>
                                                <option value="TJK">Tajikistan</option>
                                                <option value="TZA">Tanzania, United Republic of</option>
                                                <option value="THA">Thailand</option>
                                                <option value="TLS">Timor-Leste</option>
                                                <option value="TGO">Togo</option>
                                                <option value="TKL">Tokelau</option>
                                                <option value="TON">Tonga</option>
                                                <option value="TTO">Trinidad and Tobago</option>
                                                <option value="TUN">Tunisia</option>
                                                <option value="TUR">Turkey</option>
                                                <option value="TKM">Turkmenistan</option>
                                                <option value="TCA">Turks and Caicos Islands</option>
                                                <option value="TUV">Tuvalu</option>
                                                <option value="UGA">Uganda</option>
                                                <option value="UKR">Ukraine</option>
                                                <option value="ARE">United Arab Emirates</option>
                                                <option value="GBR">United Kingdom</option>
                                                <option value="USA">United States</option>
                                                <option value="UMI">United States Minor Outlying Islands</option>
                                                <option value="URY">Uruguay</option>
                                                <option value="UZB">Uzbekistan</option>
                                                <option value="VUT">Vanuatu</option>
                                                <option value="VEN">Venezuela, Bolivarian Republic of</option>
                                                <option value="VNM">Viet Nam</option>
                                                <option value="VGB">Virgin Islands, British</option>
                                                <option value="VIR">Virgin Islands, U.S.</option>
                                                <option value="WLF">Wallis and Futuna</option>
                                                <option value="ESH">Western Sahara</option>
                                                <option value="YEM">Yemen</option>
                                                <option value="ZMB">Zambia</option>
                                                <option value="ZWE">Zimbabwe</option>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">                                   
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>City<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="City" id="city" name="city" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" id="state_dropdown">                                   
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls"> 
                                            <label>State<span>*</span></label>
                                            <select class="form-control" name="state" required>
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="CA">California</option>
                                                <option value="CO">Colorado</option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="DC">District Of Columbia</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="HI">Hawaii</option>
                                                <option value="ID">Idaho</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IN">Indiana</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NV">Nevada</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="OH">Ohio</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="OR">Oregon</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="TX">Texas</option>
                                                <option value="UT">Utah</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WA">Washington</option>
                                                <option value="WV">West Virginia</option>
                                                <option value="WI">Wisconsin</option>
                                                <option value="WY">Wyoming</option>
                                            </select>               
                
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" id="state_input" style="display:none;">                                   
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls"> 
                                            <label>State<span>*</span></label>
                                            <input type="text" class="form-control" placeholder="State" id="state" name="state" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" >                                   
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls"> 
                                            <label>Zip Code<span>*</span></label>
                                            <input type="text" class="form-control" maxlength="5" placeholder="Zip Code" id="zipcode" name="zipcode" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Home Phone Number<span>*</span></label>
                                           <input class="form-control" placeholder="Primary Phone Number" id="primaryphone" name="primaryphone" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                           <label>Mobile Phone Number</label>
                                            <input class="form-control" placeholder="Secondary Phone Number" id="secondaryphone" name="secondaryphone" >
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                            <label>Dietary Preference?<span>*</span></label>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label class="radio-inline"><input type="radio" name="vegan" value="jain" checked>Jain</label>
                                            <label class="radio-inline"><input type="radio" name="vegan" value="vegan">Vegan</label>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Please write down any food allergies you may have, or any other dietary restrictions.</label>
                                            <textarea class="form-control" name="allergies" placeholder="Dietary Restrictions" id="allergies"></textarea>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>                

 

                         <div class="row">
                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>What kind of souvenir book would you like?<span>*</span></label>
                                            <select name="souvenirbook" class="form-control">
                                                <option value="digital" selected="digital">Digital</option>
                                                <option value="printed">Printed</option>
                                            </select>
                                             <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Shirt Size<span>*</span></label>
                                            <select class="form-control" name="shirtsize" required>
                                                <option value="">Select a Size</option>
                                                <option value="S">Small</option>
                                                <option value="M">Medium</option>
                                                <option value="L">Large</option>
                                                <option value="XL">Extra Large</option>
                                                <option value="2XL">2XL</option>
                                                <option value="3XL">3XL</option>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>
                                

                        <div class="col-md-12">
                            <div class="row control-group">
                                <div id="checkWaiver" class="checkbox col-xs-12 controls">
                                    <p style="color:#777;">The YJA Convention Souvenir Booklet will include a directory with attendees' state of residence, name, age, and email. You can choose to opt out of the directory.</p>
                                    <label><input id="opt_out" name="opt_out" value="1" type="checkbox" required> I do not want my name and contact information to be included in the Souvenir Booklet</label>
                                    
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div> 


                            </div>     



                            <div class="row">

                                <div class="col-md-12">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 controls">
                                            <label>Any other special needs?</label>
                                            <textarea class="form-control" name="specialneeds" placeholder="Wheelchair, Sign Language, etc.." id="specialneeds"></textarea>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                </div>
 
 

                            </div>

                            <div id="success"></div>
                            <div class="row">
                                 
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-theme-bg btn-lg">Register</button>
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

$('#country').change(function(){
    var country = $('#country').val(); 
    if (country == "USA"){
        $('#state_input').hide();
        $('#state_dropdown').show();
    }
    else {
        $('#state_dropdown').hide();
        $('#state_input').show();
    }
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
    });  return true;
});
</script>
 
    </body>
</html>
