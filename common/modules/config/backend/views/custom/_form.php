<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\config\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'group')->dropDownList(Yii::$app->config->get('config_group')) ?>

        <?= $form->field($model, 'type')->dropDownList($model->getTypeList()) ?>

        <?= $form->field($model, 'value')->textarea(['maxlength' => true, 'rows' => 8]) ?>

        <?= $form->field($model, 'extra')->textarea(['maxlength' => true, 'rows' => 8])->hint('（单选,多选,下拉框 需要配置该项）') ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => 'btn btn-primary btn-flat btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
