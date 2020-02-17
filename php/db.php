<?php
//Получаем параметры из JSON файла настроек.

$f_json = '../conf.json'; //Расположение файла настроек
$json = file_get_contents($f_json); //Загружаем содержимое файла в переменную
$obj = json_decode($json,true); //Декодируем содержимое
$dbname = $obj['dbname']; //Заносим значение в локальную переменную
$dblogin = $obj['dblogin']; //Заносим значение в локальную переменную
$dbpassword = $obj['dbpassword']; //Заносим значение в локальную переменную
$dbhost = $obj['dbhost'];

require "../libs/rb.php";
R::setup( 'mysql:host='. $dbhost .';dbname=' . $dbname, $dblogin, $dbpassword ); //for both mysql or mariaDB

?>