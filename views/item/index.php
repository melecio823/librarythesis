<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Item;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

 <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::button('Add', ['value'=>Url::to('/item/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php
        Modal::begin([
            'header'=> '<h4>Books</h4>',
            'id'=> 'modal',
            'size'=> 'modal-lg',
        ]);
        echo "<div id='modalContent'> </div>";

        Modal::end();
        ?>
     <?php Pjax::begin(); ?>
     <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

               'id',
                [ 'attribute' => 
                       'barcode_number', 
                       'label' => 'Barcode Number',
                       'format' => 'raw', 
                       'value' => 
                       function ($model) {
                       return Html::a($model->barcode_number, 
                       [ 'item/view', 'id' => $model->id ], [
                           'target' => '_blank']
                           );
                       },
                   ],
                //    'id',   
                   [ 'attribute' => 
                          'title', 
                          'label' => 'Title',
                          'format' => 'raw', 
                          'value' => 
                          function ($model) {
                          return Html::a($model->title, 
                          [ 'item/view', 'id' => $model->id ], [
                              'target' => '_blank']
                              );
                          },
                      ],
            // 'barcode_number',
            // 'title',
            'acc_no',
            'call_no',
            'author',
            'publisher',
            'c_year',
            'type',
            'no_of_copies',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
