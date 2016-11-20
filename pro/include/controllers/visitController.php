<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 13:43
 */
class visitController extends router
{
    protected $module = 'visit';
    protected $rules = [
        'add' => ['admin', 'trainer'],
        'index' => ['admin', 'trainer'],
        'AJAX' => ['admin', 'trainer'],
        'addTraining' => ['admin', 'trainer'],
        'saveTraining' => ['admin', 'trainer'],
        'myTraining' => ['trainer'],
    ];

    public function actionAdd()
    {
        $visit = new visit($this->db);
        $info['userData'] = $visit->getInfoById($_GET['red']);
        $info['user'] = usersClass::getAllUsersBySchool(1);
        $info['userVisit'] = $visit->getInfoVisitById($_GET['red']);
        $this->renderPage($info, 'add');
    }

    public function actionIndex()
    {
        $visit = new visit($this->db);
        $info = [];
        if (isset($_GET['submit']) and $this->validateDate($_GET['date'])) {
            $info['sale'] = $visit->getVisitByDate(['date' => $_GET['date'], 'id_school' => 1]);
        } /*else {
            $info['sale'] = '';
        }*/
        $this->renderPage($info, 'index');
    }

    /*
     * TODO: предусмотреть невозможность ввода занятия другим пользователем для данного
     */

    public function actionAJAX()
    {
        $visit = new visit($this->db);
        $a = $visit->addVisit(['idUser' => $_POST['idUser'], 'idVisit' => $_POST['idVisit']]);
        if ($a) {
            echo json_encode(['msg' => $a]);
        }
    }

    public function actionmyTraining()
    {
        $visit = new visit($this->db);
        $info['training'] = $visit->getMyTrainingTrainer();
        $this->renderPage($info, 'myTraining');
    }

    public function actionAddTraining()
    {
        $visit = new visit($this->db);
        $info['data'] = $visit->getInfoById((isset($_GET['red'])) ? $_GET['red'] : '');
        $this->renderPage($info, 'AddTraining');
    }

    public function actionSaveTraining()
    {
        $visit = new visit($this->db);
        if (isset($_POST['red']) and is_numeric($_POST['red'])) {
            $id = $visit->updTraining(
                [
                    'id' => $_POST['red'],
                    'date' => $_POST['date'],
                    'training_type' => $_POST['training_type'],
                ]
            );
        } else {
            $id = $visit->addTraining(
                [
                    'date' => $_POST['date'],
                    'training_type' => $_POST['training_type'],
                ]
            );
        }
        header('location:'.HTTP_PATH.'/visit/add?red=' . $id);
    }
}