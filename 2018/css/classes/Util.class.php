<?php

/**
 * Utilities class
 */

class Util
{

  /**
  * Redirect to a different page
  *
  * @param string $url  The relative URL
  * @return void
  */
  public static function redirect($url)
  {
    header('Location: http://' . $_SERVER['HTTP_HOST']. $url);
    exit;
  }

  /**
  * Deny access by sending an HTTP 403 header and outputting a message
  *
  * @return void
  */
  public static function denyAccess()
  {
    header('HTTP/1.0 403 Forbidden');
    echo '403 Forbidden';
    exit;
  }

  /**
   * Display 404 error
   *
   * @return void
   */
  public static function showNotFound()
  {
    header('HTTP/1.0 404 Not Found');
    echo "<h1>404 Not Found</h1>";
    exit;
  }

  /**
   * Get User IP address
   *
   * @return string  user ip address
   */
  public static function getUserIP()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $user_ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $user_ip = $_SERVER['REMOTE_ADDR'];
  }

  return $user_ip;
  }

}
