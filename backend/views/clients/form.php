<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Клиенты',
    'url' => Url::to(['clients/index']),
];
if($action == "update"){
    $this->params['breadcrumbs'][] = [
        'label' => $clients->firstName,
    ];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'clients-form',
])
?>

<?= $form->field($clients, 'firstName') ?>
<?= $form->field($clients, 'secondName') ?>
<?= $form->field($clients, 'thirdName') ?>
<?= $form->field($clients, 'phone') ?>
<?= $form->field($clients, 'phoneHome') ?>
<?= $form->field($clients, 'address') ?>
<?= $form->field($clients, 'from')->dropDownList($clients->fromArr, ['prompt' => '--Выбрать из списка--']) ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

<?php ActiveForm::end() ?>