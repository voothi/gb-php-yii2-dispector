<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 04.03.2019
 * Time: 19:30
 */
?>
<div class="row">
    <div class="col-md-12">
        <?=\yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'tableOptions' => [
                'class'=>'table table-striped table-bordered table-hover'
            ],
            'rowOptions'=>function($model,$key,$index,$grid){
                $class=$index%2?'odd':'even';
                return [
                    'class'=>$class,
                    'index'=>$index,
                    'key'=>$key
                ];
            },
            'layout' => "{pager}\n{items}\n{summary}\n{pager}",
            'columns' => [
                ['class'=>\yii\grid\SerialColumn::class],
                'id',
                [
                    'attribute' => 'title',
                    'value' => function($model){
                        return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title),['/activity/view','id'=>$model->id]);
                    },
                    'format' => 'html'
                ],
                [
                    'attribute' => 'dateAct',
                    'label' => 'Дата начало и окончания',
                    'value' => function($model){
                        return Yii::$app->formatter->asDate($model->dateAct).' '.$model->timeStart.' - '.$model->timeEnd;
                    }
                ],
//                'title:html:Новый заголовок',
                'description',
                [
                    'attribute' => 'user_id',
                    'label' => 'email',
                    'value' => function($model){
                        return $model->user->email;
                    }
                ],
                [
                        'label' => 'Дата создания',
                    'attribute' => 'date_created',
                    'value' => function($model){
                        /** @var $model \app\models\Activity */
                        $model->attachBehavior('getDateB',[
                                'class'=>\app\behaviors\GetDateFunctionFormatBehavior::class,
                            'attribute_name' => 'dateAct']);
//                        $model->detachBehavior('getDateB');
                        return $model->getDate();
                    }
                ]
            ]
        ]);?>
    </div>
</div>
