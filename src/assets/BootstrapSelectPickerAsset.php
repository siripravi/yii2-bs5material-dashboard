<?php

namespace siripravi\materialdashboard\assets;

use yii\web\AssetBundle;

/**
 * Class BootstrapSelectPickerAsset
 * @package siripravi\materialdashboard\assets
 */
class BootstrapSelectPickerAsset extends AssetBundle
{
    public $sourcePath = '@siripravi/materialdashboard/assets/bootstrapselectpicker';

    public $js = [
        'bootstrap-selectpicker.js',
    ];

    public $depends = [
        MaterialAsset::class,
    ];
}