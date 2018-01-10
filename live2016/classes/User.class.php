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
        $user->firstname  = $data['firstname'];
        $user->middlename  = $data['middlename'];
        $user->lastname  = $data['lastname'];
        $user->email = $data['emailaddress'];
        $user->dobmonth  = $data['dobmonth'];
        $user->dobday  = $data['dobday'];
        $user->dobyear = $data['dobyear'];
        $user->password = $data['password'];
        $user->password_confirmation = $data['password_confirmation'];

        $user->address1  = $data['address1'];
        $user->address2 = $data['address2'];
        $user->city = $data['city'];
        $user->country = $data['country'];
        $user->state  = $data['state'];
        $user->zipcode = $data['zipcode'];
        $user->primaryphone = $data['primaryphone'];
        $user->secondaryphone  = $data['secondaryphone'];
        $user->gender = $data['gender'];
        $user->vegan = $data['vegan'];
        $user->allergies = $data['allergies'];
        $user->souvenirbook  = $data['souvenirbook'];
        $user->shirtsize = $data['shirtsize'];
        $user->specialneeds = $data['specialneeds'];

        //$user->captcha = $data['g-recaptcha-response'];
        $user->name = $user->firstname." ".$user->middlename." ".$user->lastname;
 

        if ($user->isValid()) {
 
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
                $new_id = $dbconn->lastInsertId();                  
    

                $dob = $user->dobmonth."/".$user->dobday."/".$user->dobyear;
                $dob = explode("/", $dob);
                
                $age = (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) > date("md")
                    ? ((date("Y") - $dob[2]) - 1)
                    : (date("Y") - $dob[2]));

                $dob = $user->dobmonth."/".$user->dobday."/".$user->dobyear;

                $dbconn2 = Database::getInstance();

                $stmt2 = $dbconn2->prepare('INSERT INTO user_details
                                        (id,firstname,middlename,lastname,emailaddress,dob,age)
                                        VALUES
                                        (:id,:firstname,:middlename,:lastname,:emailaddress,:dob,:age)
                                        ');
                $bindings2= array(
                            'id' => $new_id,
                            'firstname'    => $user->firstname,
                            'middlename'    => $user->middlename,
                            'lastname'    => $user->lastname,
                            'emailaddress'   => $user->email,
                            'dob'    => $dob,
                            'age'=> $age,
                            );
                $stmt2->execute($bindings2);

                //Initialize flight table
                $dbconn3 = Database::getInstance();
                $stmt3 = $dbconn3->prepare('INSERT INTO user_flight (id) VALUES (:id)');
                $bindings3= array('id'  => $new_id);
                $stmt3->execute($bindings3);

                //Initialize emergency table
                $dbconn4 = Database::getInstance();
                $stmt4 = $dbconn4->prepare('INSERT INTO user_emergency (id) VALUES (:id)');
                $bindings4= array('id'  => $new_id);
                $stmt4->execute($bindings4);

                //Initialize insurance table
                $dbconn5 = Database::getInstance();
                $stmt5 = $dbconn5->prepare('INSERT INTO user_insurance (id) VALUES (:id)');
                $bindings5= array('id'  => $new_id);
                $stmt5->execute($bindings5);

                //Initialize volunteer table
                $dbconn6 = Database::getInstance();
                $stmt6 = $dbconn6->prepare('INSERT INTO user_volunteer (id) VALUES (:id)');
                $bindings6= array('id'  => $new_id);
                $stmt6->execute($bindings6);

                //Initialize misc table
                $dbconn7 = Database::getInstance();
                $stmt7 = $dbconn7->prepare('INSERT INTO user_misc (id) VALUES (:id)');
                $bindings7= array('id'  => $new_id);
                $stmt7->execute($bindings7);

                //Initialize misc table
                $dbconn8 = Database::getInstance();
                $stmt8 = $dbconn8->prepare('INSERT INTO user_payment (id) VALUES (:id)');
                $bindings8= array('id'  => $new_id);
                $stmt8->execute($bindings8);
 

               $dbconn9 = Database::getInstance();
                        $sql9 = 'UPDATE user_details SET
                                        address1 = :address1,
                                        address2 = :address2,
                                        country = :country,
                                        city = :city,
                                        state = :state,
                                        zipcode = :zipcode,
                                        primaryphone = :primaryphone,
                                        secondaryphone = :secondaryphone, 
                                        agegroup = :agegroup,
                                        gender = :gender,
                                        vegan = :vegan,
                                        allergies = :allergies,
                                        shirtsize = :shirtsize,
                                        souvenirbook = :souvenirbook,
                                        optout = :optout,
                                        specialneeds = :specialneeds WHERE id = :id';
                        $stmt9 = $dbconn9->prepare($sql9);
                        $bindings9= array(
                                        ':address1'    => $data['address1'],
                                        ':address2'   => $data['address2'],
                                        ':country' =>$data['country'],
                                        ':city'=> $data['city'],
                                        ':state'    => $data['state'],
                                        ':zipcode'   => $data['zipcode'],
                                        ':primaryphone'=> $data['primaryphone'],
                                        ':secondaryphone'    => $data['secondaryphone'], 
                                        ':agegroup'   => $data['agegroup'],
                                        ':gender' => $data['gender'],
                                        ':vegan'=> $data['vegan'],
                                        ':allergies'    => $data['allergies'],
                                        ':shirtsize'   => $data['shirtsize'],
                                        ':souvenirbook'    => $data['souvenirbook'],
                                        ':optout' => $data['opt_out'],
                                        ':specialneeds'    => $data['specialneeds'],
                                        ':id' => $new_id
                                        );
                        $stmt9->execute($bindings9);
             
 
                if (Auth::getInstance()->login($user->email,$user->password)) {
                    $url = '/registration3.php';
                    Util::redirect($url);
                    exit();
                }


                //Initialize misc table
                $dbconn10 = Database::getInstance();
                $stmt10 = $dbconn10->prepare('INSERT INTO user_sessions (id) VALUES (:id)');
                $bindings10= array('id'  => $new_id);
                $stmt10->execute($bindings10);

 
 

            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }

        return $user;
    }


public static function donation($data)
    {
        $user = new static();
        $user->name  = $data['donate_name'];
        $user->phonenumber  = $data['donate_phone']; 
        $user->email = $data['donate_email'];
        $user->city  = $data['donate_city'];
        $user->state  = $data['donate_state'];
        $user->amount = $data['donate_amount'];
        $user->message = $data['donate_message']; 
        $user->id = $data['id'];
 
      
 
            try {
                $dbconn = Database::getInstance();

                $stmt = $dbconn->prepare('INSERT INTO donations
                                        (donationID,donorName,donorPhone,donorEmail,donorCity,donorState,donorMessage,donationAmount)
                                        VALUES
                                        (:donationid,:name,:phone,:email,:city,:state,:message,:amount)
                                        ');
                $bindings= array(
                            'donationid'    => $user->id,
                            'name'    => $user->name,
                            'phone'   => $user->phonenumber, 
                            'email'    => $user->email,
                            'city'   => $user->city, 
                            'state'    => $user->state,
                            'message'   => $user->message, 
                            'amount'    => $user->amount
                            );
                

                $stmt->execute($bindings); 
  

            } catch (Exception $e) {
                error_log($e->getMessage());
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
       /* if (isset($this->captcha) && !Captcha::verifyCaptcha($this->captcha)) {
            $this->errors['captcha'] = 'Please fill correct captcha';
        }*/

        








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
     * @param  $password       Password
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

    public static function getData($query)
    {
        $data = array();
        
        try {
            $dbconn = Database::getInstance();

            // $offset = ($page - 1 ) * $users_per_page;
            $data = $dbconn->query($query)->fetch();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $data['users'] = [];
        }

        return $data;
    }

    public static function getAllData($query)
    {
        $data = array();
        
        try {
            $dbconn = Database::getInstance();

            // $offset = ($page - 1 ) * $users_per_page;
            $data = $dbconn->query($query)->fetchAll();
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


    

    public function saveProfileSecondary($profile_data){
   
      try { 

          $this->saveProfileAgeGroup($profile_data);
          $this->saveProfileInsurance($profile_data);
          $this->saveProfilePayment($profile_data);
          $this->saveProfileEmergency($profile_data);
          $this->saveProfileVolunteer($profile_data);
          $this->saveProfileMisc($profile_data);
          return true;

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }


    public function saveProfileAgeGroup($profile_data){
   
      try {   

            if(($profile_data['agegroup'] == "High School Waitlist") || ($profile_data['agegroup'] == "College Waitlist") || ($profile_data['agegroup'] == "JNF Waitlist")){
                $waitlist = 1;
            }               
            else
                {$waitlist = 0;}

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_details SET                            
                            agegroup = :agegroup,
                            is_waitlist = :is_waitlist WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(                           
                            ':agegroup'   => $profile_data['agegroup'],      
                            ':is_waitlist' => $waitlist,                      
                            ':id' => $this->id
                            );
            $stmt->execute($bindings);

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

    public function saveProfileDetails($profile_data){
   
      try {   

               

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_details SET
                            address1 = :address1,
                            address2 = :address2,
                            city = :city,
                            state = :state,
                            zipcode = :zipcode,
                            primaryphone = :primaryphone,
                            secondaryphone = :secondaryphone, 
                            agegroup = :agegroup,
                            vegan = :vegan,
                            allergies = :allergies,
                            shirtsize = :shirtsize,
                            souvenirbook = :souvenirbook,
                            specialneeds = :specialneeds WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':address1'    => $profile_data['address1'],
                            ':address2'   => $profile_data['address2'],
                            ':city'=> $profile_data['city'],
                            ':state'    => $profile_data['state'],
                            ':zipcode'   => $profile_data['zipcode'],
                            ':primaryphone'=> $profile_data['primaryphone'],
                            ':secondaryphone'    => $profile_data['secondaryphone'], 
                            ':agegroup'   => $profile_data['agegroup'],
                            ':vegan'=> $profile_data['vegan'],
                            ':allergies'    => $profile_data['allergies'],
                            ':shirtsize'   => $profile_data['shirtsize'],
                            ':souvenirbook'    => $profile_data['souvenirbook'],
                            ':specialneeds'    => $profile_data['specialneeds'],
                            ':id' => $this->id
                            );
            $stmt->execute($bindings);

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }


    public function saveProfilePayment($profile_data){
   
      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_payment SET
                            agegroup = :agegroup,
                            type = :type WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':agegroup'   => $profile_data['agegroup'],
                            ':type'=> $profile_data['type'],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

    public function roomReady($roomnum){
   
      try {   
 
            $dbconn = Database::getInstance();
            $stmt = $dbconn->prepare('INSERT INTO readyrooms
                                    (roomnum)
                                    VALUES
                                    (:roomnum)
                                    ');
            $bindings= array(
                        ':roomnum'    => $roomnum
                        );
            

            $stmt->execute($bindings);


            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  
 
    }

    public function saveJAB($profile_data){
   
      try {   
 
            $dbconn = Database::getInstance();
            $stmt = $dbconn->prepare('INSERT INTO jab
                                    (details_key,experience)
                                    VALUES
                                    (:dk,:experience)
                                    ');
            $bindings= array(
                        'dk'    => $profile_data["id"],
                        'experience'   => $profile_data["experience"]
                        );
            

            $stmt->execute($bindings);



            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE user_misc SET
                            jab_signedup = :jab_signedup WHERE id = :id';
            $stmt2 = $dbconn->prepare($sql2);
            $bindings2= array(                            
                            ':jab_signedup'    => 1,
                            ':id'    => $profile_data["id"]
                            );
            $stmt2->execute($bindings2);

            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  
 
    }

    public function saveJIA($profile_data){
   
      try {   
 
            $dbconn = Database::getInstance();
            $stmt = $dbconn->prepare('INSERT INTO jia
                                    (details_key,interest)
                                    VALUES
                                    (:dk,:interest)
                                    ');
            $bindings= array(
                        'dk'    => $profile_data["id"],
                        'interest'   => $profile_data["interest"]
                        );
            

            $stmt->execute($bindings);



            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE user_misc SET
                            jia_signedup = :jia_signedup WHERE id = :id';
            $stmt2 = $dbconn->prepare($sql2);
            $bindings2= array(                            
                            ':jia_signedup'    => 1,
                            ':id'    => $profile_data["id"]
                            );
            $stmt2->execute($bindings2);

            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  
 
    }

    public function jiaInterest($interest){
   
        if($interest == 0){

            try {   
 
            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE user_misc SET
                            jia_notinterested = :jia_signedup WHERE id = :id';
            $stmt2 = $dbconn2->prepare($sql2);
            $bindings2= array(                            
                            ':jia_signedup'    => 1,
                            ':id'    => $this->id
                            );
            $stmt2->execute($bindings2);

            return true;


            } catch (PDOException $e) {
                    error_log($e->getMessage());
     
            }  

        }

        else{



            try {   
 
            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE user_misc SET
                            jia_signedup = :jia_signedup WHERE id = :id';
            $stmt2 = $dbconn2->prepare($sql2);
            $bindings2= array(                            
                            ':jia_signedup'    => 1,
                            ':id'    => $this->id
                            );
            $stmt2->execute($bindings2);

            return true;


            } catch (PDOException $e) {
                    error_log($e->getMessage());
     
            }  
        }

 
    }

 













    public function saveJNFBook($profile_data){
   
      try {   
 
            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_details SET
                            jnfbook_optin = :jnfbook_optin WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings = array(                            
                            ':jnfbook_optin'    => 1,
                            ':id'    => $profile_data["id"]
                            );
            $stmt->execute($bindings);

            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  
 
    }

    public function saveProfileCheckin($profile){
    try {

        

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_misc SET checked_in = :val, bags_checked = :valbag, textnumber = :textnumber WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings = array(        
                            ':val'    => $profile["checked_in"],   
                            ':valbag'    => $profile["bags_checked"], 
                            ':textnumber'    => $profile["textnumber"],       
                            ':id'    => $profile["id"]
                            );
            $stmt->execute($bindings);
         } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  

    }


    public function updateFlightTracker($id){
    try {
            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_misc SET travel_done = 1 WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings = array(        
                            ':id'    => $id
                            );
            $stmt->execute($bindings);
         } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  

    }

    public function registerSession($profile_data){

      if(($profile_data["sess_id"] == "13") || ($profile_data["sess_id"] == "14") || ($profile_data["sess_id"] == "17") || ($profile_data["sess_id"] == "18")){
        try {   
         
            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_sessions SET '.$profile_data["time"].' = :sessionID WHERE userid = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings = array(                  
                            ':sessionID'    => $profile_data["sess_id"],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);

            $cap = $profile_data["capacityfield"];
            $cap = $cap + 1;
 

            $dbconn1 = Database::getInstance();
            $sql1 = 'UPDATE Sessions SET '.$profile_data["capacityfield"].' = '.$profile_data["capacityfield"].' + 1 WHERE keyval = :id';
            $stmt1 = $dbconn1->prepare($sql1);
            $bindings1 = array(                   
                            ':id' => $profile_data["sess_id"]
                            );
            $stmt1->execute($bindings1);

            echo mysqli_error($dbconn1);


            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE Sessions SET '.$profile_data["gendercapacityfield"].' = '.$profile_data["gendercapacityfield"].' + 1 WHERE keyval = :id';
            $stmt2 = $dbconn2->prepare($sql2);
            $bindings2 = array(                   
                            ':id' => $profile_data["sess_id"]
                            );
            $stmt2->execute($bindings2);

            echo mysqli_error($dbconn2);


            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  

      }

      else{
        try {   
         
            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_sessions SET '.$profile_data["time"].' = :sessionID WHERE userid = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings = array(                  
                            ':sessionID'    => $profile_data["sess_id"],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);

            $cap = $profile_data["capacityfield"];
            $cap = $cap + 1;
 

            $dbconn1 = Database::getInstance();
            $sql1 = 'UPDATE Sessions SET '.$profile_data["capacityfield"].' = '.$profile_data["capacityfield"].' + 1 WHERE keyval = :id';
            $stmt1 = $dbconn1->prepare($sql1);
            $bindings1 = array(                   
                            ':id' => $profile_data["sess_id"]
                            );
            $stmt1->execute($bindings1);

            echo mysqli_error($dbconn1);

            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  

      }
   
      
 
    }

    public function unregisterSession($profile_data){
   
      if(($profile_data["sess_id"] == "13") || ($profile_data["sess_id"] == "14") || ($profile_data["sess_id"] == "17") || ($profile_data["sess_id"] == "18")){

                try { 
         
            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_sessions SET '.$profile_data["time"].' = :sessionID WHERE userid = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings = array(                  
                            ':sessionID'    => 0,
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);

            $dbconn1 = Database::getInstance();
            $sql1 = 'UPDATE Sessions SET '.$profile_data["capacityfield"].' = '.$profile_data["capacityfield"].' - 1 WHERE keyval = :id';
            $stmt1 = $dbconn1->prepare($sql1);
            $bindings1 = array(                   
                            ':id' => $profile_data["sess_id"]
                            );
            $stmt1->execute($bindings1);

            echo mysqli_error($dbconn1);

            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE Sessions SET '.$profile_data["gendercapacityfield"].' = '.$profile_data["gendercapacityfield"].' - 1 WHERE keyval = :id';
            $stmt2 = $dbconn2->prepare($sql2);
            $bindings2 = array(                   
                            ':id' => $profile_data["sess_id"]
                            );
            $stmt2->execute($bindings2);

            echo mysqli_error($dbconn2);

            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  


      }

      else{

        try { 
         
            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_sessions SET '.$profile_data["time"].' = :sessionID WHERE userid = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings = array(                  
                            ':sessionID'    => 0,
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);
 
            var_dump($profile_data);

            $dbconn1 = Database::getInstance();
            $sql1 = 'UPDATE Sessions SET '.$profile_data["capacityfield"].' = '.$profile_data["capacityfield"].' - 1 WHERE keyval = :id';
            $stmt1 = $dbconn1->prepare($sql1);
            $bindings1 = array(                   
                            ':id' => $profile_data["sess_id"]
                            );
            $stmt1->execute($bindings1);

            echo mysqli_error($dbconn1);

            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  

      }

 
    }


    public function saveRoomate($profile_data){
   
      try {   
 
            $dbconn = Database::getInstance();
            $stmt = $dbconn->prepare('INSERT INTO user_roomate
                                    (selector, selected)
                                    VALUES
                                    (:selector,:selected)
                                    ');
            $bindings= array(
                        'selector'    => $profile_data["id"],
                        'selected'   => $profile_data["selected"]
                        );
            

            $stmt->execute($bindings);



            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE user_misc SET
                            roomate_done = :roomate_done WHERE id = :id';
            $stmt2 = $dbconn->prepare($sql2);
            $bindings2= array(                            
                            ':roomate_done'    => 1,
                            ':id'    => $profile_data["id"]
                            );
            $stmt2->execute($bindings2);

            return true;


        } catch (PDOException $e) {
                error_log($e->getMessage());
 
        }  
 
    }













    public function onPayment($profile_data){
   
      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_payment SET
                            donation = :donation,
                            customerID = :customerID,
                            amount = :amount,
                            paid = :paid,
                            receiptEmail = :receiptEmail,
                            transactionID = :transaction,
                            token = :token WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            'customerID' => $profile_data['customerID'],
                            'donation' => $profile_data['donation'],
                            ':amount'   => $profile_data['amount'],
                            ':paid' => $profile_data['paid'],
                            ':receiptEmail' => $profile_data['receiptEmail'],
                            ':transaction'   => $profile_data['transaction'],
                            ':token'=> $profile_data['token'],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);


            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE user_misc SET
                            completed_registration = :completed_registration WHERE id = :id';
            $stmt2 = $dbconn->prepare($sql2);
            $bindings2= array(                            
                            ':completed_registration'    => 1,
                            ':id'    => $this->id
                            );
            $stmt2->execute($bindings2);



        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

public function onDonation($profile_data){
   
      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE donations SET
                            donationAmount = :amount,                             
                            receiptEmail = :receiptEmail,
                            transactionID = :transaction WHERE donationID = :donationID';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':amount'   => $profile_data['amount'],
                            ':receiptEmail' => $profile_data['receiptEmail'],
                            ':transaction'   => $profile_data['transaction'],
                            ':donationID'    => $profile_data['id']
                            );
            $stmt->execute($bindings);
  

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }



public function updateSessionCount($profile_data){
   
      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE Sessions SET
                            mreg = :mreg,                             
                            freg = :freg,
                            hsreg = :hsreg,                             
                            creg = :creg,
                            jnfreg = :jnfreg WHERE keyval = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':mreg'   => $profile_data['mcount'],
                            ':freg' => $profile_data['fcount'],
                            ':hsreg'   => $profile_data['hsreg'],
                            ':creg'   => $profile_data['creg'],
                            ':jnfreg'   => $profile_data['jnfreg'],
                            ':id'    => $profile_data['keyval']
                            );
            $stmt->execute($bindings);
  

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }


    public function saveProfileEmergency($profile_data){
   
      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_emergency SET
                            firstname = :firstname,
                            lastname = :lastname,
                            emailaddress = :emailaddress,
                            relation = :relation,
                            primaryph = :primaryph,
                            secondaryph = :secondaryph WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':firstname'   => $profile_data['emergencyfirstname'],
                            ':lastname'=> $profile_data['emergencylastname'],
                            ':emailaddress'    => $profile_data['emergencyemailaddress'],
                            ':relation'   => $profile_data['relationship'],
                            ':primaryph'=> $profile_data['emergencyprimaryph'],
                            ':secondaryph'    => $profile_data['emergencysecondaryph'],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

        public function saveProfileFlight($profile_data){
   
      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_flight SET
                            arrival_airline = :arrivalairline,
                            arrival_flightno = :arrivalflightnumber,
                            departure_airline = :departureairline,
                            departure_flightno = :departureflightnumber,
                            notflying = :notflying,
                            unsure = :unsure,
                            arrival = :arrival,
                            departure = :departure WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':arrivalairline'   => $profile_data['arrivalairline'],
                            ':arrivalflightnumber'=> $profile_data['arrivalflightnumber'],
                            ':departureairline'    => $profile_data['departureairline'],
                            ':departureflightnumber'   => $profile_data['departureflightnumber'],
                            ':notflying' => $profile_data['notflying'],
                            ':unsure' => $profile_data['unsure'],
                            ':arrival'=> $profile_data['arrival'],
                            ':departure'    => $profile_data['departure'],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);


            $dbconn2 = Database::getInstance();
            $sql2 = 'UPDATE user_misc SET
                            travel_done = :travel_done WHERE id = :id';
            $stmt2 = $dbconn->prepare($sql2);
            $bindings2= array(                            
                            ':travel_done'    => 1,
                            ':id'    => $this->id
                            );
            $stmt2->execute($bindings2);

            return true;

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

    public function saveProfileMisc($profile_data){

      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_misc SET
                            agreed_rules = :agreed_rules,
                            agreed_waiver = :agreed_waiver,
                            got_info = :got_info WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':agreed_rules'   => $profile_data['agreed_rules'],
                            ':agreed_waiver'=> $profile_data['agreed_waiver'],
                            ':got_info'    => 1,
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

    public function saveProfileVolunteer($profile_data){
   
      try {   

            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_volunteer SET
                            preference = :preference WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':preference'   => $profile_data['volunteerpreference'],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);

        } catch (PDOException $e) {
                error_log($e->getMessage());
        }  
    }

    public function saveProfileInsurance($profile_data){
   
      try {  
 
            $dbconn = Database::getInstance();
            $sql = 'UPDATE user_insurance SET 
                            firstname = :firstname,
                            lastname = :lastname,
                            carrier = :carrier,
                            policyno = :policyno,
                            groupno = :groupno,
                            idnumber = :idnumber,
                            phonenumber = :phonenumber WHERE id = :id';
            $stmt = $dbconn->prepare($sql);
            $bindings= array(
                            ':firstname'   => $profile_data['policyfirstname'],
                            ':lastname' => $profile_data['policylastname'],
                            ':carrier'=> $profile_data['insurancecarrier'],
                            ':policyno'    => $profile_data['policytype'],
                            ':groupno'   => $profile_data['groupno'],
                            ':idnumber'=> $profile_data['idnumber'],
                            ':phonenumber'    => $profile_data['insurancephone'],
                            ':id'    => $this->id
                            );
            $stmt->execute($bindings);


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
