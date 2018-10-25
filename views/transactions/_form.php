<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\Transactions;
use app\models\Item;
use app\models\Customer;
use kartik\select2\Select2;



/* @var $this yii\web\View */
/* @var $model app\models\Transactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transactions-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'item_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map (Item::find()->all(),'id','barcode_number'),
    'options' => ['placeholder' => 'Search Barcode'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>
<?= $form->field($model, 'customer_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map (Customer::find()->all(),'id','fullName'),
    'options' => ['placeholder' => 'Search Customers'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

<!-- <?= $form->field($model, 'customer_id')->dropDownList(
    ArrayHelper::map (Customer::find()->all(),'customer_id','fullName'),
    ['prompt'=>'Select']
) ?> -->

    <!-- <?= $form->field($model, 'date_borrow')->widget(
        DatePicker::className(), [
                // inline too, not bad
                'inline' => false, 
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?> -->
        
    <?= $form->field($model, 'date_returned')->widget(
        DatePicker::className(), [
                // inline too, not bad
                'inline' => false, 
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>
 <?= $form->field($model, 'fines')->textInput(['maxlength' => true]) ?>
 
 <?= $form->field($model ,'status')->dropDownList(
                    ['Available' =>'Available', 'Borrowed' =>'Borrowed','Lost'=>'Lost','Damaged'=>'Damaged'],
                        [
                            'class' => 'form-control', 
                            'prompt'=>'Status'
                        ])?>
<br>
<?= $form->field($model, 'fines_status')->dropdownList([' Paid' =>' Paid', 'Unpaid' =>' Unpaid',], ['prompt' => '']) ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
