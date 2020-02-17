<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 

    <title>Регистрация</title>
</head>
<body >
<?php require "../blocks/header.php"; //Тут Заголовок (шапка) страницы?>


<?php //Тут Основная часть страницы 
//require "db.php";

$data = $_POST;
if (isset($data['do_signup'])) //Проверяю, была ли нажата кнопка
{
    //Проверяем, всё ли привально заполненно

    if (!empty($errors))
    {
        //Если есть ошибки
        echo '<div style="color: red;">'. array_shift($errors) .'</div><hr>';

    }
}
?>


<div class="form-group container">
    <form action="/php/checksignup.php" method="POST">
        <div class="container col-xs-12 col-md-6 col-md-offset-3 well"> 
            Ваш логин
            <input type="text" name="login" class="form-control" value="<?php echo @$data['login'];//Возвращает значение после обновления страницы?>"><br>
        </div>
        <div class="container col-xs-12 col-md-6 col-md-offset-3 well">
            Ваш пароль
            <input type="password" name="password" class="form-control" value="<?php echo @$data['password']; ?>"><br>
        </div>
        <div class="container col-xs-12 col-md-6 col-md-offset-3 well">
            Повторите Ваш пароль
            <input type="password" name="repassword" class="form-control" value="<?php echo @$data['repassword']; ?>"><br>
        </div>
        <div class="container col-xs-12 col-md-6 col-md-offset-3 well">
        <button type="submit" name="do_signup" class="btn btn-success form-control">Зарегестрироваться!</button>
        </div>
    </form>
</div>

<?php require "../blocks/footer.php"; //Тут Концовка страницы ?>

</body>
</html>