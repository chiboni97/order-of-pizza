<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-light bg-light">
    <form class="container-fluid justify-content-start">
      <a class="btn btn-default btn-sm" href="index.php">Главная</a>
    </form>
  </nav>
<?php session_start();
if (!isset($_SESSION['cart'])):?>

<h2>Ваша корзина пуста</h2>

<?php else :?>
<table>

    <?php
    $listNamePizzaArr = ['Неаполетано','С морепродуктами','4 сыра'];
    $temp=$_SESSION['cart'];
          foreach($temp as $id=>$kol): ?>
            <div class="row" id = "<?=$id?>">
              <div class="container">
                <div class="col-12 col-md-2">
                  <?=$listNamePizzaArr[$id-1]?>
                </div>
                <div class="col-12 col-md-3">
                  <p id="<?=$id?>">
                  <div class='thumbnail'>
                    <img src="../img/<?=$id?>.jpg">
                  </div>
                </p>
                </div>
                <div class="col-12 col-md-3">
                  <input type="number" class="count-product" id="<?=$id?>" value="<?=$kol?>">
                </div>
                <div class="col-12 col-md-2">
                  <button class="btn btn-default btn-del" id="<?=$id?>">Удалить</button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
</table>
<form class="" action="getOrder.php" method="post">
  <button class="btn btn-primery" type="submit" name="" >Перейти к оформлению заказа</button>
</form>
<!-- <?php print_r($_SESSION['cart']); print_r($temp); echo "<br> - ".array_sum($temp);?> -->

<?php endif;?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script>

    //изменение количества
        $('.count-product').change(function () {
        var col = $(this).val();
        if (col<1){ col = 1; $(this).val(1); } //если ввели меньше 1 установим 1
        var id = $(this).attr('id');
            $.ajax({
            type: "POST",
            url: 'cartamount.php',
            data: {col_tov: col, id_tov: id},
            success: function() {
               //тут можно пересчитать сумму
                }
            });
        });
        //удаление товара
        $('.btn-del').click(function () {
        var id = $(this).attr('id');
            $.ajax({
            type: "POST",
            url: 'cartdel.php',
            data: {id_tov: id},
            success: function(data) {
                    //тут можно пересчитать сумму
                    // $('tr#'+id).css('display', 'none');//скрываем строку таблицы
                    // $('p#'+id).css('display', 'none');//скрываем картинку к пицце
                    $('div#'+id).css('display', 'none');//скрываем картинку к пицце
                }
            });
        });
</script>
</body>
</html>
