<?php
if(isset($_POST['urlid'])){
    $id = $_POST['urlid'];
    require_once('db.php');
    $query = $db->prepare("DELETE FROM url WHERE id =:id");
    $query->bindParam(':id', $id);
    $query->execute();
echo "Успешно удалено";
echo '<meta http-equiv="refresh" content="1">';
}