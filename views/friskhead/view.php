<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Friskhead */

$this->title = $model->risk_id;
$this->params['breadcrumbs'][] = ['label' => 'Friskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friskhead-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->risk_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->risk_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'risk_id',
            'risk_date',
            'risk_time',
            'department',
            'miss',
            'event',
            'safety',
            'outcome_pt',
            'outcome_guest',
            'outcome_staff',
            'outcome_price',
            'solve_begin',
            'sum_solve',
            'risk_level',
            'risk_head_department',
            'risk_status',
            'prohead',
            'prodetail',
            'program_text',
            'login_name',
            'risk_sum_dep',
            'risk_simple',
            'date_input',
            'last_update',
            'last_staff',
            'print_url:url',
            'act_st',
            'ref',
            'clinictype',
            'place_id',
            'staff',
            'risk_again',
            'date_complete',
            'risk_ref_no',
            'input_complain',
        ],
    ]) ?>

<div class="panel panel-default">
  <div class="panel-body">
     <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->event)]);?>
  </div>
</div>
    
