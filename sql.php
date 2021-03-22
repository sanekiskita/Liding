<?php
    $connection = new mysqli("link", "user", "password", "databasename");//ссылка подключения
    $res = $connection->query("select users.login, objects.name from objects inner join users on objects.id = users.object_id");
?>