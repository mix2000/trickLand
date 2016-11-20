<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 6:18
 */
class authorizationController extends router
{
    protected $module = 'authorization';
    protected $rules = [
        'index' => ['defaultLogin'],
        'enter' => ['defaultLogin'],
        'exit' => ['admin', 'trainer', 'user']
    ];

    public function actionIndex()
    {
        $this->renderPage([], 'index');
    }

    public function actionEnter()
    {
        $result = usersClass::enterUser();
        if ($result === true or $result === false) {
            header('location:'.HTTP_PATH.'/');
        } else {
            header('location:'.HTTP_PATH.'/authorization/index?error=' . $result);
        }
    }

    public function actionExit()
    {
        usersClass::clearUserCookie();
        header('location:'.HTTP_PATH);
    }
}