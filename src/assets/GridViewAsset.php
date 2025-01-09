<?php


namespace siripravi\materialdashboard\assets;

use yii\web\AssetBundle;

/**
 * Class GridViewAsset
 * @package siripravi\materialdashboard\assets
 */
class GridViewAsset extends AssetBundle
{
    public $sourcePath = '@siripravi/materialdashboard/assets/grid-view';
    public $css = [
        'grid-view.css',
    ];
    public $depends = [
        \yii\grid\GridViewAsset::class,
    ];
}