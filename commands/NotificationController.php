<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 07.03.2019
 * Time: 19:08
 */

namespace app\commands;


use yii\console\Controller;
use yii\helpers\Console;

class NotificationController extends Controller
{

    public $param;

    public function optionAliases()
    {
        return ['p'=>'param'];
    }

    function options($actionID)
    {
        return ['param'];
    }

    public function actionParams(){
        echo 'param='.$this->param.PHP_EOL;
    }

    public function actionIndex(...$args){
        echo $this->ansiFormat('this is console'.PHP_EOL,Console::FG_GREEN);

        echo 'param '.print_r($args).PHP_EOL;
    }
}