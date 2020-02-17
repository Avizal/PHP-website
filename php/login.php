<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 

    <title>Вход</title>
</head>
<body class="text-center">
<?php require "../blocks/header.php"; //Тут Заголовок (шапка) страницы

//Тут Основная часть страницы 
//require "db.php";

$data = $_POST;
if (isset($data['do_login'])) //Проверяю, была ли нажата кнопка
{
    //Проверяем, если при проверке были найдены ошибки, то отображаем их.
    

    if (empty($errors))
    {
        echo '<div style="color: green;">Вы успешно авторизованы</div><hr>';
    }
    else
    {
        echo '<div style="color: red;"><strong>'. array_shift($errors) .'</strong></div><hr>';
    }
}
?>

<div class="form-group container">

    <form action="/php/checklogin.php" method="POST">
    
        <div class="container col-xs-12 col-md-6 col-md-offset-3 well">
            Ваш логин
            <input type="text" name="login" class="form-control" value="<?php echo @$data['login']; //Возвращает значение после обновления страницы?>"><br>
        </div>
        <div class="container col-xs-12 col-md-6 col-md-offset-3 well">
            Ваш пароль
            <input type="password" name="password" class="form-control" value="<?php echo @$data['password']; ?>"><br>
        </div>

        <button type="submit" name="do_login" class="btn btn-success">Войти!</button>
    </form>

    <br><br><br><br><br>
    <div class="container mt-5">
    <h6><U><a href="/php/signup.php">Если вы не зарегистрированны у нас на сайте, можете пройти процедуру регистрации.</a></U></h6>

    

</div>
    
</div>

<?php require "../blocks/footer.php"; //Тут Концовка страницы ?>

</body>
</html>