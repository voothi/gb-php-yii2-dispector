<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 04.03.2019
 * Time: 20:34
 */

namespace app\behaviors;


use yii\base\Behavior;
use yii\log\Logger;

class LogMyBehavior extends Behavior
{

    public function logMeHere(){
        \Yii::getLogger()->log('log behavior here',Logger::LEVEL_INFO);
    }
}