<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->getFlash('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<?php
$form = ActiveForm::begin();
?>
<div style="width: 600px; padding-left: 3em; padding-top: 2em">
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    <?= Html::submitButton('Добавить категорию', ['class' => 'btn btn-success']) ?>
    <?php $form->end(); ?>
</div>
