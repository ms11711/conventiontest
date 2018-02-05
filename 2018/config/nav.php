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


                            <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
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
                    <a class="navbar-brand" href="/"><img src="img/yjalogonoslogan.png" alt="YJA 2018" style="height: 59px;  width: 100px;"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li >
                            <a href="/"  >Home  </a>
                        </li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown">Convention <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu multi-level" role="menu">
                                <li><a href="about.php">About</a></li>
                                <li><a href="board.php">Board</a></li>
                                <li><a href="transportation.php">Transportation</a></li>
                                <li><a href="registernow.php">Registration</a></li>
                              <!--  <li><a href="transportation.php">Transportation</a></li>
                                <li><a href="assets/DressCode2016.pdf" target="_blank">Convention Dress Code</a></li>
                                <li><a href="assets/ConventionSchedule2016.pdf" target="_blank">Convention Schedule</a></li>
                                <li><a href="media.php">Convention Social Media Feed</a></li>
                                <li><a href="souvenirbook.php">Convention Souvenir Book</a></li>
                                <li><a href="videos.php">Convention Videos</a></li> -->
                            </ul>
                        </li>
                    <!--    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="daytime.php">Daytime Programming</a></li>
                                <li><a href="essaycontest.php">Essay Contest</a></li>
                                <li><a href="jab.php">Jain Academic Bowl (JAB)</a></li>
                                <li><a href="jia.php">Jains in Action (JIA)</a></li>
                                <li><a href="jnf.php">Jain Networking Forum (JNF)</a></li>
                                <li><a href="social.php">Social Programming</a></li>
                            </ul>
                        </li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contribute <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="donate.php">Donate</a></li>
                                <li><a href="sponsorship.php">Sponsorship</a></li>
                            <!--    <li><a href="sponsors.php">Our Sponsors</a></li> -->
                                <li><a href="volunteer.php">Volunteer</a></li>
                            </ul>
                        </li>
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="faq.php">FAQs</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--container-->
        </div><!--navbar-default-->
