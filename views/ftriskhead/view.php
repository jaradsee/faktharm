<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ftriskhead */

$this->title = $model->event_name;
$this->params['breadcrumbs'][] = ['label' => 'Ftriskheads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftriskhead-view">

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
            'department',
            'miss',
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
            'clinictype',
            'place_id',
            'staff',
            'date_complete',
        ],
    ]) ?>

<div class="panel panel-default">
  <div class="panel-body">
     <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->event_name)]);?>
  </div>
</div>
</div>
