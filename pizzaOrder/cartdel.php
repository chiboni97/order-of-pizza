<?php
$id = $_POST['id_tov'];
session_start();
$temp = $_SESSION['cart'];
   if ($temp){
       unset ($temp[$id]);
      }
$_SESSION['cart'] = $temp;
if (empty($_SESSION['cart'])) {
  unset($_SESSION['cart']);
}
?>
