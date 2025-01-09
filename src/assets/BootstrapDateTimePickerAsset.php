<?php

namespace siripravi\materialdashboard\assets;

use yii\web\AssetBundle;

/**
 * Class BootstrapDateTimePickerAsset
 * @package siripravi\materialdashboard\assets
 */
class BootstrapDateTimePickerAsset extends AssetBundle
{
    public $sourcePath = '@siripravi/materialdashboard/assets/bootstrapdatetimepicker';

    public $js = [
        'bootstrap-datetimepicker.min.js',
    ];

    public $depends = [
        \yii\web\JqueryAsset::class,
        \conquer\momentjs\MomentjsAsset::class,
    ];
}