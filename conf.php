<?php
  //буде два типи відправки
  // 1-тип

  $mail_settings_dev = [
    'host' => 'smtp.mailtrap.io',
    'auth' => 'true',
    'port' => 2525,
    'username' => 'b96474e02379a1',
    'password' => 'e681adb7bed450',
    'secure' => null,
    'charset' => 'UTF-8',
    'from' => '1ead22d391-6f962b@inbox.mailtrap.io',
    'name' => 'WebForMyself',
    'is_html' => true
  ];


  $mail_settings_prod = [
    'host' => 'smtp.gmail.com',
    'auth' => true,
    'port' => 465, // 587
    'username' => 'olochka27@gmail.com',
    'password' => 'your_password',
    'secure' => 'ssl',  // tls
    'charset' => 'UTF-8',
    'from' => 'olochka27@gmail.com',
    'name' => 'WebOlochka',
    'is_html' => true
  ];

?>