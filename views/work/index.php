<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trabajos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a(Yii::t('app', 'Crear Trabajo'), ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        
            //'id',
            'createdWork',
            'startWork',
            'finishWork',
            'detail',
            'totalHours',
            [
             'format'=>'html',
             'value'=>function($data){
                return Html::img($data->image, ['width'=>'60px']);
             }
            ]
            ,

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>


</div>