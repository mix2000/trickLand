<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 20.11.2016
 * Time: 16:58
 */
class logger
{
    protected static $template = 'include/view/logs/menuLogs.php';
    protected static $flag = 1; // вывод ошибок закрыт
    protected static $ipAddress = ['213.21.36.144'];
    protected static $arrayLog = [];
    protected static $timeStart = '';

    static function addNewLog($fileName, $line, $msg)
    {
        self::$arrayLog[] = ['fileName' => $fileName, 'line' => $line, 'msg'=>$msg];
    }

    static function start()
    {
        self::$timeStart = microtime(true);
    }

    static function getTimeScript()
    {
        return microtime(true) - self::$timeStart;
    }
    static function getReport(){
        if(self::$flag==1 and in_array($_SERVER['REMOTE_ADDR'],self::$ipAddress)){
            require self::$template;
        }
    }

    /**
     * @return array
     */
    public static function getArrayLog()
    {
        return self::$arrayLog;
    }
}