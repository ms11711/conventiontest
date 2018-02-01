<?php
/**
 * User Class
 */

class User
{

    public $errors;

    /**
     * Magic getter - read data from a property that isn't set yet
     *
     * @param  string $name Property name
     * @return mixed
     */
    public function __get($name) {}


    /**
    * Signup a new user
    *
    * @param  array $data POST data
    * @return USer
    */
    public static function signup($data)
    {
        $user = new static();
        $user->name  = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->password_confirmation = $data['password_confirmation'];
        $user->captcha = $data['g-recaptcha-response'];
        if ($user->isValid()) {

            // Generate a random token for activation and base64 encode it so it's URL safe

            //$token = base64_encode(uniqid(rand(),true));
            //$hashed_token = sha1($token);

            try {
                $dbconn = Database::getInstance();

                $stmt = $dbconn->prepare('INSERT INTO users
                                        (name,email,password,is_active)
                                        VALUES
                                        (:name,:email,:password,TRUE)
                                        ');
                $bindings= array(
                            'name'    => $user->name,
                            'email'   => $user->email,
                            'password'=> Hash::make($user->password),
                            );
                $stmt->execute($bindings);

                //Send activation email

                //$user->sendActivationEmail($hashed_token);

            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        return $user;
    }

    /**
    * Send activation email to the user based on the token
    *
    * @param string $token  Activation token
    * @return mixed         User object if authenticated correctly, null otherwise
    */
    public function sendActivationEmail($token)
    {
        //Note HARDCODED PROTOCOL
        $url = 'http://'.$_SERVER['HTTP_HOST'].'/activate_account.php?token='.$token;
        $hiuser = ucfirst($this->name);
        $body =<<<EOT
<h1> Hi, $hiuser </h1>
<p> One last step is required </p>
<p>Please click on the following link to activate your account</p>

<p><a href="$url">$url</a></p><br>

<p>Thank You</p>
EOT;
      if(Mail::send($this->name,$this->email,'Actvate Account',$body)){
        return true;
      }else{
        return false;
      }
    }



    /**
   * Activate the user account, nullifying the activation token and setting the is_active flag
   *
   * @param string $token  Activation token
   * @return void
   */
    public static function activateAccount($token)
    {
        // $hashed_token = sha1($token);

        try {

          $dbconn = Database::getInstance();

          $stmt = $dbconn->prepare('UPDATE users SET activation_token = NULL, is_active = TRUE WHERE activation_token = :token');
          $stmt->execute([':token' => $token]);

          if ($stmt->rowCount() == 1) {
                        return true;
                    }
        } catch (PDOException $exception) {

          // Log the detailed exception
          error_log($exception->getMessage());
        }

        return false;
    }

    /**
   * Validate the properties and set $this->errors if any are invalid
   *
   * @return boolean  true if valid, false otherwise
   */
    public function isValid()
    {
        $this->errors=[];
        //
        //name
        //
        if ($this->name == '') {
            $this->errors['name'] = 'Please enter a valid name';
        }

        //
        //email address
        //
        if (filter_var($this->email,FILTER_VALIDATE_EMAIL) === false) {
            $this->errors['email'] = 'Please enter a valid email address';
        }

        //
        //check if email already exists
        //
         if ($this->emailTaken($this->email)) {
          $this->errors['email'] = 'That email address is already taken';
        }

        //
        // password
        //
        $password_error = $this->validatePassword();
        if ($password_error !== null) {
          $this->errors['password'] = $password_error;
        }
        //
        //captcha
        //
        if (isset($this->captcha) && !Captcha::verifyCaptcha($this->captcha)) {
            $this->errors['captcha'] = 'Please fill correct captcha';
        }

        return empty($this->errors);
    }

    /**
    * See if the email address is taken (already exists), ignoring the current user if already saved.
    *
    * @param string $email  Email address
    * @return boolean       True if the email is taken, false otherwise
    */
    private function emailTaken($email)
    {
    $isTaken = false;
    $user = $this->findByEmail($email);

        if ($user !== null) {

          if (isset($this->id)) {  // existing user

            if ($this->id != $user->id) {  // different user
              $isTaken = true;
            }

          } else {  // new user
            $isTaken = true;
          }
        }

    return $isTaken;
    }

    /**
    * Validate the password
    *
    * @return mixed  The first error message if invalid, null otherwise
    */
    private function validatePassword()
    {
        if (isset($this->password) && (strlen($this->password) < 6)) {
          return 'Please enter a longer password';
        }

    if (isset($this->password_confirmation) && ($this->password != $this->password_confirmation)) {
        return 'Please enter the same password';
        }

    if (isset($this->currentpassword) && Hash::check($this->currentpassword,$this->getpassword) == false) {
        return 'Please enter correct current password';
    }

    }

    /**
     * Autheticate a user by email and password
     *
     * @param  string $email Email Address
     * @param  $password  		 Password
     * @return mixed  User object if authenticated correctly,null otherwise
     */
    public static function authenticate($email,$password)
    {
        $user = self::findbyEmail($email); // Grab the user object by email provided

        if ($user !== null) {
            //Check if user is activated
            if ($user->is_active) {
            //Check the hased password stored in the user record matches the supplied password
            if (Hash::check($password,$user->password)) {
                return $user;
                }
            }
        }
    }

    /**
     * Find the user with specified ID
     *
     * This Function is used for getting Username from Stored user-id in SESSION
     * @param  string $id ID
     * @return mixed  User object if found,null otherwise
     */
    public static function findByID($id)
    {
        try {
            $dbconn = Database::getInstance();

            $stmt = $dbconn->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
            $stmt->execute(array('id' => $id));
            $user = $stmt->fetchObject('User');
            if ($user !== false) {
                return $user;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * Find the user with specified Email
     *
     * This function is used to get User Object for authentication while logging in
     * @param  string $email Email Address
     * @return mixed  User object if found,null otherwise
     */
    public static function findByEmail($email)
    {
        try {
            $dbconn = Database::getInstance();

            $stmt = $dbconn->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
            $stmt->execute(array('email' => $email));
            $user = $stmt->fetchObject('User');
            if ($user !== false) {
                return $user;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    /**
    * Remember the login by storing a unique token associated with the user ID
    *
    * @param integer $expiry  Expiry timestamp
    * @return mixed           The token if remembered successfully, false otherwise
    */
    public function rememberMyLogin($expiry)
    {
        // print_r($this->id);
        // die();
        //Generate a unique token
        $token = uniqid($this->email,true);
        try {
            $dbconn = Database::getInstance();
            $stmt = $dbconn->prepare('INSERT INTO remembered_logins
                                    (token,user_id,expires_at)
                                    VALUES
                                    (:token,:user_id,:expires_at)
                                    ');
            $stmt->bindValue(':token', sha1($token));  // store a hash of the token
              $stmt->bindParam(':user_id', $this->id, PDO::PARAM_INT);
              $stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $expiry));
              $stmt->execute();

              if ($stmt->rowCount() == 1) {
                  return $token;
              }
        } catch (PDOException $e) {
            error_log($e-getMessage());
        }

        return false;
    }

    /**
     * Save User IP address and Set Login Timestamp
     * @param  string $user_ip Login User IP address
     * @param  string $user_id Logged in User ID
     * @return void
     */
    public static function saveUserIp($user_ip,$user_id)
    {
        //Support both IPv4 and IPv6
        $userip_in_add = inet_pton($user_ip);

        try {

                $dbconn = Database::getInstance();

                $stmt = $dbconn->prepare('UPDATE users SET
                                           last_login_ip = :last_login_ip,
                                           last_login_time = :last_login_time
                                           WHERE
                                           id = :id
                                           ');
                $stmt->bindParam(':last_login_ip',$userip_in_add);
                $stmt->bindValue(':last_login_time',date('Y-m-d H:i:s'));
                $stmt->bindParam(':id',$user_id,PDO::PARAM_INT);
                $stmt->execute();
        } catch (PDOException $e) {
            error_log($e-getMessage());
        }
    }

    /**
    * Find the user by remember token
    *
    * @param  string $token  token
    * @return mixed         User object if found, null otherwise
    */
    public static function findByRememberToken($token)
    {
        try {
            $dbconn = Database::getInstance();
            $stmt = $dbconn->prepare('SELECT u.* FROM users u JOIN remembered_logins r ON u.id=r.user_id WHERE token = :token');
            $stmt->execute(array(':token' => $token));
            $user = $stmt->fetchObject('User');

            if ($user !== false) {
                return $user;
            }
        } catch (PDOException $e) {
            error_log($e-getMessage());
        }
    }

    /**
     * Delete Remembered Login
     * @param  string $token
     * @return void
     */
    public function forgetLogin($token)
    {
        if ($token !== null) {

            try {
                $dbconn = Database::getInstance();
                $stmt = $dbconn->prepare('DELETE FROM remembered_logins WHERE token = :token');
                $stmt->bindParam(':token',$token);
                $stmt->execute();

            } catch (PDOException $e) {
                //Log the detailed exception
                error_log($e->getMessage());
            }
        }
    }

    /**
   * Deleted expired remember me tokens
   *
   * @return integer  Number of tokens deleted
   */
    public static function deleteExpiredTokens()
    {
    try {

        $dbconn = Database::getInstance();

        $stmt = $dbconn->prepare("DELETE FROM remembered_logins WHERE expires_at < '" . date('Y-m-d H:i:s') . "'");
        $stmt->execute();

        return $stmt->rowCount();

        } catch (PDOException $exception) {

          // Log the detailed exception
          error_log($exception->getMessage());
        }

    return 0;
    }

    /**
     * Change Password
     *
     * @return boolean
     */
    public function changePassword()
    {
        $password_error = $this->validatePassword();
        if ($password_error !== null) {
          $this->errors['password'] = $password_error;
        }
        if ($password_error === null) {
            try {

                $dbconn = Database::getInstance();

                $stmt = $dbconn->prepare('UPDATE users SET
                                           password = :password
                                           WHERE
                                           id = :id
                                           ');
                $stmt->bindValue(':password',Hash::make($this->password));
                $stmt->bindParam(':id',$this->id,PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    return true;
                }
            } catch (PDOException $e) {
                error_log($e->getMessage());
            }
        }

    }

    /**
    * Start the password reset process by generating a unique token and expiry and saving them in the user model
    *
    * @return boolean  True if the user model was updated successfully, false otherwise
    */
    public function startPasswordReset()
    {
        //Generate a random token and base64 encode it so its URL safe
        $token = base64_encode(uniqid(rand(),true));
        $hashed_token = sha1($token);

        //Set the token to expire in one hour
        $expires_at = date('Y-m-d H:i:s',time() + 60*60);

        try {
            $dbconn = Database::getInstance();

            $stmt = $dbconn->prepare('UPDATE users SET
                                      password_reset_token = :token,
                                      password_reset_expires_at = :expires_at
                                      WHERE id = :id
                                      ');
            $stmt->bindParam(':token', $hashed_token);
              $stmt->bindParam(':expires_at', $expires_at);
              $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
              $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $this->password_reset_token = $token;
                $this->password_reset_expires_at = $expires_at;

                return true;
            }

        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    /**
   * Find the user for password reset, by the specified token and check the token hasn't expired
   *
   * @param string $token  Reset token
   * @return mixed         User object if found and the token hasn't expired, null otherwise
   */
      public static function findForPasswordReset($token)
      {
        $hashed_token = sha1($token);

        try {

          $db = Database::getInstance();

          $stmt = $db->prepare('SELECT * FROM users WHERE password_reset_token = :token LIMIT 1');
          $stmt->execute([':token' => $hashed_token]);
          $user = $stmt->fetchObject('User');

          if ($user !== false) {

            // Check the token hasn't expired
            $expiry = DateTime::createFromFormat('Y-m-d H:i:s', $user->password_reset_expires_at);

            if ($expiry !== false) {
              if ($expiry->getTimestamp() > time()) {
                return $user;
              }
            }
          }

        } catch (PDOException $exception) {

          error_log($exception->getMessage());
        }
      }


    /**
    * Reset the password
    *
    * @return boolean  true if the password was changed successfully, false otherwise
    */
    public function resetPassword()
    {
        $password_error = $this->validatePassword();
        if ($password_error !== null) {
          $this->errors['password'] = $password_error;
        }
        if ($password_error === null) {
            try {
                $dbconn = Database::getInstance();

                $stmt = $dbconn->prepare('UPDATE users SET
                                           password = :password,
                                           password_reset_token = NULL,
                                           password_reset_expires_at = NULL
                                           WHERE
                                           id = :id
                                           ');
                $stmt->bindValue(':password',Hash::make($this->password));
                $stmt->bindParam(':id',$this->id,PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    return true;
                }
            } catch (PDOException $e) {
                error_log(getMessage());
            }
        }

    }

    /**
    * Get a page of user records and the previous and next page (if there are any)
    *
    * @param string $page  Page number
    * @return array        Previous page, next page and user data. Page elements are null if there isn't a previous or next page.
    */
    public static function paginate()
    {
        $data = array();
        // $users_per_page = $users_per_page;

        //calculate the total number of pages
        // $total_users = self::getTotalUsers();
        // $total_pages = (int) ceil($total_users/$users_per_page);
        // $data['total_pages'] = $total_pages;
        // $data['current_page'] = $page;
        // //Make sure the current page is valid
        // $page = (int) $page;

        // if ($page < 1) {
        //     $page = 1;
        //     } elseif ($page > $total_pages) {
        //         $page = $total_pages;
        //     }

        // //Calculate the next and previous pages
        // $data['previous'] = $page == 1 ? null : $page - 1;
        // $data['next'] = $page == $total_pages ? null : $page+1;

        //Get the page of users
        try {
            $dbconn = Database::getInstance();

            // $offset = ($page - 1 ) * $users_per_page;
            $data['users'] = $dbconn->query("SELECT * FROM users ORDER BY id
                                            ")->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $data['users'] = [];
        }

        return $data;
    }

    /**
    * Get the total number of users
    *
    * @return integer
    */
    private static function getTotalUsers()
    {
    try {

      $db = Database::getInstance();
      $count = (int) $db->query('SELECT COUNT(*) FROM users')->fetchColumn();

    } catch (PDOException $exception) {

      error_log($exception->getMessage());
      $count = 0;
    }

    return $count;
    }

    /**
     * Get the user by ID or display a 404 Not Found page if not found
     *
     * @param  array $data $_GET data
     * @return mixed User object if found,null otherwise
     */
    public static function getByIDor404($data)
    {
        if (isset($data['id'])) {
            $user = self::findByID($data['id']);

            if ($user !== null) {
                return $user;
            }
        }
        Util::showNotFound();
    }

    /**
    * Update the existing users details based on the data. Data is validated and $this->errors is set if
    * if any values are invalid.
    *
    * @param array $data  Updated data ($_POST array)
    * @return boolean     True if the values were updated successfully, false otherwise.
    */
    public function save($data)
    {   
        
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->gender = $data['gender'];
        $this->address = $data['address'];
        $this->phone = $data['phone'];
        //If editing a user,only validate and update the password if a value provided
        if (isset($this->id) && empty($data['password'])) {
            unset($this->password);
        } else {
            $this->password = $data['password'];
        }

        //convert values of the checkboxes to boolean
        // $this->is_active = isset($data['is_active']) && ($data['is_active'] == '1');
        // $this->is_admin = isset($data['is_admin']) && ($data['is_admin'] == '1');
        if (isset($data['is_active']) && ($data['is_active'] == '1')) {
            $this->is_active = 1;
        } else {
            $this->is_active = 0;
        }

        if (isset($data['is_admin']) && ($data['is_admin'] == '1')) {
            $this->is_admin = 1;
        } else {
            $this->is_admin = 0;
        }

        if (isset($data['is_manager']) && ($data['is_manager'] == '1')) {
            $this->is_manager = 1;
        } else {
            $this->is_manager = 0;
        }

        if (isset($data['is_subscriber']) && ($data['is_subscriber'] == '1')) {
            $this->is_subscriber = 1;
        } else {
            $this->is_subscriber = 0;
        }

        if ($this->isValid()) {

            try {
                $dbconn = Database::getInstance();

                //Prepare the SQL :Update the existing record if editing,or insert new if adding
                if (isset($this->id)) {
                    $sql = 'UPDATE users SET
                            name = :name,
                            email = :email,
                            is_active = :is_active,
                            is_admin = :is_admin,
                            is_manager = :is_manager,
                            is_subscriber = :is_subscriber,
                            gender = :gender,
                            address = :address,
                            phone = :phone
                            ';

                    if (isset($this->password)) {
                        $sql .= ',password = :password';
                    }
                    $sql .= ' WHERE id = :id';

                } else {
                    $sql = 'INSERT INTO users
                            (name,email,password,is_active,is_admin,is_manager,is_subscriber,gender,address,phone)
                            VALUES
                            (:name,:email,:password,:is_active,:is_admin,:is_manager,:is_subscriber,:gender,:address,:phone)
                            ';
                }

                // Bind the parameters
                $stmt = $dbconn->prepare($sql);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':is_active', $this->is_active);
                $stmt->bindParam(':is_admin', $this->is_admin);
                $stmt->bindParam(':is_manager', $this->is_manager);
                $stmt->bindParam(':is_subscriber', $this->is_subscriber);
                $stmt->bindParam(':gender', $this->gender);
                $stmt->bindParam(':address', $this->address);
                $stmt->bindParam(':phone', $this->phone);

                if (isset($this->id)) {
                  if (isset($this->password)) {  // only update password if set
                    $stmt->bindValue(':password', Hash::make($this->password));
                  }

                  $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

                } else {
                  $stmt->bindValue(':password', Hash::make($this->password));
                }

                $stmt->execute();

                // Set the ID if a new record
                if ( ! isset($this->id)) {
                  $this->id = $dbconn->lastInsertId();
                }

                return true;

            } catch (PDOException $e) {
                error_log($e->getMessage());
            }
        }

        return false;
    }


    public function saveProfile($profile_data){
   
      try { 
            $dbconn = Database::getInstance();
            $sql = 'UPDATE users SET
                            gender = :gender,
                            address = :address,
                            phone = :phone WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':gender'    => $profile_data['gender'],
                            ':address'   => $profile_data['address'],
                            ':phone'=> $profile_data['phone'],
                            ':id' => $this->id
                            );
            $stmt->execute($bindings);

            return true;

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

    /**
    * Delete the user.
    *
    * @return void
    */
    public function delete()
    {
        try {

          $db = Database::getInstance();

          $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
          $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
          $stmt->execute();

        } catch (PDOException $exception) {

          // Log the detailed exception
          error_log($exception->getMessage());
        }
    }

    /**
     * Get the list of all email addresses of active users
     *
     * @return array email list
     */
    public static function getAllEmails($mailto)
    {
    try {
            $dbconn = Database::getInstance();
            if ($mailto == 1) {
              $data['emails'] = $dbconn->query("SELECT email FROM users WHERE is_active = 1 AND is_admin = 0 AND is_subscriber = 1
                                            ")->fetchAll(PDO::FETCH_ASSOC);  
            }elseif ($mailto == 2) {
              $data['emails'] = $dbconn->query("SELECT email FROM users WHERE is_active = 1 AND is_admin = 0 AND is_manager = 1
                                            ")->fetchAll(PDO::FETCH_ASSOC);  
            }elseif ($mailto == 3) {
              $data['emails'] = $dbconn->query("SELECT email FROM users WHERE is_active = 1 AND is_admin = 0
                                            ")->fetchAll(PDO::FETCH_ASSOC);
            }
            

        } catch (PDOException $e) {
            error_log($e->getMessage());

            return false;
        }

        return $data['emails'];
     }

     public static function countUsers(){
      try {
            $count = array();
            $dbconn = Database::getInstance();

            $count['total'] = $dbconn->query("SELECT COUNT(*) FROM users")->fetchColumn(0);
            $count['active'] = $dbconn->query("SELECT COUNT(*) FROM users WHERE is_active = 1")->fetchColumn(0);
            $count['admin'] = $dbconn->query("SELECT COUNT(*) FROM users WHERE is_admin = 1")->fetchColumn(0);
            $count['manager'] = $dbconn->query("SELECT COUNT(*) FROM users WHERE is_manager = 1")->fetchColumn(0);
            $count['subscriber'] = $dbconn->query("SELECT COUNT(*) FROM users WHERE is_subscriber = 1")->fetchColumn(0);

            return $count;
        
      } catch (PDOException $e) {
          error_log($e->getMessage());
          return false;
      }
     }

    /**
     * Get User Record by Social
     * @param  string $provider_name    Social Provider
     * @param  string $provider_user_id User Social Identifier
     * @return mixed  retrieved user
     */
    public static function getUserbyProviderandID($provider_name, $provider_user_id)
    {
        try {

            $dbconn = Database::getInstance();
            $stmt = $dbconn->prepare("SELECT * FROM users WHERE hybridauth_provider_name = :provider_name AND hybridauth_provider_uid = :provider_user_id");
            $stmt->bindParam(':provider_name', $provider_name,PDO::PARAM_STR);

            if ($provider_name == 'yahoo') {
                $stmt->bindParam(':provider_user_id', $provider_user_id,PDO::PARAM_STR);
            } else {
                $stmt->bindParam(':provider_user_id', $provider_user_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $user = $stmt->fetchObject('User');
            
            if ($stmt->rowCount() == 1) {
                  return $user;
              }

        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * Create a new user along with social details
     * @param  string $name             Name
     * @param  string $email            Email
     * @param  string $provider_name    Provider Name
     * @param  string $provider_user_id Provider Social ID
     * @return mixed  Inserted User Details
     */
    public static function createNewHybridauthUser($name, $email, $provider_name, $provider_user_id)
    {
        $password = md5(str_shuffle("0123456789abcdefghijklmnoABCDEFGHIJ"));
        try {

            $dbconn = Database::getInstance();

            $stmt = $dbconn->prepare('INSERT INTO users
                                        (name,email,password,is_active,hybridauth_provider_name,hybridauth_provider_uid)
                                        VALUES
                                        (:name,:email,:password,:is_active,:provider_name,:provider_user_id)
                                    ');
                $bindings= array(
                            ':name'    => $name,
                            ':email'   => $email,
                            ':password'=> $password,
                            ':is_active' => TRUE,
                            ':provider_name'   => $provider_name,
                            ':provider_user_id'   => $provider_user_id
                            );
                $stmt->execute($bindings);
                $user_id = $dbconn->lastInsertId();

                $user= self::findByID($user_id);
                if ($user !== null) {
                return $user;
                }
            } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * Update User Social Details
     * @param  string  $name             Name
     * @param  string  $email            Email
     * @param  string  $provider_name    Provider Name
     * @param  string  $provider_user_id Provider Social ID
     * @return boolean
     */
    public static function updateHybridauthUser($name,$email,$provider_name,$provider_user_id)
    {
        try {
            $dbconn = Database::getInstance();

            $stmt = $dbconn->prepare('UPDATE users SET name = :name,hybridauth_provider_name = :provider_name,
                                        hybridauth_provider_uid = :provider_user_id WHERE email= :email');

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':provider_name', $provider_name);
            if ($provider_name == 'yahoo') {
                $stmt->bindParam(':provider_user_id', $provider_user_id,PDO::PARAM_STR);
            } else {
            $stmt->bindParam(':provider_user_id', $provider_user_id, PDO::PARAM_INT);
            }
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                  return true;
              }
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }

        return false;
    }
}
