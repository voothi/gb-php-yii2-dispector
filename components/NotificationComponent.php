<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 07.03.2019
 * Time: 19:34
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /** @var MailerInterface */
    public $mailer;

    /**
     * @param $activities Activity[]
     * @return \Generator
     */
    public function sendTodayNotification($activities){
        foreach ($activities as $activity){
            $result=$this->mailer->compose('notification',['model'=>$activity])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo(['anat-gor@ya.ru',$activity->user->email])
                ->setSubject('Событие сегодня')
                ->setCharset('utf-8')
                ->attach(\Yii::getAlias('@app/web/images/97831550770786.jpg'))
                ->send();

            yield ['result'=>$result,'email'=>$activity->user->email];
        }
    }
}