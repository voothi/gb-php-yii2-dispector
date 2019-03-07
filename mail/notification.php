<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 07.03.2019
 * Time: 19:37
 * @var \app\models\Activity $model
 */
?>

<h2>Событие стартует сегодя</h2>
<strong><?=$model->title?></strong>
<p style="color: green;">Дата старта:<?=Yii::$app->formatter->asDatetime($model->timeStart);?></p>



