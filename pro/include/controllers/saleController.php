<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 1:00
 */
class saleController extends router
{
    protected $module = 'sale';
    protected $rules = [
        'index' => ['admin', 'trainer'],
        'redact' => ['admin', 'trainer'],
        'SaveInfo' => ['admin', 'trainer'],
        'delete' => ['admin', 'trainer'],
    ];

    public function actionIndex()
    {

        $sale = new sale($this->db);
        // page
        if (isset($_GET['submit']) and $this->validateDate($_GET['date'])) {
            $info['sale'] = $sale->getDataByDate(1, 0, $_GET['date']);
        } else {
            $info['sale'] = $sale->getData(1, 0);
        }
        $this->renderPage($info, 'index');
    }

    public function actionRedact()
    {
        if (isset($_GET['red']) and is_numeric($_GET['red'])) {
            $sale = new sale($this->db);
            $info['infoSale'] = $sale->getInfoById($_GET['red']);
        } else {
            $info['infoSale']['id_user'] = '';
            $info['infoSale']['type'] = '';
            $info['infoSale']['sale'] = '';
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
        $sale = new sale($this->db);
        if (isset($_POST['id']) and is_numeric($_POST['id'])) {
            $sale->updSale(
                ['id_user' => $_POST['id_user'],
                    'type' => $_POST['type'],
                    'sale' => $_POST['sale'],
                    'id_school' => 1,
                    'id_user_add' => 2
                ]
            );
        } else {
            $sale->addSale([
                    'id_user' => $_POST['id_user'],
                    'type' => $_POST['type'],
                    'sale' => $_POST['sale'],
                    'id_school' => 1,
                    'id_user_add' => usersClass::$userData['id'],
                    'dateStart' => $_POST['dateStart'],
                    'dateFinal' => $_POST['dateFinal'],
                    'countVisitLimit' => $_POST['countVisitLimit']
                ]
            );
        }
        header('location: /sale/index');
    }

    public function actionDelete()
    {
        $sale = new sale($this->db);
        $sale->deleteSale($_GET['id']);
        header('location:'.HTTP_PATH.'/sale/index');
    }
}