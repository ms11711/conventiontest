<?php
/**
 * Hash Class for PHPass
 */

class Hash
{
    private static $_hasher;

    private function __construct() {} //disallow creating new object of the class with new Hash()

    private function __clone() {} //disallow cloning the class

    /**
     * Get a hash of text
     *
     * @param  string $text The clear text
     * @return string The hash
     */
    public static function make($text)
    {
        return static::getHasher()->HashPassword($text);
    }

    /**
     * @param  string  $text The cleartext
     * @param  string  $hash The hash
     * @return boolean
     */
    public static function check($text,$hash)
    {
        return static::getHasher()->CheckPassword($text,$hash);
    }

    /**
    * Get the singleton password hasher object
    *
    * @return PasswordHash
    */
    private static function getHasher()
    {
    if (static::$_hasher === NULL) {

      require dirname(dirname(__FILE__)) . '/vendor/PHPass/PasswordHash.php';

      static::$_hasher = new PasswordHash(8, false);
    }

    return static::$_hasher;
    }
}
