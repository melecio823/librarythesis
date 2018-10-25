<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">
<?php if(Yii::$app->user->identity->role==User::ROLE_ADMIN) {?>
    <p>
        <?= Html::button('Add Customer', ['value'=>Url::to('/index.php/customer/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
<?php }?>
        

    </p>
    <?php
        Modal::begin([
            'header'=> '<h4>Customer</h4>',
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
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',   
            [ 'attribute' => 
                   'customer_id', 
                   'label' => 'Customer ID',
                   'format' => 'raw', 
                   'value' => 
                   function ($model) {
                   return Html::a($model->customer_id, 
                   [ 'customer/view', 'id' => $model->id ], [
                       'target' => '_blank']
                       );
                   },
               ],
               [ 'attribute' => 
               'firstname', 
               'label' => 'First Name',
               'format' => 'raw', 
               'value' => 
               function ($model) {
               return Html::a($model->firstname, 
               [ 'customer/view', 'id' => $model->id ], [
                   'target' => '_blank']
                   );
               },
           ],
           [ 'attribute' => 
           'lastname', 
           'label' => 'Last Name',
           'format' => 'raw', 
           'value' => 
           function ($model) {
           return Html::a($model->lastname, 
           [ 'customer/view', 'id' => $model->id ], [
               'target' => '_blank']
               );
           },
       ],
            // 'customer_id',
            // 'firstname',
            // 'lastname',
            'course',
            'year',
            'phone',
            'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
