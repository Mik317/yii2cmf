<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Carousel */
/* @var $carouselItemsProvider \yii\data\ActiveDataProvider */

$this->title = '更新幻灯片:' . $model->key;
$this->params['breadcrumbs'][] = ['label' => '幻灯片', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousel-update">
    <div class="row">
        <div class="col-md-4">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        <div class="col-md-8">
            <p>
                <?= Html::a('新幻灯片项', ['/carousel-item/create', 'carousel_id'=>$model->id], ['class' => 'btn btn-success btn-flat']) ?>
            </p>
            <div class="box box-primary">
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $carouselItemsProvider,
                        'columns' => [
                            [
                                'class' => 'backend\widgets\grid\PositionColumn',
                                'attribute' => 'sort',
                                'route' => '/carousel-item/position'
                            ],
                            [
                                'attribute' => 'image',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->image ? Html::img($model->image, ['width'=>200, 'height' => 100]) : null;
                                }
                            ],
                            'url',
                            [
                                'format' => 'html',
                                'attribute' => 'caption',
                                'options' => ['style' => 'width: 20%']
                            ],
                            [
                                'class' => 'backend\widgets\grid\SwitcherColumn',
                                'attribute' => 'status',
                                'route' => ['/carousel-item/switcher']
                            ],

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'controller' => '/carousel-item',
                                'template' => '{update} {delete}'
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
