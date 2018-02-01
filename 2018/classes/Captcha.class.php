<?php
/**
 * Captcha Class for Google Recaptcha
 */

class Captcha
{
    private static $_captcha;

    private function __construct() {} //disallow creating new object of the class with new Hash()

    private function __clone() {} //disallow cloning the class

    /**
     * Verify the captcha
     *
     * @param  string  $text
     * @return boolean
     */
    public static function verifyCaptcha($text)
    {
        $response = static::getCaptcha()->verifyResponse($_SERVER["REMOTE_ADDR"],$text);

        if ($response != null && $response->success) {
            return true;
        } else {
            return false;
        }
    }

    /**
    * Get the singleton captcha object
    *
    * @return cpatcha object
    */
    private static function getCaptcha()
    {
    if (static::$_captcha === NULL) {

      require dirname(dirname(__FILE__)) . '/vendor/ReCaptcha/recaptchalib.php';

      static::$_captcha = new ReCaptcha(Config::RECAPTCHA_SECRETKEY);
    }

    return static::$_captcha;
    }
}
