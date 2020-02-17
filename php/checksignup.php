<?php
require "db.php";

$data = $_POST;
if (isset($data['do_signup'])) //Проверяю, была ли нажата кнопка
{
    //Проверяем, всё ли привально заполненно

    $errors = array();//Сюда помещаем предупреждения.
    if (trim($data['login']) == '') 
    {
        $errors[] = "Введите логин"; // Текст предупреждения
    }
    if (($data['password']) == '') 
    {
        $errors[] = "Введите пароль"; // Текст предупреждения
    }
    if (($data['password']) != ($data['repassword'])) 
    {
        $errors[] = "Пароли не совпадают"; // Текст предупреждения
    }
    if (R::count('users', "login = ?", array($data['login'])) > 0) 
    {
        $errors[] = "Пользователь с таким логином уже зарегистрирован!"; // Текст предупреждения
    }

    if (empty($errors))
    {
        //Всё хорошо, регестрируем.
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT); //Хэшированный пароль
        $user->join_date = date("Y-m-d");
        R::store($user);
        //echo '<div style="color: green;">Вы успешно зарегистрированы</div><hr>';
        setcookie('authUser', true, time() + 7200, '/');
        setcookie('userName', $data['login'], time() + 7200, '/');
        setcookie('userPassword', $user->password, time() + 7200, '/');
        header('Location: /php/index.php');

    }
    else
    {
        //Если есть ошибки.
        require "signup.php";
    }
}
?>