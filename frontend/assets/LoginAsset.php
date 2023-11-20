<?php

namespace backend\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'gentelella/bootstrap/dist/css/bootstrap.min.css',
        'gentelella/font-awesome/css/font-awesome.min.css',
        'gentelella/nprogress/nprogress.css',
        'gentelella/animate.css/animate.min.css',
        'gentelella/build/css/custom.min.css'
    ];

    public $js = [
        'gentelella/bootstrap/dist/js/bootstrap.bundle.min.js',
        'gentelella/fastclick/lib/fastclick.js',
        'gentelella/nprogress/nprogress.js',
        'gentelella/build/js/custom.min.js'
    ];
}
