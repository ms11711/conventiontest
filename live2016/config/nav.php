        <div class="top-bar-light">            
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 hidden-xs">
                        <div class="top-bar-socials">
                            <a href="https://www.facebook.com/youngjains" target="_blank" class="social-icon-sm si-gray si-gray-round si-facebook">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/YJAtweets" target="_blank" class="social-icon-sm si-gray si-gray-round si-twitter">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a>               
                            <a href="https://www.instagram.com/youngjainsofamerica/" target="_blank" class="social-icon-sm si-gray si-gray-round si-instagram">
                                <i class="fa fa-instagram"></i>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-7 text-right">
                        <ul class="list-inline top-dark-right">                      
                            <li><i class="fa fa-envelope"></i> reghelp@yja.org</li> 

                           

                            <?php if (Auth::getInstance()->isLoggedIn()): ?>
            
                                <?php if (Auth::getInstance()->isAdmin()): ?>
                                <li><a href="/admin/"><i class="fa fa-lock"></i>Admin Area</a></li>
                                <?php endif; ?>
                                <?php if (Auth::getInstance()->isManager()): ?>
                                    <li><a href="/managers_section.php"><i class="fa fa-lock"></i>Managers Area</a></li>
                                <?php endif; ?>                                      
                
                                 <!-- Files added here will show up if logged in -->
                                <li><a href="/account"><i class="fa fa-user"></i>My Account</a></li>
                                <li><a href="/logout">Logout</a></li>

                            <?php else: ?>


                            <li><a href="login"><i class="fa fa-lock"></i> Login</a></li>
                            <!--<li><a href="registernow"><i class="fa fa-user"></i> Register</a></li>-->
                        <?php endif; ?>

                        </ul>
                      
                    </div>
                </div>
            </div>
        </div><!--top-bar end here-->
        <!--navigation -->
        <div class="navbar navbar-default navbar-static-top yamm sticky" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://convention2016.yja.org"><img src="img/logo.png" alt="YJA 2016"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li >
                            <a href="http://convention2016.yja.org"  >Home  </a>                             
                        </li> 
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown">Convention <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu multi-level" role="menu">
                                <li><a href="about">About</a></li>
                                <li><a href="board">Board</a></li>
                                <li><a href="location">Location</a></li>
                                <li><a href="registernow">Registration</a></li>
                                <li><a href="transportation">Transportation</a></li>
                                <li><a href="assets/DressCode2016.pdf" target="_blank">Convention Dress Code</a></li>
                                <li><a href="assets/ConventionSchedule2016.pdf" target="_blank">Convention Schedule</a></li>
                                <li><a href="media">Convention Social Media Feed</a></li>
                                <li><a href="souvenirbook">Convention Souvenir Book</a></li>
                                <li><a href="videos">Convention Videos</a></li>
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="daytime">Daytime Programming</a></li>
                                <li><a href="essaycontest">Essay Contest</a></li>
                                <li><a href="jab">Jain Academic Bowl (JAB)</a></li>
                                <li><a href="jia">Jains in Action (JIA)</a></li>
                                <li><a href="jnf">Jain Networking Forum (JNF)</a></li>
                                <li><a href="social">Social Programming</a></li> 
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contribute <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="donate">Donate</a></li>
                                <li><a href="sponsorship">Sponsorship</a></li>
                                <li><a href="sponsors">Our Sponsors</a></li>
                                <li><a href="volunteer">Volunteer</a></li>
                            </ul>
                        </li> 
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="faq">FAQs</a></li>
                                <li><a href="contact">Contact</a></li> 
                            </ul>
                        </li> 
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--container-->
        </div><!--navbar-default-->