<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 07.03.2019
 * Time: 19:57
 */

namespace app\modules\test\commands;


use yii\console\Controller;

class TetsController extends Controller
{
    public function actionIndex(){
        echo 'test'.PHP_EOL;
    }
}