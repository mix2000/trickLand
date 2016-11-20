<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 20.11.2016
 * Time: 20:38
 */

include '../pro/include/bd.php';

$phone = trim($_POST['phone']);
$phone = strip_tags($phone);
$name = trim($_POST['name']);
$name = strip_tags($name);

$sql = "INSERT INTO mix_phone_getter (phone,name) VALUE (?,?)";
$sth = $pdo->prepare($sql);
$sth->execute([$phone,$name]);