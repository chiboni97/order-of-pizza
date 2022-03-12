<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пицца рядом</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

</head>
<body>
  <nav class="navbar navbar-light bg-light">
    <form class="container-fluid justify-content-start">
      <a class="btn btn-default btn-sm" href="index.php">Главная</a>
      <a class="btn btn-default btn-lg" href="cart.php">
         Корзина
        <span class="badge basker_kol">0</span>
      </a>
    </form>
  </nav>
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="../img/1.jpg" alt="Неаполетано">
        <div class="caption">
          <h3>Неаполетано</h3>
          <p>
            <button class="btn btn-primary btn-buy" id="1">Купить</button>
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="../img/2.jpg" alt="С морепродуктами">
        <div class="caption">
          <h3>С морепродуктами</h3>
          <p>
            <button class="btn btn-primary btn-buy" id="2">Купить</button>
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="../img/3.jpg" alt="4 сыра">
        <div class="caption">
          <h3>4 сыра</h3>
          <p>
            <button class="btn btn-primary btn-buy" id="3">Купить</button>
          </p>
        </div>
      </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
  $('.btn-buy').click(function () {
    var id = $(this).attr('id');
      $.ajax({
      type: "POST",
      url: 'productForCart.php',
      dataType: 'html',
      data: {id_tov: id},
      success: function(data) {
        $('.basker_kol').html(data);//меняем количество товаров на кнопке корзины
        }
      });
  });
</script>
</body>
</html>
