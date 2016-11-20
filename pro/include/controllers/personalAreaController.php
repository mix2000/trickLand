<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 1:47
 */
class personalAreaController extends router
{
    protected $module = 'personalArea';

    protected $rules = [
        'index' => ['admin', 'user', 'trainer'],
        'sale' => ['admin', 'user', 'trainer'],
        'subscription' => ['admin', 'user', 'trainer'],
        'mySale' => ['admin', 'user', 'trainer'],
    ];

    public function actionIndex()
    {
        $this->renderPage([], 'index');
    }

    public function actionmySale()
    {
        $personalArea = new personalArea($this->db);
        $info = [];
        $info['payData'] = $personalArea->getPayDataByUser(usersClass::$userData['id']);
        $this->renderPage($info, 'mySale');
    }

    public function actionSubscription()
    {
        $personalArea = new personalArea($this->db);
        $info = $personalArea->getSubscriptionState(usersClass::$userData['id']);
        $this->renderPage($info, 'Subscription');
    }


}