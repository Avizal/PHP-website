<?php
require "db.php";
$data = $_POST;
if (isset($data['do_login'])) //Проверяю, была ли нажата кнопка
{
    //Проверяем, всё ли привально заполненно
    
    $errors = array();//Сюда помещаем предупреждения.
    $user = R::findOne('users', 'login = ?', array($data['login']));

    if ($user) 
    {
        //Если пользователь найден, то:


        if (password_verify($data['password'], $user->password))
        {
            //$eee = $_COOKIE['authUser'];
            //Если пароль правильный, то:
            //$_COOKIE['authUser'] = true;
            setcookie('authUser', true, time() + 7200, '/');
            setcookie('userName', $data['login'], time() + 7200, '/');
            setcookie('userPassword', $user->password, time() + 7200, '/');
            //require "../blocks/header.php";
            header('Location: /php/index.php');
            //require "auth.php";
            //session_start();
            //$_SESSION['logged_user'] = $user;
            //redir("Location: /php/index.php");
        }
        else
        {
            $errors[] = "Неправильный пароль!"; // Текст предупреждения
        }
    }
    else
    {
        $errors[] = "Пользователь с таким логином не найден!"; // Текст предупреждения
    }
    

    if (empty($errors))
    {
        echo '<div style="color: green;">Вы успешно авторизованы</div><hr>';
    }
    else
    {
        //$_POST['erroranswer'] = array_shift($errors);
        //header('Location: /php/login.php');
        //echo '<div style="color: red;">'. array_shift($errors) .'</div><hr>';
        require "login.php";

    }
}
?>