<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Priskhead */

$this->title = $model->event_name;
$this->params['breadcrumbs'][] = ['label' => 'Priskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priskhead-view">

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
            'event_name',
            'ref',
            'risk_again',
            'risk_time',
            'date_complete',
            'proheadName',
            'prodetailName',
            'risk_ref_no',
            'complainName',
            
            'safety',
            'outcome_pt',
            'outcome_guest',
            'outcome_staff',
            'outcome_price',
            'solve_begin',
            'sum_solve',
            'levelName',
            'risk_head_department',
            'risk_status',
            
            'program_text',
            'login_name',
            'risk_sum_dep',
            'simpleName',
            'date_input',
            'last_update',
            'last_staff',
            'print_url:url',
            'act_st',
            
            'clinictypeName',
            'riskplaceName',
            'staff',
            'risk_again',
            'date_complete',
           
            
        ],
    ]) ?>
<div class="panel panel-default">
  <div class="panel-body">
     <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->event_name)]);?>
  </div>
</div>
</div>
