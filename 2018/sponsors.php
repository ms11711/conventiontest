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
       
        <title><?php echo $config_title; ?> | Our Sponsors</title>
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

        <style>
        p {margin:0;}
        h3.level {color:#ff9933;}
        </style>

    </head>
    <body>

     <?php include "config/nav.php" ?>



        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Our Sponsors</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->

        <div class="divide40"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 style="text-align:center;">We are grateful for the generous support of our sponsors and donors for the 2016 YJA Convention.</h3>
                    <h3 style="text-align:center;">While we are still accepting <a href="sponsorship">sponsorships</a>, the 2016 YJA Convention Board would like to thank the following families, companies, and individuals for their support and partnership.</h3>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <h3 class="level" style="text-align:center;"><strong><u>Platinum Sponsors</strong></u></h3>
              </div>
                <div class="col-md-6 margin30">
                  <h3 style="text-align:center;"><a href="http://jaincenter.org"><img src="images/jcsc_logo.png" alt=""></a></h3>
                  <h3 style="text-align:center; margin-top:-15px">Anonymous</h3>
                  <h3 style="text-align:center;">Mukesh and Priti Chatter</h3>
                </div>
                <div class="col-md-6 margin30">
                  <h3 style="text-align:center;">Mr. and Mrs. Manahar Shah</h3>
                  <h3 style="text-align:center;">Popat and Kalpana Savla</h3>
                  <h3 style="text-align:center;">Silver Star Real Estates LLC</h3>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <h3 class="level" style="text-align:center;"><strong><u>Gold Sponsors</strong></u></h3>
              </div>
                <div class="col-md-6 margin30">
                    <h4 style="text-align:center;"><a href="http://jaina.org"><img src="images/jaina_logo.png" alt=""></a></h4>
                </div>  
                <div class="col-md-6 margin30">
                    <h4 style="text-align:center;"><a href="http://jainsocietydc.org">Jain Society of Metropolitan Washington</a></h4>
                    <h4 style="text-align:center;">Mahesh Wadher</h4>
                </div>
            </div>

            <div class="row">               
                <div class="col-md-12">
                    <h3 class="level" style="text-align:center;"><strong><u>Silver Sponsors</strong></u></h3>
                </div>
                <div class="col-md-6 margin30">
                    <h4 style="text-align:center;">Dinesh, Sunita, Ajay & Nilesh Dagli</h4>
                    <h4 style="text-align:center;"><a href="http://www.jcnc.org">Jain Center of Northern California</a></h4>
                    <h4 style="text-align:center;"><a href="http://www.jainsocietyhouston.org">Jain Society of Houston</a></h4> 
                </div>     
                <div class="col-md-6 margin30">              
                    <h4 style="text-align:center;">K.R. Gems & Diamonds International</h4>
                    <h4 style="text-align:center;">Prem Jain</h4>
                    <h4 style="text-align:center;">Rasiklal and Manjula Sheth Family (Equitable Properties, LLC)</h4>
                </div>

                <div class="col-md-12">
                    <h3 class="level" style="text-align:center;"><strong><u>Bronze Sponsors</strong></u></h3>
                </div>
                <div class="col-md-4 margin30">
                    <h4 style="text-align:center;">Aakash Diamonds Inc</h4>
                    <h4 style="text-align:center;">Ashok Domadia</h4>
                    <h4 style="text-align:center;">Ashok and Harshana Savla<h4>
                    <h4 style="text-align:center;">Chunilal and Ilaben Shah</h4>
                    <h4 style="text-align:center;">Girish Shah</h4>
                    <h4 style="text-align:center;">Haresh Shah</h4>
                    <h4 style="text-align:center;">House of Spices</h4>
                </div>
                <div class="col-md-4 margin30">
                  <h4 style="text-align:center;"><a href="http://www.jcgp.org">Jain Center of Greater Phoenix</a></h4> 
                  <h4 style="text-align:center;"><a href="http://www.jsmconline.org">Jain Center of Metro Chicago</a></h4> 
                    <h4 style="text-align:center;"><a href="http://www.jscnc.org">Jain Study Center of North Carolina</a></h4>                                      
                    <h4 style="text-align:center;">Kreate and Print</h4>
                    <h4 style="text-align:center;">Kunal Dagli</h4>
                    <h4 style="text-align:center;">Narendra and Sunita Jain</h4>
                    <h4 style="text-align:center;">Narendra Parson</h4>
                </div>
                <div class="col-md-4 margin30">
                    <h4 style="text-align:center;">Ryan Darton LLC</h4>
                    <h4 style="text-align:center;">Sharad Doshi</h4>
                    <h4 style="text-align:center;">Subhas Khara (Veer Hospitality Hawthorn Suites)</h4>
                    <h4 style="text-align:center;">Sushil, Rajshree, Avish, and Priyanka Jain</h4>
                    <h4 style="text-align:center;">Yogesh and Sangita Shah</h4>
                </div>



                <div class="col-md-12">
                    <h3 class="level" style="text-align:center;"><strong><u>Sponsors</strong></u></h3>
                </div>
                <div class="col-md-4 margin30">
                    <h5 style="text-align:center;">Ajay, Earth and Sonal Shah</h5>
                    <h5 style="text-align:center;">BioUrja Trading LLC</h5>
                    <h5 style="text-align:center;">Di-Moksh Diam Inc.</h5>
                    <h5 style="text-align:center;">Divyesh & Jaya Shah</h5>
                    <h5 style="text-align:center;">Drs. Ashok and Mamta Shaha</h5>
                    <h5 style="text-align:center;">Earth Star Imports</h5>
                    <h5 style="text-align:center;">Gems International of California</h5>
                    <h5 style="text-align:center;">Girish Shah</h5>
                    <h5 style="text-align:center;">Jagdish J. Shah</h5>
                    <h5 style="text-align:center;"><a href="http://www.jaincenterofconnecticut.org">Jain Center of Connecticut</a></h5>
                    <h5 style="text-align:center;"><a href="http://www.jcstl.org">Jain Center of Greater St. Louis</a></h5>
                </div>
                <div class="col-md-4 margin30">
                    <h5 style="text-align:center;"><a href="http://austinjainsangh.org">Jain Sangh of Greater Austin</a></h5>
                    <h5 style="text-align:center;"><a href="http://www.jsgd.org">Jain Society of Greater Detroit</a></h5>
                    <h5 style="text-align:center;"><a href="http://dfwjains.org">Jain Society of North Texas</a></h5>
                    <h5 style="text-align:center;">Jain Society of Pittsburgh</h5>
                    <h5 style="text-align:center;">Jayesh and Jigna Vadeca</h5>
                    <h5 style="text-align:center;">Kansas City Jain Sangh</h5>
                    <h5 style="text-align:center;">Ketan JK Doshi</h5>
                    <h5 style="text-align:center;">Lata Jayesh Savla and Family</h5>
                    <h5 style="text-align:center;">Mayur & Rita Lodaya</h5>
                    <h5 style="text-align:center;">Narendrae and Surekha Jain</h5>
                    <h5 style="text-align:center;">Neon Gems, Inc.</h5>
                </div>
                <div class="col-md-4 margin30">
                    <h5 style="text-align:center;">Nishith Pravin Choksi</h5>
                    <h5 style="text-align:center;">Pranav Patel</h5>
                    <h5 style="text-align:center;">Rajeev and Darshana Gala</h5>
                    <h5 style="text-align:center;">Rao and Indira Yalmanchili</h5>
                    <h5 style="text-align:center;">Sheth Family Foundation Inc.</h5>
                    <h5 style="text-align:center;">Shirish and Harsha Desia</h5>
                    <h5 style="text-align:center;">Sunit and Seema Jain</h5>
                    <h5 style="text-align:center;">The Parekh Family</h5>
                    <h5 style="text-align:center;">Urvashi, Praveen, Sunny, & Mishi Jain</h5>
                    <h5 style="text-align:center;">VM Pharmacy</h5>
                    <h5 style="text-align:center;">Yashwini Kamdar</h5>
                </div>


                <div class="col-md-12">
                    <h3 class="level" style="text-align:center;"><strong><u>Donors</strong></u></h3>
                </div>
                <div class="col-md-3 margin30">
                    <p style="text-align:center;">Anuradha Dharod</p>
                    <p style="text-align:center;">Arpan Shah</p>
                    <p style="text-align:center;">Arun D. Parikh (Ficke & Associates, Inc)</p>
                    <p style="text-align:center;">Arvind and Ramila</p>
                    <p style="text-align:center;">Ashish Shah and Payal Kamdar</p> 
                    <p style="text-align:center;">BC and Kokila Mehta</p>
                    <p style="text-align:center;">Bhumika Khona</p>
                    <p style="text-align:center;">Bipin K. Lapasia</p>
                    <p style="text-align:center;">Chandrakant and Pravina Shah</p>
                    <p style="text-align:center;">Chetan Ajmera</p>
                    <p style="text-align:center;">Chuni Gala/Gala & Associates Inc.</p>
                    <p style="text-align:center;">Darshana and Hemang Shah</p>
                    <p style="text-align:center;">Dedhia Family Trust</p>
                    <p style="text-align:center;">Devang Jhaveri</p>
                    <p style="text-align:center;">Devkumar and Sonal Gandhi</p>
                    <p style="text-align:center;">Dhiraj and Jyoti Dedhia</p>
                    <p style="text-align:center;">Dhiren and Jyoti Shah</p>
                    <p style="text-align:center;">Dhruv & Shital Shah</p>
                    <p style="text-align:center;">Dipesh Kothari and Veni Jain</p>
                    <p style="text-align:center;">Dr. Dipak Jain & Sushant Jain</p>
                </div>
                <div class="col-md-3 margin30">
                   <p style="text-align:center;">Dr. Dipak Jain & Sushant Jain</p>
                    <p style="text-align:center;">Dr. Ravi Kankaria</p>
                    <p style="text-align:center;">Gautam & Sheetal Shah</p>
                    <p style="text-align:center;">Genesh, INC.</p>
                    <p style="text-align:center;">Hamad Hossain</p>
                    <p style="text-align:center;">Harakh & Neena Maru and Mahendra & Nalini Maru</p>
                    <p style="text-align:center;">Hiren and Hemal Dedhia</p>
                    <p style="text-align:center;">Jain Fellowship of Houston</p>
                    <p style="text-align:center;"><a href="http://jsne.org">Jain Sangh of New England, Inc.</a></p>
                    <p style="text-align:center;">Jain Society of Middle Tennessee</p>
                    <p style="text-align:center;">Jaydeep Jain</p>
                    <p style="text-align:center;">Jeet and Richa Mehta</p>
                    <p style="text-align:center;">Jitu and Sarla Jhaveri</p>
                    <p style="text-align:center;">Jyoti and Vipinchandra Vadecha</p>
                    <p style="text-align:center;">Kamal Mehta</p>
                    <p style="text-align:center;">Kamlesh Mehta</p>
                    <p style="text-align:center;">Kavita Jain</p>
                    <p style="text-align:center;">Kokila and Mohit Sheth</p> 
                    
                </div>
                <div class="col-md-3 margin30">
                  <p style="text-align:center;">Kirit and Pramila Daftary</p>
                    <p style="text-align:center;">Mahendra J. Shah</p>
                    <p style="text-align:center;">Mahendra R Solanki</p>
                    <p style="text-align:center;">Manoj & Shilpa Shah</p>
                    <p style="text-align:center;">Meeta and Kantilal Gangar</p>
                    <p style="text-align:center;">Milind k. Shalia</p>
                    <p style="text-align:center;">Monica Godha</p>
                    <p style="text-align:center;">Mr and Mrs. Parikh</p>
                    <p style="text-align:center;">Nalin and Jyotsna Patel</p>
                    <p style="text-align:center;">Navin and Divya Gangar</p>
                    <p style="text-align:center;">Neelam Savla</p>
                    <p style="text-align:center;">Neha Shah</p>
                    <p style="text-align:center;">Nilam and Himanshu Shah</p>
                    <p style="text-align:center;">Nilesh Shah</p>
                    <p style="text-align:center;">Niraj & Harsha Gandhi</p>
                    <p style="text-align:center;">Nirmal Dhudekar</p>
                    <p style="text-align:center;">Nitin, Malay, Bina, & Rachana Shah</p>
                    <p style="text-align:center;">Orna Gems Inc. (Sumati C. Shah)</p>
                    <p style="text-align:center;">Palvi Kudva</p>
                    <p style="text-align:center;">Pankaj and Malti Shah</p>
                </div>
                <div class="col-md-3 margin30">
                    <p style="text-align:center;">Patel Revocable Family Trust (Gordha M Patel)</p>
                    <p style="text-align:center;">Pathik Shah</p>
                    <p style="text-align:center;">Prajapati Parivar</p>
                    <p style="text-align:center;">Prakash Lapsia</p>
                    <p style="text-align:center;">Rajeev and Heena Gandhi</p>
                    <p style="text-align:center;">Rajini Lakhiya</p>
                    <p style="text-align:center;">Raju & Rupal Desai</p>
                    <p style="text-align:center;">Ramesh C Jhaveri, Rental (Ramesh and Nisha Jhaveri)</p>
                    <p style="text-align:center;">Rohan Shah</p>
                    <p style="text-align:center;">Sami and Minal Shah</p>
                    <p style="text-align:center;">Sanat and Sunita Mehta</p>
                    <p style="text-align:center;">Shah Associates, CPA, PA</p>
                    <p style="text-align:center;">Shailesh and Chandra Shah</p>
                    <p style="text-align:center;">Shardule & Ami Shah</p>
                    <p style="text-align:center;">Sushil Seth</p>
                    <p style="text-align:center;">Vijay and Madhu Chheda</p>
                    <p style="text-align:center;">Viren and Archana Shah</p>
                </div>
                
                <div class="col-md-12">
                    <h3 style="text-align:center;"><strong><u>Contributors</strong></u></h3>
                </div>
                <div class="col-md-2 margin30 ">
                  <p style="text-align:center;">Aashna Shah</p>
                  <p style="text-align:center;">Abhishek Soniminde</p>
                  <p style="text-align:center;">Aditya Ashar</p>
                  <p style="text-align:center;">Akaash Shah</p>
                  <p style="text-align:center;">Anita Jain</p>
                  <p style="text-align:center;">Ankit Desai</p>
                  <p style="text-align:center;">Anshul Shah</p>
                  <p style="text-align:center;">Anuradha Dharod</p>
                  <p style="text-align:center;">Ashvin and Ranjan Shah</p>
                  <p style="text-align:center;">Avish Jain</p>
                  <p style="text-align:center;">Bhavi Shah</p>
                  <p style="text-align:center;">Bhumi Shah</p>
                  <p style="text-align:center;">Casey Brown</p>
                  <p style="text-align:center;">Chintav Shah</p>
                  <p style="text-align:center;">Chirag Shah</p>
                </div>
                <div class="col-md-2 margin30">
                  <p style="text-align:center;">Deep Shah</p>
                  <p style="text-align:center;">Deval Shah</p>
                  <p style="text-align:center;">Dhara Shah and Prerak Adhuria</p>
                  <p style="text-align:center;">Dhaval A Shah</p>
                  <p style="text-align:center;">Disha Shah</p>
                  <p style="text-align:center;">Divya Gada</p>
                  <p style="text-align:center;">Hasmukh Kokila Shah</p>
                  <p style="text-align:center;">Hetali Lodaya</p>
                  <p style="text-align:center;">Jash Modi</p>
                  <p style="text-align:center;">Juhi Shah</p>
                  <p style="text-align:center;">Kalpana Shah</p>
                  <p style="text-align:center;">Khyati Raka</p>
                  <p style="text-align:center;">Kreena Vora</p>
                  <p style="text-align:center;">Krina Shah</p>
                  
                </div>
                <div class="col-md-2 margin30">
                  <p style="text-align:center;">Kritika Jain</p>
                  <p style="text-align:center;">Kruti Mehta</p>
                  <p style="text-align:center;">Kunal Mehta</p>
                  <p style="text-align:center;">Law Office of Riddhi Desai</p>
                  <p style="text-align:center;">Manali Shah</p>
                  <p style="text-align:center;">Manan Jobalia</p>
                  <p style="text-align:center;">Manav Sanghvi</p>
                  <p style="text-align:center;">Manjula Gala</p>
                  <p style="text-align:center;">Mayur Shah</p>
                  <p style="text-align:center;">Mukesh and Vibha Shah</p>
                  <p style="text-align:center;">Navin and Vimla</p>
                  <p style="text-align:center;">Neehaar Gandhi</p>
                  <p style="text-align:center;">Neil Shah</p>
                  <p style="text-align:center;">Nikita Jain</p>
                </div>
                <div class="col-md-2 margin30">
                  <p style="text-align:center;">Nilesh Dagli</p>
                  <p style="text-align:center;">Nimesh and Kokila Doshi</p>
                  <p style="text-align:center;">Nina Ranavat<p>
                  <p style="text-align:center;">Niraj Desai</p>
                  <p style="text-align:center;">Nirali Gandhi</p>
                  <p style="text-align:center;">Pankaj Nahar</p>
                  <p style="text-align:center;">Paras Mehta</p>
                  <p style="text-align:center;">Poojan Mehta</p>                  
                  <p style="text-align:center;">Pravi Jain</p>
                  <p style="text-align:center;">Priyanka Jain</p>
                  <p style="text-align:center;">Puja Savla</p>
                  <p style="text-align:center;">Pujen Solanki</p>
                  <p style="text-align:center;">Ravi Doshi</p>
                  <p style="text-align:center;">Ravi Shah</p>
                </div>
                <div class="col-md-2 margin30">
                  <p style="text-align:center;">Reya Shah</p>
                  <p style="text-align:center;">Richa Shah</p>
                  <p style="text-align:center;">Riya Shah</p>
                  <p style="text-align:center;">Roman & Susan Kab</p>
                  <p style="text-align:center;">Ruchir Vora</p>
                  <p style="text-align:center;">Rushal Shah</p>
                  <p style="text-align:center;">Saachi Gandhi</p>
                  <p style="text-align:center;">Saejal Chatter</p>
                  <p style="text-align:center;">Sameer Parikh</p>
                  <p style="text-align:center;">Sanjana Shah</p>
                  <p style="text-align:center;">Sean Gajjar</p>
                  <p style="text-align:center;">Sejal Dhruva</p>
                  <p style="text-align:center;">Shailee Shah</p>
                  <p style="text-align:center;">Shrenik Shah</p>
                </div>
                <div class="col-md-2 margin30">
                  <p style="text-align:center;">Shriya Jain</p>
                  <p style="text-align:center;">Shubham Gandhi</p>
                  <p style="text-align:center;">Siddh Kapadia</p>
                  <p style="text-align:center;">Simmi Nandu</p>
                  <p style="text-align:center;">Sonia Kamdar</p>                  
                  <p style="text-align:center;">Sunny Shah</p>
                  <p style="text-align:center;">Tejas Shah</p>
                  <p style="text-align:center;">Tushar & Apurvi Shah</p>
                  <p style="text-align:center;">Umang Lathia</p>
                  <p style="text-align:center;">Urvashi Jain</p>
                  <p style="text-align:center;">Vashali Jain</p>
                  <p style="text-align:center;">Vinija Jain</p>
                  <p style="text-align:center;">Virag Vora</p>
                  <p style="text-align:center;">Yesha Shah</p>
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
