<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Password Reset Decision';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .buttons {
        display: flex;
        width: 380px;
        gap: 10px;
        --b: 5px;
        /* the border thickness */
        --h: 1.8em;
        /* the height */
    }

    .buttons button {
        --_c: #88C100;
        flex: calc(1.25 + var(--_s, 0));
        min-width: 0;
        font-size: 40px;
        font-weight: bold;
        height: var(--h);
        cursor: pointer;
        color: var(--_c);
        border: var(--b) solid var(--_c);
        background:
            conic-gradient(at calc(100% - 1.3*var(--b)) 0, var(--_c) 209deg, #0000 211deg) border-box;
        clip-path: polygon(0 0, 100% 0, calc(100% - 0.577*var(--h)) 100%, 0 100%);
        padding: 0 calc(0.288*var(--h)) 0 0;
        margin: 0 calc(-0.288*var(--h)) 0 0;
        box-sizing: border-box;
        transition: flex .4s;
    }

    .buttons button+button {
        --_c: #FF003C;
        flex: calc(.75 + var(--_s, 0));
        background:
            conic-gradient(from -90deg at calc(1.3*var(--b)) 100%, var(--_c) 119deg, #0000 121deg) border-box;
        clip-path: polygon(calc(0.577*var(--h)) 0, 100% 0, 100% 100%, 0 100%);
        margin: 0 0 0 calc(-0.288*var(--h));
        padding: 0 0 0 calc(0.288*var(--h));
    }

    .buttons button:focus-visible {
        outline-offset: calc(-2*var(--b));
        outline: calc(var(--b)/2) solid #000;
        background: none;
        clip-path: none;
        margin: 0;
        padding: 0;
    }

    .buttons button:focus-visible+button {
        background: none;
        clip-path: none;
        margin: 0;
        padding: 0;
    }

    .buttons button:has(+ button:focus-visible) {
        background: none;
        clip-path: none;
        margin: 0;
        padding: 0;
    }

    button:hover,
    button:active:not(:focus-visible) {
        --_s: .75;
    }

    button:active {
        box-shadow: inset 0 0 0 100vmax var(--_c);
        color: #fff;
    }
</style>

<div class="user-password-reset-decision">

    <p>Do you want to permit <?= Html::encode($model->username) ?> to reset the password?</p>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'buttons']]); ?>

    <?= Html::submitButton('YES', ['name' => 'decision', 'value' => 'yes']) ?>
    <?= Html::submitButton('NO', ['name' => 'decision', 'value' => 'no']) ?>

    <?php ActiveForm::end(); ?>
</div>