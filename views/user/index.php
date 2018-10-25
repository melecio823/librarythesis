<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

   <p>
        <?= Html::button('Add User', ['value'=>Url::to('/user/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php
        Modal::begin([
            'header'=> '<h4>User</h4>',
            'id'=> 'modal',
            'size'=> 'modal-lg',
        ]);
        echo "<div id='modalContent'> </div>";

        Modal::end();
        ?>
     <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'username',
            'email',    
            // 'password',
            'status',
            'role',
            // 'authkey',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
