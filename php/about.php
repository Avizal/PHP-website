<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 

<?php 
    
?>

    <title><? echo "Обратная связь"; ?></title>
</head>
<body>
<?php require "../blocks/header.php"; //Тут Заголовок (шапка) страницы?>

<?php 
if (isset($checked))
{
    //Проверяем, если при проверке были найдены ошибки, то отображаем их.
    

    if (empty($errors))
    {
        echo '<div style="color: green;">Успешно отправлено!</div><hr>';
    }
    else
    {
        echo '<div style="color: red;"><strong>'. array_shift($errors) .'</strong></div><hr>';
    }
}
?>


<?php //Тут Основная часть страницы ?>
<div class="container mt-5">
    <H3>Контактная форма / Обратная связь</H3>

    <form action="check.php" method="post">
        <input type="email" name="email" placeholder="Введите Ваш Email, для ответа." class="form-control"><br>
        <textarea name="message" class="form-control"  placeholder="Введите текст сообщения"></textarea><br>
        <button type="submit" name="send" class="btn btn-success">Отправить!</button>
    </form>

</div>



<?php require "../blocks/footer.php"; //Тут Концовка страницы ?>


</body>
</html>