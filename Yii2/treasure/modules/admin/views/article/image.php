<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxleight' => true])?>

    <div class="form-group">
        <?=Html::submitButton('Sumbit',['class' => 'btn btn-success'])?>
    </div>

    <?php $form = ActiveForm::end(); ?>

</div>