<?php
session_start();
  $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $tel = trim(filter_var($_POST['tel'], FILTER_SANITIZE_STRING));
  $address = $_POST['address'];
  $cart = $_SESSION['cart'];
  $dat = date('Y-m-d H:i:s');

  $cart = json_encode($cart);

  $error = '';
  if(strlen($name) <= 3)
    $error = 'Введите Ф.И.О.';
  elseif (strlen($email) <= 3)
    $error = 'Введите email';
  elseif (strlen($tel) <= 3)
    $error = 'Введите телефон';
  elseif (strlen($address) <= 3)
    $error = 'Введите адрес';

  if($error != '') {
    echo $error;
    exit;
  }

// require_once '../mysql_connect.php';

$user = 'root';
$password = '';
$db = 'pizzaorder';
$host = 'localhost';
$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO ($dsn, $user, $password);

  $sql = 'INSERT INTO customer(data, name, email, tel, address, cart) VALUES(?, ?, ?, ?, ?, ?)';  //на этот раз добавим в виде простого массива
  $query = $pdo->prepare($sql);
  $query->execute([$dat, $name, $email, $tel, $address, $cart]);

  echo 'Готово';
 ?>
