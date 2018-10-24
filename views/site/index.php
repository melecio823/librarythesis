
<div class="row">
<div class="col-lg-4 col-lg-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>
                    1
                </h3>

                <p>
                    Books
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-item"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/item']) ?>" class="small-box-footer">
                Lists <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->


    <div class="col-lg-4 col-lg-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    2
                </h3>

                <p>
                   Transactions
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-item"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/transactions']) ?>" class="small-box-footer">
                Lists <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-4 col-lg-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    3
                </h3>
                <p>
                    Customers
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-item"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/customer']) ?>" class="small-box-footer">
                Lists <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
<?= $this->render('_expand-collapse') ?>


