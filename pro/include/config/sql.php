<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 08.10.2016
 * Time: 1:24
 */

return [
    'getPage' => "SELECT title,keywords,description, redirect, redirectFlag,content FROM mix_content WHERE `key`=?"
];