<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var siripravi\materialdashboard\generators\crud\Generator $generator */

echo "<?php\n";

?>

use <?= $generator->gridViewClass ?>;
use <?= $generator->buttonCreateWidgetClass ?>;
use <?= $generator->cardWidgetClass ?>;

/** @var yii\web\View $this */
/** @var <?= ltrim($generator->searchModelClass, '\\') ?> $searchModel */

$this->params['breadcrumbs'][] = ($this->title = $searchModel::titleList());

?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <?= '<?= ' ?><?= StringHelper::basename($generator->cardWidgetClass) ?>::widget([
        'icon' => 'assignment',
        'title' => $this->title,
        'buttons' => <?= StringHelper::basename($generator->buttonCreateWidgetClass) ?>::widget(['model' => $searchModel]),
        'body' => <?= StringHelper::basename($generator->gridViewClass) ?>::widget([
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'siripravi\materialdashboard\grid\CheckboxColumn'],
                //['class' => 'siripravi\materialdashboard\grid\SerialColumn'],
                ['class' => 'siripravi\materialdashboard\grid\ActionColumn'],
<?php foreach ($generator->getTableSchema()->columns as $column): ?>
<?php if($column->isPrimaryKey || in_array($column->name, $generator->skipGridFields)) continue; ?>
                [
<?php if ($generator->isForeignColumn($column) || $generator->isEnum($column)): ?>
                    'class' => 'siripravi\materialdashboard\grid\ListColumn',
<?php elseif ($column->dbType == 'date' || $column->dbType == 'datetime'): ?>
                    'class' => 'siripravi\materialdashboard\grid\DateRangeColumn',
<?php elseif ($column->dbType == 'tinyint(1)'): ?>
                    'class' => 'siripravi\materialdashboard\grid\BooleanColumn',
<?php else: ?>
                    'class' => 'siripravi\materialdashboard\grid\DataColumn',
<?php endif ?>
                    'attribute' => '<?= $column->name ?>',
<?php if(($format = $generator->generateColumnFormat($column)) !== 'text'): ?>
                    'format' => '<?= $generator->generateColumnFormat($column) ?>',
<?php endif ?>
<?php if ($generator->isForeignColumn($column) && ($table = $generator->getForeignTableSchema($column))): ?>
                    'value' => '<?= $generator->getRelationName($column) ?>.<?= $generator->getTableNameAttribute($table) ?>',
                    'items' => <?= $generator->getModelClass($table) ?>::collect()->pluck('<?= $generator->getTableNameAttribute($table) ?>', '<?= $table->primaryKey[0] ?>'),
<?php endif ?>
<?php if ($generator->isEnum($column)): ?>
                    'value' => '<?= $generator->getEnumLabel($column) ?>',
                    'items' => <?= $generator->modelClass ?>::<?= $generator->getEnumFunction($column)?>(),
<?php endif ?>
                ],
<?php endforeach; ?>
            ],
        ]),
    ]) ?>
</div>