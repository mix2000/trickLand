<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 3:21
 */
class saleTypeController extends router
{
    protected $module = 'saleType';
    protected $rules = [
        'index' => ['admin'],
        'redact' => ['admin'],
        'SaveInfo' => ['admin'],
        'delete' => ['admin'],
    ];

    public function actionIndex()
    {
        $sale = new saleType($this->db);
        // page
        $info['sale'] = $sale->getData(1, 0);
        $this->renderPage($info, 'index');
    }

    public function actionRedact()
    {
        if (isset($_GET['red']) and is_numeric($_GET['red'])) {
            $sale = new saleType($this->db);
            $info['infoSale'] = $sale->getInfoById($_GET['red']);
        } else {
            $info['infoSale']['name'] = '';
            $info['infoSale']['sale'] = '';
            $info['infoSale']['countDayLimit'] = '';
            $info['infoSale']['timeDay'] = '';
            $info['infoSale']['id'] = '';
        }
        $info['id_user'] = usersClass::getAllUsersBySchool(1);
        $users = new saleType($this->db);
        $info['type'] = $users->getAllTemplateBySchool(1);
        $this->renderPage($info, 'redact');
    }

    // TODO: who add and school
    public function actionSaveInfo()
    {
        $sale = new saleType($this->db);
        if (isset($_POST['id']) and is_numeric($_POST['id'])) {
            $sale->updSale(['name' => $_POST['name'], 'sale' => $_POST['sale'], 'id_school' => 1, 'id' => $_POST['id'], 'timeDay' => $_POST['timeDay'], 'countDayLimit' => $_POST['countDayLimit']]
            );
        } else {
            $sale->addSale(['name' => $_POST['name'], 'sale' => $_POST['sale'], 'id_school' => 1, 'timeDay' => $_POST['timeDay'], 'countDayLimit' => $_POST['countDayLimit']]);
        }
        header('location:'.HTTP_PATH.'/saleType/index');
    }

    public function actionDelete()
    {
        $sale = new saleType($this->db);
        $sale->deleteSale($_GET['id']);
        header('location: '.HTTP_PATH.'/saleType/index');

    }
}