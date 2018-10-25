<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transactions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>
    <?php  echo $form->field($model, 'date_borrow') ?>

   <?php  echo $form->field($model, 'date_borrow') ?>
   
   <?php  echo $form->field($model, 'date_returned') ?>

   
    <?php  echo $form->field($model, 'fines') ?>

    <?php echo $form->field($model, 'fines_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
