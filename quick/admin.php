
<!doctype html>
<html lang="en">
  <head>
	<title>Задачник</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
  <body>
  <nav class="navbar navbar-light bg-light">
 <?php if (!isset($_COOKIE['user'])){ 
    echo '<button id="login" class="btn btn-info" data-toggle="modal" data-target="#LoginForm" style="margin-left:50px; width:200px">Войти</button>';
 }else{
    echo '<b>Привет, админ!</b> <form action="config/adm.php" method="POST"><button type="submit" name="logout" id="logOut" class="btn btn-danger" style="margin-left:50px; width:200px">Выйти</button></form>';
 }?>
</nav>
<div id="FormEditOverlay"></div>
<div id="Overlay"></div>
<div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="Login" action="config/adm.php" method="POST">
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" class="form-control" name="login"
                            placeholder="Введите Ваш логин" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="text" class="form-control" name="password" placeholder="Введите пароль" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id='Log_In'>Войти</button>
                    <div id="log"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
  <h2>Список всех ссылок пользователей</h2>
         
  <table class="table">
    <thead>
      <tr>
        <th>Уникальный ID</th>
        <th>Ссылка</th>
        <th>Действие</th>
      </tr>
    </thead>
    <tbody>

<?php if (isset($_COOKIE['user'])){ 
    require_once('config/db.php');
    $query = $db->query("SELECT * FROM `url`")->fetchAll();
    for ($i = 0; $i < count($query); $i++){
        echo '<tr><td>'.$query[$i]['redirect'].'</td><td>'.$query[$i]['original'].'</td><td><button class="btn btn-secondary" urlid="'.$query[$i]['id'].'">Удалить</button></td></tr>';
    }

 }?>

</tbody>
  </table>
</div>
<script>
$(".btn-secondary").click(function () {
    let urlid = $(this).attr('urlid');
        console.log(urlid);
        $.ajax({
        type: 'post',
        url: 'config/del.php',
        data: {
            urlid: urlid
        },
        success: function (data, status, xhr) {
            $(".btn-secondary").html(data);
        },
        error: function (jqXhr, textStatus, errorMessage) {
            $(".btn-secondary").html(data);
        }
    });

    });
    </script>

</body>
</html>