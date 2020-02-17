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
    $data = $_GET; //Получение параметров из URL
    require "db.php"; //Подключаем фреймворк для работы с БД
    $articleOne = R::findOne('artickes', 'id = ?', array($data['id'])); //Получаем запись из БД

    $articleOne->views = ($articleOne->views + 1); //Устанавливаем новое значение для количества просмотров
    R::store($articleOne); //Обновляем значение просмотров в БД
?>


<div class="container mt-5">
    <H3><?php echo $articleOne->title; ?></H3>
    <div class="d-flex flex-wrap">
        <img src="<?php echo $articleOne->img; ?>" class="img-thumbnail"> <br>
        <div class='container card-body'>
        <a><strong>
            <?php echo $articleOne->description; ?>
        </strong></a>
        </div>
        <div class='container card-body'>
        
            <?php print $articleOne->text; ?>
        
    </div>
</div>    
        <div class="d-flex justify-content-between bd-highlight mb-3">
    <div class="p-2 bd-highlight"><?php echo $articleOne->views; ?> Просмотров</div>
    <div class="p-2 bd-highlight"></div>
    <div class="p-2 bd-highlight">Дата публикации: <?php echo $articleOne->pubdate; ?></div>
  </div>
        
        <?php 
        //echo var_dump($_GET); 
        ?>





<?php require "../blocks/footer.php"; //Тут Концовка страницы ?>


</body>
</html>