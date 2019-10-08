<?php
if (isset($_POST['url'])) {
    $original = $_POST['url'];
    $redirect = substr(uniqid('', true), -5);
    require_once ('db.php');
    $query = "INSERT INTO `url` (`original`,`redirect`) VALUES ('$original','$redirect')";
    $db->prepare($query)->execute();
    $url = $_SERVER['SERVER_NAME'].'/'.$redirect;
    echo 'Твоя ссылка <br/><input type="url" id="redirect" value='.$url .'><br/><button class="btn1" onclick="copy()">КОПИРОВАТЬ</button><button class="btn2" style="margin-left:20px" onclick="hide()">ХОЧУ СОКРАТИТЬ ЕЩЁ ССЫЛКУ</button>';
    //echo '<script>document.getElementById("log").style.opacity="1";</script>';
}