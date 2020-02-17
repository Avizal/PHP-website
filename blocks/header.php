<?php //Тут Заголовок страницы ?>
<?php 

    //Получаем имя проекта (сайта) из JSON файла настроек.
    $f_json = '../conf.json'; //Расположение файла настроек
    $json = file_get_contents($f_json); //Загружаем содержимое файла в переменную
    $obj = json_decode($json,true); //Декодируем содержимое
    $nameOfProject = $obj['nameOfProject']; //Заносим значение названия проекта в локальную переменную
?>


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/php/index.php"><? echo $nameOfProject; ?></a></h5>

  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">Главная</a>
    <a class="p-2 text-dark" href="about.php">Контакты</a>
  </nav>

    <?php
        if ($_COOKIE['authUser'] == true): //Если авторизирован!
    ?>
    <a class="btn btn-outline-primary" href="/php/mycabinet.php">Мой кабинет</a>
    <?php else: ?>
        <a class="btn btn-outline-primary" href="/php/login.php">Войти</a>
    <?php endif;?>
</div>