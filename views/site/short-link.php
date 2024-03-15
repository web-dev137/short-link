<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var yii\web\View $this */
/* @var app\models\forms\HashLinkForm $model */
/* @var string $shortLink */


$this->title = 'Link generation';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin();?>
        <?= $form->field($model,'link'); ?>
        <div class="form-group">
            <div>
                <?= Html::submitButton('generate', ['class' => 'btn btn-primary', 'name' => 'link-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div>
    <span>Короткая ссылка: </span>
    <?= Html::a($shortLink,$model->link) ?>
</div>