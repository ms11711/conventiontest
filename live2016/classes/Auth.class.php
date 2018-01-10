 <?php
/**
 * Authentication class
 */

class Auth
{
    private static $_instance; //singleton instance

    private $currentUser; //current signed in user object

    private function __construct() {} //disallow creating of new object of class with new Auth()

    private function __clone() {} //disallow cloning the class

    /**
     * Initialisation
     *
     * @return void
     */
    public static function init()
    {
        //Start or resume the session

        session_start();
    }

    /**
     * Get the singleton instance
     *
     * To access rest of non-static methods of class
     * @return Auth
     */
    public static function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new Auth();
        }

        return self::$_instance;
    }

    /**
    * Login a user
    *
    * @param string $email     Email address
    * @param string $password  Password
    * @return boolean          true if the new user record was saved successfully, false otherwise
    */
    public function login($email,$password,$remember_me)
    {
        $user = User::authenticate($email,$password);

        // to store ID in Session when user authentication passes
        if ($user !== NULL) {

            //Cached the Details of current user object in currentUser property of Auth class
            $this->currentUser = $user;

            //Save the current user to SESSION
            $this->loginUserSession($user);

            //Remember the login
            if ($remember_me) {

                $expiry = time() + 60*60*24*30;
                //create the token and save it to database
                $token = $user->rememberMyLogin($expiry);

                //Set the "remember me" cookie with the token value and expiry
                if ($token !== false) {
                    //Store token value in a cookie with 'remember_token' as key
                    setcookie('remember_token',$token,$expiry);
                }
            }

            return true;
        }

        return false;
    }

    /**
    * Login the user to the SESSION
    *
    * @param User $user  User object
    * @return void
    */
    private function loginUserSession($user)
    {
    // Store the user ID in the session
    $_SESSION['user_id'] = $user->id;

    // Regenerate the session ID to prevent session hijacking
    session_regenerate_id();

        //get user ip address
        $user_ip =  Util::getUserIP();

        if ($user_ip) {
        // update user logged in IP and login timestamp
        $user->saveUserIp($user_ip,$user->id);
        }
    }

    /**
    * Get the current logged in user
    *
    * @return mixed  User object if logged in, null otherwise
    */
    public function getCurrentUser()
    {
        if ($this->currentUser === NULL) {

            //Login from SESSION if set
            if (isset($_SESSION['user_id'])) {
                $this->currentUser = User::findbyID($_SESSION['user_id']);
            } else {
                //Login from the remember me cookie if set
                $this->currentUser = $this->loginFromCookie();
            }
        }

        return $this->currentUser;
    }


    /**
    * Log the user in from the remember me cookie
    *
    * @return mixed  User object if logged in correctly from the cookie, or null otherwise
    */
    public function loginFromCookie()
    {
        if (isset($_COOKIE['remember_token'])) {
            //Find user that has the token set (the token is hashed in the database)
            $user = User::findByRememberToken(sha1($_COOKIE['remember_token']));

            if ($user !== null) {
                //Set the User SESSION so that next login occurs via SESSION
                $this->loginUserSession($user);

                return $user;
            }
        }
    }

    /**
    * Boolean indicator of whether the user is logged in or not
    *
    * @return boolean
    */
    public function isLoggedIn()
    {
        return $this->getCurrentUser() !== null;
    }

    /**
    * Boolean indicator of whether the user is logged in and is an admin
    *
    * @return boolean
    */
    public function isAdmin()
    {
        return $this->isLoggedIn() && $this->getCurrentUser()->is_admin;
    }

    /**
    * Boolean indicator of whether the user is logged in and is an admin
    *
    * @return boolean
    */
    public function isManager()
    {
        return $this->isLoggedIn() && $this->getCurrentUser()->is_manager;
    }

    /**
    * Boolean indicator of whether the user is logged in and is an admin
    *
    * @return boolean
    */
    public function isSubscriber()
    {
        return $this->isLoggedIn() && $this->getCurrentUser()->is_subscriber;
    }

    /**
    * Restrict access only to admin
    *
    * @return void
    */
    public function requireAdmin()
    {
        if (! $this->isAdmin() ) {
            Util::denyAccess();
        }
    }

    /**
    * Restrict access only to admin
    *
    * @return void
    */
    public function requireManager()
    {
        if (! $this->isManager() ) {
            Util::denyAccess();
        }
    }

    /**
    * Restrict access only to admin
    *
    * @return void
    */
    public function requireSubscriber()
    {
        if (! $this->isSubscriber() ) {
            Util::denyAccess();
        }
    }

    /**
    * Redirect to the login page if no user is logged in.
    *
    * @return void
    */
    public function requireLogin()
    {
        if (!$this->isLoggedIn()) {

            //Save the requested page to return_to in the SESSION after logging in
            $url_base = $_SERVER['PHP_SELF'];

            //if the requested page alse has a query string
            if (!empty($_SERVER['QUERY_STRING'])) {
                $url_base .= "?".$_SERVER['QUERY_STRING'];
            }

            if (!empty($url_base)) {
                $_SESSION['return_to'] = $url_base;
            }
            Util::redirect('/login.php');
        }
    }

    /**
    * Redirect to the home page if a user is logged in.
    *
    * @return void
    */
    public function requireGuest()
    {
        if ($this->isLoggedIn()) {
            Util::redirect('/index.php');
        }
    }

    /**
     * Logout the User and Destroy the Session
     *
     * @return void
     */
    public function logout()
    {
        //Forget the remembered login,if set
        if (isset($_COOKIE['remember_token'])) {

            //Delete the record from the database - note the hash
            $this->getCurrentUser()->forgetLogin(sha1($_COOKIE['remember_token']));

            //Delete the cookie with the value of the token.Setting the expiration date to
            //a time in the past (in this case,one hour ago) will cause the browser to delete
            //the cookie
            setcookie('remember_token','',time() - 3600);
        }
        //Remove all session variables and destroy the session
        $_SESSION = array();
        session_destroy();
    }

    /**
    * Send the user password reset email
    *
    * @param string $email  Email address
    * @return Boolean
    */
    public function sendPasswordReset($email)
    {
        //get user details by email provided
        $user = User::findbyEmail($email);

        if ($user !== null) {
            if ($user->startPasswordReset()) {

                // HARDCODED PROTOCOL
                $url = 'http://convention2016.yja.org/reset_password.php?token='.$user->password_reset_token;
                $hiuser = ucfirst($user->name);

                //Email 

                include './email_template/reset-password.php';
                 

        return true;
        }
    }

    return false;
  }


     /**
    * Send activation email to the user based on the token
    *
    * @param string $token  Activation token
    * @return mixed         User object if authenticated correctly, null otherwise
    */
    public function sendActivationEmailAgain($email)
    {
        //get user details by email provided
        $user = User::findbyEmail($email);

        if ($user !== null && !empty($user->activation_token) && $user->is_active == 0) {
           $url = 'http://'.$_SERVER['HTTP_HOST'].'/activate_account.php?token='.$user->activation_token;
        $hiuser = ucfirst($user->name);
        $body =<<<EOT
<h1> Hi, $hiuser </h1>
<p> One last step is required </p>
<p>Please click on the following link to activate your account</p>

<p><a href="$url">$url</a></p><br>

<p>Thank You</p>
EOT;
              if(Mail::send($user->name,$user->email,'Actvate Account',$body)){
                return true;
            }
        }else{
            return false;
        }
    }
    /**
    * One Click Social Login
    *
    * @param  string   $provider_name   Name of the Social Network Provider like facebook,google etc
    * @return Boolean  returns false if fails
    */
    public function socialLogin($provider_name)
    {
        if (isset($provider_name)) {

            // get the user social profile details
            $user_profile = (array) Social::getSocialProfile($provider_name);
            
            //if user email is not recieved in user profile (in case of Twitter and Yahoo)
            if ($user_profile !== null && isset($user_profile['identifier']) && $user_profile['email'] == null) {

                //check if user already exists in database
                $existing_user = (array) User::getUserbyProviderandID( $provider_name, $user_profile['identifier'] );

                //if user exists then set its profile email to email recieved from database
                if (!empty($existing_user)) {
                    $user_profile['email'] = $existing_user['email'];

                //if new user save grabbed profile data and proceed to get email manually
                } elseif (empty($existing_user)) {
                self::tempSaveUserProfile($user_profile,$provider_name);
                }

            }

            //if user email is recieved in user profile
            if ($user_profile !== null && isset($user_profile['identifier']) && $user_profile['email'] !== null) {
                return self::socialAuth($user_profile,$provider_name);
            }

            return false;
        }
    }

    /**
    * Temporary save user profile details to a file and go back to client
    * and get the email manually
    * Particularly in case of Twitter and Yahoo
    *
    * @param  array  $user_profile  details of user profile
    * @param  string $provider_name social network provider
    * @return void
    */
    private static function tempSaveUserProfile($user_profile,$provider_name)
    {
        //temp save the user profile data
         file_put_contents('tempUserData.txt', "{$user_profile['identifier']}\n{$user_profile['displayName']}\n$provider_name");
        //go back to client and get email manually
        Util::redirect('/social_login.php');
    }

    /**
    * When email is recieved manually from user,retrieve previously saved user profile
    *
    * @param  string $userEmail  User Email
    * @return boolean            if the user successfully logged in via social profile
    */
    public function socialLoginViaEmail($userEmail)
    {
        $userprofile = array();
        //open temp saved user profile data
        $tempUserProfile = file('tempUserData.txt');
        $userprofile['identifier'] = $tempUserProfile[0];
        $userprofile['firstName'] = $tempUserProfile[1];
        $userprofile['email'] = $userEmail;
        $provider_name = $tempUserProfile[2];
        unlink('tempUserData.txt');

        return self::socialAuth($userprofile,$provider_name);
    }

    /**
    * Social Auth to login the user from user's social profile details
    *
    * @param  array  $user_profile  details of user profile
    * @param  string $provider_name social provider name
    * @return boolean               if the user successfully logged in via social profile
    */
    public function socialAuth($user_profile,$provider_name)
    {
        //if the user previously logged in via social profile
        $existing_user = User::getUserbyProviderandID( $provider_name, $user_profile['identifier'] );

        if (!empty($existing_user)) {
            $this->loginUserSession($existing_user);

            return true;
        }

        // if user didnot previously logged in via social profile
        elseif ( empty($existing_user) ) {
            //if user with profile email already exists
            $user = User::findbyEmail($user_profile['email']);

            //if user with same email exists then update its social details
            if (!empty($user)) {

            $updateuser = User::updateHybridauthUser($user_profile['firstName'].' '.$user_profile['lastName'],$user_profile['email'],
                                                       $provider_name,$user_profile['identifier']);

                if ($updateuser == true) {
                    $this->loginUserSession($user);

                    return true;
                }
            }
            //if its a new user,create a new user and log it in
            else {
            $newuser = User::createNewHybridauthUser($user_profile['firstName'].' '.$user_profile['lastName'],$user_profile['email'],
                                                        $provider_name,$user_profile['identifier']);
                if ($newuser !== null) {
                    $this->loginUserSession($newuser);

                    return true;
                }
            }
        }

        return false;
    }


}

?>
