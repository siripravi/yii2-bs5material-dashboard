<?php

namespace siripravi\materialdashboard\widgets\buttons;

use Yii;
use yii\db\ActiveRecordInterface;

class Delete extends Link
{
    public $icon = 'delete';
    public $optionType = 'btn-danger';
    public $optionStyle = 'btn-round';
    /**
     * @var ActiveRecordInterface
     */
    public $model;

    public function init()
    {
        parent::init();
        if (empty($this->url) && $this->model) {
            $this->url = array_merge(['delete'], $this->model->getPrimaryKey(true));
        }

        if ($this->title === null) {
            $this->title = Yii::t('materialdashboard', 'Delete');
        }

        if(empty($this->getConfirm())){
            $this->setConfirm(Yii::t('materialdashboard', 'Are you sure you want to delete this item?'));
        }
    }
}