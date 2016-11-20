<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title><? // TODO: добавить мета данные?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=HTTP_PATH;?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=HTTP_PATH;?>/public/css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=HTTP_PATH;?>/public/css/jumbotron-narrow.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="header mainHeaderMenu">
        <ul class="nav nav-pills pull-right">
            <? if (usersClass::$userType != 'defaultLogin') { ?>
                <li><span>Вы зашли как <strong><?= usersClass::$userData['username']; ?></strong></span></li>
                <li class="active"><a href="<?=HTTP_PATH;?>/authorization/exit">Выход</a></li>
            <? } else { ?>
                <li class="active"><a href="<?=HTTP_PATH;?>/authorization/index">Вход</a></li>
            <? } ?>
        </ul>
        <h3 class="text-muted">Trick-X-OUT</h3>
    </div>
    <? if (usersClass::$userType != 'defaultLogin'){ ?>
    <div class="header">

        <ul class="nav nav-pills pull-right">
            <? if (usersClass::$userType == 'admin') { ?>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Пользователи
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=HTTP_PATH;?>/users">Пользователи - сводка</a></li>
                            <li><a href="<?=HTTP_PATH;?>/users/add">Добавить пользователя</a></li>
                        </ul>
                    </div>
                </li>
            <? } ?>
            <? if (usersClass::$userType == 'admin' or usersClass::$userType == 'trainer') { ?>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Посещения
                        </a>
                        <ul class="dropdown-menu">
                            <? if (usersClass::$userType == 'admin') { ?>
                                <li><a href="<?=HTTP_PATH;?>/visit">Посещения - сводка</a></li>
                            <? } ?>
                            <li><a href="<?=HTTP_PATH;?>/visit/addTraining">Отметить посещение</a></li>
                        </ul>
                    </div>
                </li>
            <? } ?>
            <? if (usersClass::$userType == 'admin' or usersClass::$userType == 'trainer') { ?>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Оплаты
                        </a>
                        <ul class="dropdown-menu">
                            <? if (usersClass::$userType == 'admin') { ?>
                                <li><a href="<?=HTTP_PATH;?>/sale">Сводка</a></li>
                            <? } ?>
                            <li><a href="<?=HTTP_PATH;?>/sale/redact">Добавить оплату</a></li>
                        </ul>
                    </div>
                </li>
            <? } ?>
            <? if (usersClass::$userType == 'admin') { ?>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Шаблоны оплат
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=HTTP_PATH;?>/saleType/">Шаблоны</a></li>
                            <li><a href="<?=HTTP_PATH;?>/saleType/redact">Добавить шаблон</a></li>
                        </ul>
                    </div>
                </li>
            <? } ?>
            <? if (usersClass::$userType != 'admin') { ?>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Личный кабинет
                        </a>
                        <ul class="dropdown-menu">
                            <? if (usersClass::$userType == 'user') { ?>
                                <li><a href="<?=HTTP_PATH;?>/personalArea/mySale">Мои оплаты</a></li>
                                <li><a href="<?=HTTP_PATH;?>/personalArea/subscription">Состояние абонемента</a></li>
                            <? } ?>
                            <? if (usersClass::$userType == 'trainer') { ?>
                                <li><a href="<?=HTTP_PATH;?>/visit/myTraining">Мои тренировки</a></li>
                            <? } ?>
                        </ul>
                    </div>
                </li>
            <? } ?>
        </ul>
    </div>
<? } ?>