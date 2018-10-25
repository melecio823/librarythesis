
<div class="row">
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= app\models\Item::find()->count()?></h3>

              <p><marquee>Books</marquee></p>
            </div>
            <div class="icon">
              <i style ="font-size:75px" class="glyphicon glyphicon-book"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/item']) ?>" class="small-box-footer">List of Books <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= app\models\Transactions::find()->count()?></h3>

              <p><marquee>Transactions</marquee></p>
            </div>
            <div class="icon">
              <i style ="font-size:75px" class="glyphicon glyphicon-tasks"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/transactions']) ?>" class="small-box-footer">List of Transactions<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= app\models\Customer::find()->count()?></h3>

              <p><marquee>Customers</marquee></p>
            </div>
            <div class="icon">
              <i style ="font-size:75px" class="glyphicon glyphicon-user"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/customer']) ?>"class="small-box-footer">List of Customers <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= app\models\User::find()->count()?></h3>

              <p><marquee>Users</marquee></p>
            </div>
            <div class="icon">
              <i style ="font-size:75px" class="glyphicon glyphicon-user"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/user']) ?>"class="small-box-footer">List of Users <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

    </div>
<?= $this->render('_expand-collapse') ?>


