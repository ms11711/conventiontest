<?php

/**
 * Mail class - a wrapper around PHPMailer
 */

class Mail
{

  private static $_mailer;

  private function __construct() {}  // disallow creating a new object of the class with new Mail()

  private function __clone() {}  // disallow cloning the class

  /**
   * Send an email
   *
   * @param string $name     Name
   * @param string $email    Email address
   * @param string $subject  Subject
   * @param string $body     Body
   * @return boolean         true if the email was sent successfully, false otherwise
   */
  public static function send($name,$email,$subject,$body)
  {
    $mail = self::getMailer();
    $mail->addAddress($email,$name);
    $mail->Subject = $subject;
    $parsedbody = strtr($body,array('{username}'=>$name,'{useremail}'=>$email));
    $mail->Body = $parsedbody;

    if ( ! $mail->send()) {
      error_log($mail->ErrorInfo);

      return false;

    } else {
      return true;

    }
  }

  /**
   * Send mail to all active users
   * @param  array  $user_emails
   * @param  string $subject
   * @param  string $body
   * @return boolean
   */
  public static function sendToAll($user_emails,$subject,$body)
  {

    try {
    foreach ($user_emails as $user) {
      $mail = self::getMailer();
       $mail->addAddress($user['email']);
       $mail->Subject = $subject;
       $getuser = User::findByEmail($user['email']);
       $parsedbody = strtr($body,array('{username}'=>$getuser->name,'{useremail}'=>$user['email']));
       $mail->Body = $parsedbody;
       $mail->send();
       $mail->ClearAllRecipients();
    }

    return true;
  } catch (Exception $e) {
    return false;
  }

  }

  /**
    * Get the singleton Mailer object
    *
    * @return mailer
    */
    private static function getMailer()
    {
    if (static::$_mailer === NULL) {

      require dirname(dirname(__FILE__)).'/vendor/PHPMailer/PHPMailerAutoload.php';

      static::$_mailer = new PHPMailer();

      static::$_mailer->isSMTP();
      static::$_mailer->Host = Config::SMTP_HOST;
      static::$_mailer->SMTPAuth = true;
      static::$_mailer->Username = Config::SMTP_USER;
      static::$_mailer->Password = Config::SMTP_PASS;
      static::$_mailer->SMTPSecure = Config::SMTP_SECURE;
      static::$_mailer->Port = Config::SMTP_PORT;

      static::$_mailer->From = Config::SMTP_USER;
      static::$_mailer->FromName = Config::EMAIL_HEADER;
      static::$_mailer->isHTML(true);
    }

    return static::$_mailer;
    }
}
