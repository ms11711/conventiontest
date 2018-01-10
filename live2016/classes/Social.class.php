<?php
/**
 * Social Class for hybridauth
 */

class Social
{
    private static $_social;

    public static $getEmail;

    private function __construct() {} //disallow creating new object of the class with new Hash()

    private function __clone() {} //disallow cloning the class

   /**
    * Get Social Profile Details
    *
    * @param  string $social_provider   Name of Social Network Provider
    * @return mixed    Retrieved Social Profile
    */
    public static function getSocialProfile($social_provider)
    {
        try {
            $adapter = static::getSocial()->authenticate( $social_provider );
            // then grab the user profile
            $user_profile = $adapter->getUserProfile();

            return $user_profile;
        } catch (Exception $e) {
             echo "<div class='error center-align red-text'>Unfortunately, we got an error: " . $e->getMessage();
             echo " Error code: " . $e->getCode() . "</div>";
        }

    }

    /**
    * Get the singleton social object
    *
    * @return social object
    */
    private static function getSocial()
    {
    if (static::$_social === NULL) {

      $config   = dirname(dirname(__FILE__)) . '/vendor/hybridauth/config.php';
      require dirname(dirname(__FILE__)) . '/vendor/hybridauth/Hybrid/Auth.php';

      static::$_social = new Hybrid_Auth($config);
    }

    return static::$_social;
    }
}
