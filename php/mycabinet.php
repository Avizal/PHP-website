<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 

<?php 
    //Получаем имя проекта (сайта) из JSON файла настроек.
    $f_json = '../conf.json'; //Расположение файла настроек
    $json = file_get_contents($f_json); //Загружаем содержимое файла в переменную
    $obj = json_decode($json,true); //Декодируем содержимое
    $nameOfProject = $obj['nameOfProject']; //Заносим значение названия проекта в локальную переменную
?>

    <title><? echo $nameOfProject; ?></title>
</head>
<body>
<?php require "../blocks/header.php"; //Тут Заголовок (шапка) страницы?>




<?php //Тут Основная часть страницы ?>
<?php 
    //echo var_dump($_COOKIE['userName']);
    require "db.php"; //Подключаем фреймворк для работы с БД
    $articleOne = R::findOne('users', 'login = ?', array($_COOKIE['userName'])); //Получаем запись из БД
    if ($articleOne->password == $_COOKIE['userPassword']): //Если кто то намухливал с куки, подменил логин или пароль!
?>

<div class="container mt-5">
    <H2>Здравствуйте, <?php echo $_COOKIE['userName']; ?></H2>
    <H6>Вы зарегистрировались: <?php echo $articleOne->join_date; ?></H6>
    

     
    <div class="d-flex justify-content-between bd-highlight mb-3">
    <div class="p-2 bd-highlight">Ваш пароль в нашей базе данных выглядит так: <?php echo $articleOne->password; ?></div>
    <div class="p-2 bd-highlight"></div>
    <div class="p-2 bd-highlight">
        <a href="/php/auth.php"><button type="submit" name="do_exit" class="btn btn-danger">Выйти из аккаунта!</button></a></div>
    </div>
</div>
    
<?php else: ?>
    <H2>Замечена замена КУКИ, доступ к кабинету закрыт!</H2>
    <a class="p-2 text-dark" href="auth.php">ВЫЙТИ!</a>
<?php endif ?>


<?php require "../blocks/footer.php"; //Тут Концовка страницы ?>


</body>
</html>