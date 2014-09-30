<?php
/**
 * @link http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace pheme\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use Yii;

/**
 * @author Aris Karageorgos <aris@phe.me>
 */
class ToggleColumn extends DataColumn
{
    public $action = 'toggle';

    protected function renderDataCellContent($model, $key, $index)
    {
        $url = [$this->action, 'id' => $model->id];

        $attribute = $this->attribute;
        $value = $model->$attribute;

        if ($value === null || $value == true) {
            $icon = 'ok';
            $title = Yii::t('yii', 'Off');
        }
        else {
            $icon = 'remove';
            $title = Yii::t('yii', 'On');
        }
        return Html::a('<span class="glyphicon glyphicon-'.$icon.'"></span>', $url, [
            'title' => $title,
            'data-method' => 'post',
            'data-pjax' => '0',
        ]);
    }
}
