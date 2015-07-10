<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Priskheadearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Priskheads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priskhead-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Priskhead', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'risk_id',
            'risk_date',
            'event_name',
            'ref',
            'risk_again',
            // 'date_complete',
            // 'risk_ref_no',
            // 'input_complain',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
