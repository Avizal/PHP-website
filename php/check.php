<?php
    //print_r($_POST);
    $email = $_POST['email'];
    $message = $_POST['message'];
    $checked = true;

    $errors = array();
    if (trim($email) == '') 
        $errors[] = 'E-mail не был введен!';
    else if (trim($message) == '') 
        $errors[] = 'Текст сообщения не был введен!';
    else if (strlen($message) < 10) 
        $errors[] = 'Текст сообщения слишком короткий!';

    if (!empty($errors)) {
        //echo $error;
        require "about.php";
        //exit; //Заканчивает выполнение функции, альтернатива return;
    }
    else 
    {
            
        $subject = "=?utf-8?B?".base64_encode("Обратная связь с сайта")."?=";
        $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html;charset=utf-8\r\n";

        mail('avizal@protonmail.com', $subject, $message, $headers); //Отправка сообщения на почту.
        //header('Location: /php/about.php');
        require "about.php";
    }
?>