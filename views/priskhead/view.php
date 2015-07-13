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
            'input_complain',
        ],
    ]) ?>
<div class="panel panel-default">
  <div class="panel-body">
     <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->event_name)]);?>
  </div>
</div>
</div>
