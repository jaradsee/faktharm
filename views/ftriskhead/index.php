<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FtriskheadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ftriskheads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftriskhead-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ftriskhead', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'department',
            // 'miss',
            // 'safety',
            // 'outcome_pt',
            // 'outcome_guest',
            // 'outcome_staff',
            // 'outcome_price',
            // 'solve_begin',
            // 'sum_solve',
            // 'risk_level',
            // 'risk_head_department',
            // 'risk_status',
            // 'prohead',
            // 'prodetail',
            // 'program_text',
            // 'login_name',
            // 'risk_sum_dep',
            // 'risk_simple',
            // 'date_input',
            // 'last_update',
            // 'last_staff',
            // 'print_url:url',
            // 'act_st',
            // 'clinictype',
            // 'place_id',
            // 'staff',
            // 'date_complete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
