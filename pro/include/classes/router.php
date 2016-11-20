<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 08.10.2016
 * Time: 1:15
 */
class router
{
    protected $db;
    protected $routers = [];
    protected $params = [];
    protected $menu = [];
    protected $module = 'index';
    protected $rules = [];

    public function __construct(pdo $db, $routers = [], $params = [])
    {
        $this->db = $db;
        $this->routers = $routers;
        $this->params = $params;
    }

    protected function testRules($action)
    {
        if (count($this->rules) == 0 or in_array(usersClass::$userType, $this->rules[$action])) {
            return true;
        } else {
            $this->module = 'index';
            $this->renderPage([], 'accessDenied');
        }
        exit();
    }

    protected function getInfo($nameLink, $action)
    {
        if (in_array($nameLink, $this->routers)) {
            $nameLink = $nameLink . 'Controller';
            $actionMethod = 'action' . $action;
            $a = new $nameLink($this->db, [], $this->params);
            $a->testRules($action);
            $a->$actionMethod();
            /*
            $a->unit($action);*/
        } else {
            $this->getPage($nameLink);
        }
    }

    protected function getPage($nameLink)
    {

        $sql = $this->params['getPage'];
        $sth = $this->db->prepare($sql);
        $sth->execute([$nameLink]);
        logger::addNewLog(__FILE__,__LINE__,'Название индекс ключа - '.$nameLink);
        if ($sth->rowCount() > 0) {
            $result = $sth->fetch();
            if ($result['redirectFlag'] == 1) {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . HTTP_PATH . "/" . $result['redirect']);
                exit();
            }
            $this->renderPage($result, $nameLink);
        } else {
            $this->callError404();
        }

    }

    protected function renderPage($info, $page)
    {
        require (file_exists('include/layouts/' . $this->module . '/header.php')) ? 'include/layouts/' . $this->module . '/header.php' : 'include/layouts/index/header.php';

        $menu = $this->menu;
        $menu[$page] = 'current';
        $file = 'include/view/' . $this->module . '/' . $page . '.php';
        if (file_exists($file)) {
            require($file);
        } else {
            logger::addNewLog(__FILE__,__LINE__,'Путь к файлу - '.$file);
            echo 'WTF???';
        }
        require('include/layouts/index/footer.php');
    }

    public function getStart()
    {
        usersClass::setPdo($this->db);
        usersClass::getUsersData();
        $module = 'index';
        $action = 'index';

        if ($_SERVER['REQUEST_URI'] != '/' and $_SERVER['REQUEST_URI']!='/pro/') {
            $path = str_replace('/pro', '', $_SERVER['REQUEST_URI']);
            $url_path = parse_url($path, PHP_URL_PATH);
            $uri_parts = explode('/', trim($url_path, ' /'));
            $module = array_shift($uri_parts); // Получили имя модуля
            $action = array_shift($uri_parts); // Получили имя действия
        }
        $action = ($action == '') ? 'index' : $action;
        $this->getInfo($module, $action);
    }

    protected function callError404()
    {
        $sql = $this->params['getPage'];
        $sth = $this->db->prepare($sql);
        $sth->execute(['error404']);
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        $this->renderPage($sth->fetch(), 'error404');
    }

    protected function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }


}