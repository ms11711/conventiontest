<?php
/**
 *  Crsf class to prevent Cross Site Request Forgery Attacks
 */
class Csrf
{
    private static $_instance;

    private function __construct() {}

    private function __clone() {}

    /**
     * get the instance
     */
    public static function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new Csrf();
        }

        return self::$_instance;
    }

    /**
     * get the token id from the users session,if one has not already been created then it generates a random token.
     */
    public function getTokenID()
    {
        if (isset($_SESSION['token_id'])) {
                return $_SESSION['token_id'];
        } else {
                $token_id = $this->random(10);
                $_SESSION['token_id'] = $token_id;

                return $token_id;
        }
    }

    /**
     *  gets the token value,if one has not already been generated then it generates one.
     */
    public function getToken()
    {
        if (isset($_SESSION['token_value'])) {
                return $_SESSION['token_value'];
        } else {
                $token = hash('sha256', $this->random(500));
                $_SESSION['token_value'] = $token;

                return $token;
        }

    }

    /**
     * check if the token id and the token value are valid
     */
    public function checkValid($method)
    {
        if ($method == 'post' || $method == 'get') {
                $post = $_POST;
                $get = $_GET;
                if (isset(${$method}[$this->getTokenID()]) && (${$method}[$this->getTokenID()] == $this->getToken())) {
                        return true;
                } else {
                        return false;
                }
        } else {
                return false;
        }
    }

    /**
     * generates random names for the form fields
     */
    public function formNames($names, $regenerate) {
 
        $values = array();
        foreach ($names as $n) {
                if($regenerate == true) {
                        unset($_SESSION[$n]);
                }
                $s = isset($_SESSION[$n]) ? $_SESSION[$n] : $this->random(10);
                $_SESSION[$n] = $s;
                $values[$n] = $s;       
        }
        return $values;
    }

    /**
     * generates a random string using the linux random file
     */
    private function random($len) {
        if (function_exists('openssl_random_pseudo_bytes')) {
                $byteLen = intval(($len / 2) + 1);
                $return = substr(bin2hex(openssl_random_pseudo_bytes($byteLen)), 0, $len);
        } elseif (@is_readable('/dev/urandom')) {
                $f=fopen('/dev/urandom', 'r');
                $urandom=fread($f, $len);
                fclose($f);
                $return = '';
        }
 
        if (empty($return)) {
                for ($i=0;$i<$len;++$i) {
                        if (!isset($urandom)) {
                                if ($i%2==0) {
                                             mt_srand(time()%2147 * 1000000 + (double)microtime() * 1000000);
                                }
                                $rand=48+mt_rand()%64;
                        } else {
                                $rand=48+ord($urandom[$i])%64;
                        }
 
                        if ($rand>57)
                                $rand+=7;
                        if ($rand>90)
                                $rand+=6;
 
                        if ($rand==123) $rand=52;
                        if ($rand==124) $rand=53;
                        $return.=chr($rand);
                }
        }
 
        return $return;
    }
}
