<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Item;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transactions-index">

  
  <p>
        <?= Html::button('Create Transaction', ['value'=>Url::to('/transactions/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php
        Modal::begin([
            'header'=> '<h4>Transaction</h4>',
            'id'=> 'modal',
            'size'=> 'modal-lg',
            'options' => [
                'tabindex' => false // important for Select2 to work properly
            ],
        ]);
        echo "<div id='modalContent'> </div>";

        Modal::end();
        ?>
     <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [ 'attribute' => 
            'item_id', 
            'label' => 'Barcode Number',
            'format' => 'raw', 
            'value' => 
            function ($model) {
            return Html::a($model->item->barcode_number, 
            [ 'item/view', 'id' => $model->item->id ], [
                'target' => '_blank']
                );
            },
        ],
            // [
            //     'attribute'=>'item_id',
            //     'value'=>'item.barcode_number',
            // ],
            [
                'attribute'=>'customer_id',
                'value'=>'customer.fullName',
            ],
            'date_borrow',
            'date_returned',
            'fines',
            'fines_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
