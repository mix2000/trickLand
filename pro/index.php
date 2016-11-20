<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 0:26
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
require('include/classes/logger.php');
logger::start();
require('include/bd.php');
require('include/classes/router.php');

// ����������

spl_autoload_register(function ($class_name) {
    if (file_exists('include/controllers/' . $class_name . '.php')) {
        require 'include/controllers/' . $class_name . '.php';
    } elseif (file_exists('include/models/' . $class_name . '.php')) {
        require 'include/models/' . $class_name . '.php';
    }
});
require('include/classes/labels.php');
require('include/config/const.php');


$router = new router($pdo, ['sale', 'saleType', 'visit', 'personalArea', 'authorization', 'users'], require('include/config/sql.php'));
$router->getStart();
logger::getReport();