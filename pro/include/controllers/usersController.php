<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 15.11.2016
 * Time: 21:18
 */
class usersController extends router
{
    protected $module = 'users';
    protected $rules = [
        'index'=>['admin'],
        'add'=>['admin'],
        'saveInfo'=>['admin'],
        'delete'=>['admin']
    ];


    public function actionIndex()
    {
        $this->renderPage(['users' => usersClass::getAllUsers()], 'index');
    }

    public function actionAdd()
    {
        if (isset($_GET['red']) and is_numeric($_GET['red'])) {
            $info['user'] = usersClass::getUserById($_GET['red']);
        } else {
            $info['user']['username'] = '';
            $info['user']['email'] = '';
            $info['user']['group'] = '';
            $info['user']['id'] = '';
            $info['user']['status'] = '';
        }
        $this->renderPage($info, 'add');
    }

    public function actionSaveInfo()
    {
// TODO : сохранение и обновление пользователя
        if (isset($_POST['id']) and is_numeric($_POST['id'])) {
            $userData = [
                'username' => $_POST['username'],
                'group' => $_POST['group'],
                'status' => $_POST['status'],
                'id' => $_POST['id'],
            ];
            usersClass::updateUser($userData);
        } else {
            $generatePassword = usersClass::generateCode(15);
            $userData = [
                'username' => $_POST['username'],
                'group' => $_POST['group'],
                'password' => $generatePassword,
                'fpassword' => $generatePassword,
                'email' => $_POST['email']
            ];
            usersClass::addNewUser($userData);
        }
        header('location: '.HTTP_PATH.'/users/index');
    }

    public function actionDelete()
    {
        usersClass::deleteUserById($_GET['red']);
        header('location: '.HTTP_PATH.'/users/index');
// TODO :удаление пользователя
    }

}