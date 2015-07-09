<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhotoLibrarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photo Libraries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-library-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Photo Library', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ref',
            'event_name',
            'detail:ntext',
            'start_date',
            // 'end_date',
            // 'location',
            // 'customer_name',
            // 'customer_mobile_phone',
            // 'province_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
