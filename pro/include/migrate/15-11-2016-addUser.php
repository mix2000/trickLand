<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 15.11.2016
 * Time: 13:42
 */
require('../bd.php');
require('../models/usersClass.php');
usersClass::setPdo($pdo);
$userData = [
    'username' => 'Михан',
    'group' => 'admin',
    'password' => 'createNewCode',
    'email' => 'tricking.mix@gmail.com',
];
var_dump(usersClass::addNewUser($userData));
