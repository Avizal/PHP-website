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

    <title><? echo $nameOfProject; //не удивляйтесь названию :) ?></title>
</head>
<body>
<?php require "../blocks/header.php"; //Тут Заголовок (шапка) страницы?>



<?php //Тут Основная часть страницы ?>

<div class="container mt-5">
    <H3 class="mb-5">Интересные статьи</H3>
    <div class="d-flex flex-wrap">

        <?php
            require "db.php";
            for($i = 1; $i <= 7; $i++): //Начинаем цикл
                $articles = R::findOne('artickes', 'id = ?', array($i));
        ?>

        
        
            <div class="card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"><?php echo $articles->title; ?></h4>
                </div>
                <div class="card-body">
                    <?php //Из-за ограничений хостинга, пришлось разместить картинки на стороннем ресурсе. ?>
                    <img src="<?php echo $articles->img; ?>" class="img-thumbnail">
                    <h1 class="card-title pricing-card-title"><?php echo $articles->views; ?> <small class="text-muted">просмотров</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><?php echo $articles->description; ?></li>
                    </ul>
                    <form action="/php/article.php?id=<?php echo $articles->id; ?>" method="POST">
                        
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Подробнее</button>
                    </form>
                </div>
            </div>

        
        

        <?php 
            endfor; //Заканчиваем цикл 
        ?>

    </div>
</div>




<?php require "../blocks/footer.php"; //Тут Концовка страницы ?>


</body>
</html>