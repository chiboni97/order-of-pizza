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

  <div class="form-group">
    <label for="name">Ф.И.О.</label>
    <input type="text" class="form-control" id="name"  placeholder="Ф.И.О.">
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" placeholder="E-mail">
  </div>
  <div class="form-group">
    <label for="tel">Телефон</label>
    <input type="tel" class="form-control" id="tel"  placeholder="телефон">
  </div>
  <div class="form-group">
    <label for="address">Адрес</label>
    <input type="text" class="form-control" id="address" placeholder="Адрес">
  </div>

  <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;">  <!--создадим класс для вывода ошибки-->
  </div>

  <button type="submit" class="btn btn-primary" id='send_order'>Оформить</button>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script>
      $('#send_order').click(function () {
        var name = $('#name').val();
        var email = $('#email').val();
        var tel = $('#tel').val();
        var address = $('#address').val();
          $.ajax({
            type: "POST",
            url: 'ajax/getOrderCode.php',
            dataType: 'html',
            cache: false,
            data: {'name': name, 'email': email ,'tel': tel, 'address': address},//передаем наши данные
            success: function(data) {
              if(data == 'Готово') {
                $('#send_order').text('Заказ отправлен');
                $('#errorBlock').hide();
              }
              if(data !== 'Готово') {
                $('#errorBlock').show();
                $('#errorBlock').text(data);
              }
            }
          });
      });
  </script>
</body>
</html>
