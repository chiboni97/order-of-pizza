<?php
$id = $_POST['id_tov'];
$col = $_POST['col_tov'];

session_start();
$temp = $_SESSION['cart']; //переносим сессию во временную переменную
$temp[$id]=$col; //изменяем количество
$_SESSION['cart'] = $temp; //сохраняем сессию
?>
