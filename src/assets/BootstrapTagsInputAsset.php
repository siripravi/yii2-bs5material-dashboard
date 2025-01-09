<?php

namespace siripravi\materialdashboard\assets;

use yii\web\AssetBundle;

/**
 * Class BootstrapTagsInputAsset
 * @package siripravi\materialdashboard\assets
 */
class BootstrapTagsInputAsset extends AssetBundle
{
    public $sourcePath = '@siripravi/materialdashboard/assets/bootstraptagsinput';

    public $js = [
        'bootstrap-tagsinput.js',
    ];

    public $depends = [
        MaterialAsset::class,
    ];
}