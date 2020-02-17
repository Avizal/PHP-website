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
<div class='container'>
    <h5><a>Для обратной связи</a></h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted">E-mail: Avizal@protonmail.com</a></li>
        </ul>
    <h5><a name="team">Команда разработчиков:</a></h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted">Главный разработчик: Руслан Причепа</a></li>
          <li><a class="text-muted">Главный <del>"дизайнер"</del>: Руслан Причепа</a></li>
          <li><a class="text-muted">Главный редактор: Руслан Причепа</a></li>
        </ul>
        <h5><a name="location">Местонахождение</a></h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted">Одесса</a></li>
        </ul>
        <h5><a name="privacy">Конфиденциальность</a></h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted">1. Сайт НЕ хранит никаких конфедициальных данных.</a></li>
          <li><a class="text-muted">2. Даже E-mail при регистрации не запрашивается.</a></li>
          <li><a class="text-muted">3. Логин и Пароль на данном сайте - полет Ваших мыслей и конфиденциальными данными не считается.</a></li>
          <li><a class="text-muted">4. Пароль перед внесением в базу данных - хэшируется. Но просим Вас не указывать при регистрации паролей используемые на других ресурсах!</a></li>
          <li><a class="text-muted">5. Куки используются только для авторизации и храняться только 2 часа, после, успешно стираются.</a></li>

        </ul>
</div>

<?php require "../blocks/footer.php"; //Тут Концовка страницы ?>


</body>
</html>