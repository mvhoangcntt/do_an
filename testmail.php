<?php
require_once "Mail.php";

$from = "johncms365@gmail.com";
$to = 'haind@apecsoft.asia';

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = 'johncms365@gmail.com';
$password = '#@WhoIsMail#@';

$subject = "test";
$body = "test";

$headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
  'port' => $port,
  'auth' => true,
  'username' => $username,
  'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo($mail->getMessage());
} else {
  echo("Message successfully sent!\n");
}
?>
