<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FriskheadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Friskheads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friskhead-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Friskhead', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'risk_id',
            'risk_date',
            'risk_time',
            'department',
            'miss',
            // 'event',
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
            // 'ref',
            // 'clinictype',
            // 'place_id',
            // 'staff',
            // 'risk_again',
            // 'date_complete',
            // 'risk_ref_no',
            // 'input_complain',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
