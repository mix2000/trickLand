<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 08.10.2016
 * Time: 1:12
 */
$dblocation = "localhost"; // Имя сервера
$dbuser = "j596833";          // Имя пользователя
$dbpasswd = "rZhu4hm4ru&b";            // Пароль
$charset = 'utf8';
$datebase = 'j596833';
$dsn = "mysql:host=$dblocation;dbname=$datebase;charset=$charset";
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
$pdo = new PDO($dsn, $dbuser, $dbpasswd, $opt);