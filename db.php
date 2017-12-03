<?php
$host = 'localhost'; // адрес сервера 
$database = 'test_blog'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$dbh = mysql_connect($host, $user, $password) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");
?>