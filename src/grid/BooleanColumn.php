<?php

namespace siripravi\materialdashboard\grid;

use siripravi\materialdashboard\widgets\BooleanPickerPromted;

class BooleanColumn extends DataColumn
{
    public $filterType = BooleanPickerPromted::class;
    public $format = 'boolean';
    public $hAlign = 'center';
}