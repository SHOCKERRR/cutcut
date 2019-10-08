<?php
if(isset($_POST['login']) && !isset($_COOKIE['user'])){
    require_once('db.php');
    $login = htmlentities($_POST['login']);
    $password = htmlentities($_POST['password']);
    $query = $db->query("SELECT * FROM `admin` WHERE `id`=1")->fetchAll();
    if($login = $query['0']['name'] && $password == $query['0']['pass'])
    {
        setcookie("user", $query['0']['name'], time()+999999, "/");
        header("Location: /quick/quick/admin.php");
    }else{
        echo "Неправильно введен логин или пароль";
    }   
}else{
    echo "Вы уже авторизованы";
}

if(isset($_POST['logout'])){
    setcookie("user", '', time()-999999, "/");
    header("Location: /quick/quick/");
}


