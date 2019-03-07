<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 07.03.2019
 * Time: 19:08
 */

namespace app\commands;


use app\components\NotificationComponent;
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


    public function actionNotification(){
        $activities=\Yii::$app->activity->getActivityToday();

        /** @var NotificationComponent $notif_comp */
        $notif_comp=\Yii::createObject(['class'=>NotificationComponent::class,
            'mailer'=>\Yii::$app->mailer]);

        foreach ($notif_comp->sendTodayNotification($activities) as $result){
            if($result['result']){
                echo $this->ansiFormat('Успешно отправлено письмо:'.$result['email'],Console::FG_GREEN);
            }else{
                echo $this->ansiFormat('Ошибка отправки письма:'.$result['email']);
            }
        }


    }
}