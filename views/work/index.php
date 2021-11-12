<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\base\Model;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Works');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Work'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'models' => $dataProvider->getModels(),
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
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
    ]); ?>


</div>
