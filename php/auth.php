<?php
    if ($_COOKIE['authUser'] == true) {
        //Анулируем куки.
        setcookie('authUser', false, time() - 7200, '/');
        setcookie('userName', "", time() - 7200, '/');
        setcookie('userPassword', "", time() - 7200, '/');
        header('Location: /');
    }
    else {
        setcookie('authUser', true, time() + 7200, '/');
        header('Location: /');
    }
?>